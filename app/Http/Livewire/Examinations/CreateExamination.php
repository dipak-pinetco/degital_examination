<?php

namespace App\Http\Livewire\Examinations;

use App\Models\AcademicYear;
use App\Models\Clases;
use App\Models\Examination;
use App\Models\ExaminationGroup;
use App\Models\Teacher;
use Auth;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateExamination extends Component
{
    use WithFileUploads;

    public $examinationable_id, $examination_group_id, $academic_year_id, $supervision_teacher_id, $name, $start_date_time,
        $total_time, $total_marks, $passout_marks,
        $examination, $examinationGroups, $teachers, $clases;

    public function mount($examination = null)
    {
        $this->examinationGroups = ExaminationGroup::where('school_id', auth()->user()->school_id)->get();
        $this->teachers = Teacher::where('school_id', auth()->user()->school_id)->get();
        $this->clases = Clases::authSchool()->get();
        if ($examination) {
            $this->examination = $examination;
            $this->examination_group_id = $examination->examination_group_id;
            $this->academic_year_id = $examination->academic_year_id;
            $this->supervision_teacher_id = $examination->supervision_teacher_id;
            $this->name = $examination->name;
            $this->start_date_time = $examination->start_date_time->format('Y-m-d h:i:s');
            $this->total_time = $examination->total_time;
            $this->total_marks = $examination->total_marks;
            $this->passout_marks = $examination->passout_marks;
            // dd($this->start_date_time);
        }
    }

    protected function rules()
    {
        $validation = [
            'examinationable_id' => ['required'],
            'examination_group_id' => ['nullable', 'existsWithOther:examination_groups,id,school_id,' . auth()->user()->school_id],
            // 'academic_year_id' => ['required', 'existsWithOther:academic_years,id,school_id,' . auth()->user()->school_id],
            'supervision_teacher_id' => ['nullable', 'existsWithOther:teachers,id,school_id,' . auth()->user()->school_id],
            'name' => ['required', 'min:3', 'max:25'],
            'start_date_time' => ['required', 'date', 'after:' . Carbon::now()],
            'total_time' => ['required', 'numeric'],
            'total_marks' => ['required', 'numeric'],
            'passout_marks' => ['required', 'numeric'],
        ];
        return $validation;
    }

    protected $validationAttributes = [
        'examinationable_id'  => 'class',
        'start_date_time'  => 'start date time',
        'total_time'  => 'total examination time',
        'total_marks'  => 'total examination marks',
        'passout_marks'  => 'passout examination marks',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        if (is_null($this->examination)) {
            $validatedData['academic_year_id'] = AcademicYear::schoolCurrentYear()->first()->id;
            $class=Clases::find($validatedData['examinationable_id'])->examinations()->create($validatedData);
            session()->flash('message', __('Examination successfully created.'));
        } else {
            $this->examination->fill($validatedData)->save();
            session()->flash('message', __('Examination successfully updated.'));
        }

        session()->flash('class', 'green');

        return redirect()->route('examinations.index');
    }

    public function render()
    {
        return view('livewire.examinations.create-examination');
    }
}
