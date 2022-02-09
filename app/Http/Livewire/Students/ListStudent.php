<?php

namespace App\Http\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ListStudent extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $students = Student::RoleUser(['student'])
            ->whereHas('school', function ($query) {
                $query->where('id', auth()->user()->school_id);
            })
            ->when(!empty($this->search), function ($query) {
                $query->whereLike(['first_name'], $this->search);
            })
            ->orderBy('id', 'DESC')->paginate(Student::PAGINATION_COUNT)
            ->withPath('/student')->withQueryString();

        return view('livewire.students.list-student', ['students' => $students]);
    }

    public function studentDelete(Student $student)
    {
        $student->delete();
        session()->flash('message', __('Admin successfully deleted.'));
        session()->flash('class', 'green');
    }
}
