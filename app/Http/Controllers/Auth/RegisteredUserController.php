<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Arr;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $gender = array_combine(User::getEnum('gender'), User::getEnum('gender'));
        $roles = Arr::except(array_combine(Config::get('permission.roles'), Config::get('permission.roles')), ['super-admin', 'student']);
        $schools = School::get()->pluck('name', 'id');
        return view('auth.register', compact('gender', 'roles', 'schools'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'school_id' => ['required', 'exists:schools,id'],
            'role' => ['required', Rule::in(Config::get('permission.roles'))],
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'mobile' => ['required'],
            'date_of_birth' => ['required', 'date', 'before:' . Carbon::now()->subYears(5)],
            'gender' => ['required', Rule::in(User::getEnum('gender'))],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::beginTransaction();
        if ($validatedData['role'] == 'admin') {
            $user = User::create(Arr::except($validatedData, ['role']));
            $user->assignRole($validatedData['role']);
        } elseif ($validatedData['role'] == 'teacher') {
            $teacher = Teacher::create(Arr::except($validatedData, ['role']));
            $teacher->password = $validatedData['password'];
            $teacher->email_verified_at = now();
            $teacher->remember_token = Str::random(10);

            $teacherUser = clone $teacher->user();
            $teacherUser->create(Arr::except($teacher->toArray(), ['id']))->save();

            $teacher->user->assignRole($validatedData['role']);
            $user = $teacher->user;
        }
        DB::commit();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
