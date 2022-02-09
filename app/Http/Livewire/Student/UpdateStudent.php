<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class UpdateStudent extends Component
{
    public $student;

    public function mount(Student $id)
    {
        $this->student = $id;
    }

    public function render()
    {
        return view('livewire.student.update-student');
    }
}
