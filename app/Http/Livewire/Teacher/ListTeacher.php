<?php

namespace App\Http\Livewire\Teacher;

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
        $teachers = Teacher::whereHas('school', function ($query) {
            $query->where('id', auth()->user()->school_id);
        })
            ->with(['user' => function ($query) {
                $query->RoleUser(['teacher']);
            }, 'subjects'])
            ->when(!empty($this->search), function ($query) {
                $query->whereLike(['first_name'], $this->search);
            })
            ->orderBy('id', 'DESC')->paginate(Teacher::PAGINATION_COUNT)
            ->withPath('/teacher')->withQueryString();

        return view('livewire.teacher.list-teacher', ['teachers' => $teachers]);
    }

    public function teacherDelete(Teacher $teacher)
    {
        $teacher->delete();
        session()->flash('message', __('Admin successfully deleted.'));
        session()->flash('class', 'green');
    }
}
