<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Carbon\Carbon;
use Config;
use Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class CreateStudent extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $gender, $date_of_birth, $email, $password, $mobile, $gr_number, $avatar, $student;
    public $status = 1;

    public function mount($student = null)
    {
        if ($student) {
            $this->student = $student;
            $this->first_name = $student->first_name;
            $this->last_name = $student->last_name;
            $this->gender = $student->gender;
            $this->date_of_birth = $student->date_of_birth->format('Y-m-d');
            $this->email = $student->email;
            // $this->password = $student->password;
            $this->mobile = $student->mobile;
            $this->gr_number = $student->gr_number;
        }
    }
    protected function rules()
    {
        $validation = [
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'gender' => 'required|in:' . implode(',', Student::getEnum('gender')),
            // 'gender' => ['required', new Enum(ServerStatus::class)],
            'date_of_birth' => ['required', 'date', 'before:' . Carbon::now()->subYears(5)],
            'mobile' => 'required',
            'gr_number' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        ];
        if (is_null($this->student)) {
            $validation['password'] = 'required';
            $validation['email'] = ['required', 'email', Rule::unique('students')];
        } else {
            $validation['email'] = ['required', 'email', Rule::unique('students')->ignore($this->student->id)];
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

        if (is_null($this->student)) {
            $validatedData['status'] = $this->status;
            $validatedData['school_id'] = auth()->user()->school_id;
            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['email_verified_at'] = now();
            $validatedData['remember_token'] = Str::random(10);
            $this->student = Student::create($validatedData);
            $this->student->assignRole(Config::get('permission.roles')[3]);

            session()->flash('message', __('Student successfully created.'));
        } else {
            if (is_null($validatedData['avatar'])) {
                unset($validatedData['avatar']);
            }
            $this->student->fill($validatedData)->save();
            session()->flash('message', __('Student successfully updated.'));
        }

        session()->flash('class', 'green');

        return redirect()->route('students.index');
    }

    public function render()
    {
        return view('livewire.students.create-student', ['genderTypes' => Student::getEnum('gender')]);
    }
}
