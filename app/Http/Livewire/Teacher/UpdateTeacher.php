<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class UpdateTeacher extends Component
{
    public $teacher;

    public function mount(Teacher $id)
    {
        $this->teacher = $id;
    }

    public function render()
    {
        return view('livewire.teacher.update-teacher');
    }
}
