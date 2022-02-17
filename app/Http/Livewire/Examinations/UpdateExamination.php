<?php

namespace App\Http\Livewire\Examinations;

use App\Models\Examination;
use Livewire\Component;

class UpdateExamination extends Component
{
    public $examination;

    public function mount(Examination $id)
    {
        $this->examination = $id;
    }

    public function render()
    {
        return view('livewire.examinations.update-examination');
    }
}
