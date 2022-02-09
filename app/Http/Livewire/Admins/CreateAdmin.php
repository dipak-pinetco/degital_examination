<?php

namespace App\Http\Livewire\Admins;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Password;
use Str;

class CreateAdmin extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $gender, $date_of_birth, $email, $password, $mobile, $avatar, $admin;
    public $status = 1;

    public function mount($admin = null)
    {
        if ($admin) {
            $this->admin = $admin;
            $this->first_name = $admin->first_name;
            $this->last_name = $admin->last_name;
            $this->gender = $admin->gender;
            $this->date_of_birth = $admin->date_of_birth->format('Y-m-d');
            $this->email = $admin->email;
            $this->password = $admin->password;
            $this->mobile = $admin->mobile;
        }
    }
    protected function rules()
    {
        $validation = [
            'first_name' => ['required', 'min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'gender' => ['required', Rule::in(User::getEnum('gender'))],
            // 'gender' => ['required', new Enum(ServerStatus::class)],
            'date_of_birth' => ['required', 'date', 'before:' . Carbon::now()->subYears(5)],
            'mobile' => ['required'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // 2MB Max
        ];
        if (is_null($this->admin)) {
            $validation['password'] = ['required', Password::defaults()];
            $validation['email'] = ['required', 'email', Rule::unique('users')];
        } else {
            $validation['email'] = ['required', 'email', Rule::unique('users')->ignore($this->admin->id)];
        }
        return $validation;
    }

    protected $validationAttributes = [
        'email' => 'email address'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        if ($this->avatar) {
            $validatedData['avatar'] = $this->avatar->store('avatars');
        }

        if (is_null($this->admin)) {
            $validatedData['status'] = $this->status;
            $validatedData['school_id'] = auth()->user()->school_id;
            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['email_verified_at'] = now();
            $validatedData['remember_token'] = Str::random(10);

            $user = User::create($validatedData);
            $user->assignRole(Config::get('permission.roles')[1]);

            session()->flash('message', __('Admin successfully created.'));
        } else {
            if (is_null($validatedData['avatar'])) {
                unset($validatedData['avatar']);
            }
            $this->admin->fill($validatedData)->save();
            session()->flash('message', __('Admin successfully updated.'));
        }

        session()->flash('class', 'green');
        return redirect()->route('admins.index');
    }

    public function render()
    {
        return view('livewire.admins.create-admin', ['genderType' => User::getEnum('gender')]);
    }
}
