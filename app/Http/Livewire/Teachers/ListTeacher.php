<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Teacher;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListTeacher extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $teachers = Teacher::RoleUser(['teacher'])
            ->whereHas('school', function ($query) {
                $query->where('id', auth()->user()->school_id);
            })
            ->with(['subjects'])
            ->when(!empty($this->search), function ($query) {
                $query->whereLike(['first_name'], $this->search);
            })
            ->orderBy('id', 'DESC')->paginate(Teacher::PAGINATION_COUNT)
            ->withPath('/teacher')->withQueryString();

        return view('livewire.teachers.list-teacher', ['teachers' => $teachers]);
    }

    public function teacherDelete(Teacher $teacher)
    {
        $teacher->delete();
        session()->flash('message', __('Admin successfully deleted.'));
        session()->flash('class', 'green');
    }
}
