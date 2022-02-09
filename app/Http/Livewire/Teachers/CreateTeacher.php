<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Subject;
use App\Models\Teacher;
use Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class CreateTeacher extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $gender, $date_of_birth, $email, $password, $mobile, $degree, $avatar, $teacher, $allSubjects, $subjects;
    public $status = 1;

    public function mount($teacher = null)
    {
        $this->allSubjects = Subject::get();
        if ($teacher) {
            $this->teacher = $teacher;
            $this->first_name = $teacher->first_name;
            $this->last_name = $teacher->last_name;
            $this->gender = $teacher->gender;
            $this->date_of_birth = $teacher->date_of_birth->format('Y-m-d');
            $this->email = $teacher->email;
            // $this->password = $teacher->password;
            $this->mobile = $teacher->mobile;
            $this->degree = $teacher->degree;
            $this->subjects = $teacher->subjects->pluck('id');
        }
    }
    protected function rules()
    {
        $validation = [
            'first_name' => 'required|min:3|max:25',
            'last_name' => 'required|min:3|max:25',
            'gender' => 'required|in:' . implode(',', Teacher::getEnum('gender')),
            // 'gender' => ['required', new Enum(ServerStatus::class)],
            'date_of_birth' => ['required', 'date', 'before:' . Carbon::now()->subYears(5)],
            'mobile' => 'required',
            'degree' => 'required',
            'subjects' => 'required|array|min:1',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        ];
        if (is_null($this->teacher)) {
            $validation['password'] = 'required';
            $validation['email'] = ['required', 'email', Rule::unique('teachers')];
        } else {
            $validation['email'] = ['required', 'email', Rule::unique('teachers')->ignore($this->teacher->id)];
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

        if (is_null($this->teacher)) {
            $validatedData['status'] = $this->status;
            $validatedData['school_id'] = auth()->user()->school_id;
            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['email_verified_at'] = now();
            $validatedData['remember_token'] = Str::random(10);
            $this->teacher = Teacher::create($validatedData);
            $this->teacher->assignRole(Config::get('permission.roles')[2]);

            session()->flash('message', __('Teacher successfully created.'));
        } else {
            if (is_null($validatedData['avatar'])) {
                unset($validatedData['avatar']);
            }
            $this->teacher->fill($validatedData)->save();
            session()->flash('message', __('Teacher successfully updated.'));
        }

        // Sync Teacher Subject
        $this->teacher->subjects()->Sync($this->subjects);

        session()->flash('class', 'green');

        return redirect()->route('teachers.index');
    }

    public function render()
    {
        return view('livewire.teachers.create-teacher', ['genderTypes' => Teacher::getEnum('gender')]);
    }
}
