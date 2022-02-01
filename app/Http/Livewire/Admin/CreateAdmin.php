<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAdmin extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $gender, $date_of_birth, $email, $password, $mobile, $avatar, $admin;
    public $status = 1;

    public function mount($admin = null)
    {
        if ($admin) {
            $this->first_name = $admin->first_name;
            $this->last_name = $admin->last_name;
            $this->gender = $admin->gender;
            $this->date_of_birth = $admin->date_of_birth;
            $this->email = $admin->email;
            $this->password = $admin->password;
            $this->mobile = $admin->mobile;
            $this->avatar = $admin->avatar;;
        }
    }
    protected function rules()
    {
        return [
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'gender' => 'required|in:' . implode(',', User::getEnum('gender')),
            // 'gender' => ['required', new Enum(ServerStatus::class)],
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'mobile' => 'required',
            'avatar' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        ];
    }

    protected $validationAttributes = [
        'email' => 'email address'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->gender = 'male';
        $this->date_of_birth = '';
        $this->email = '';
        $this->password = '';
        $this->mobile = '';
        $this->avatar = null;
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['status'] = $this->status;
        $validatedData['school_id'] = auth()->user()->school_id;
        $user = User::create($validatedData);
        $roles = Config::get('permission.roles');
        $user->assignRole($roles[1]);

        session()->flash('message', __('Admin successfully created.'));
        session()->flash('class', 'green');
        $this->resetInputFields();

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.create-admin', ['genderType' => User::getEnum('gender')]);
    }
}
