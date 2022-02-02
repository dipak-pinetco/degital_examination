<?php

namespace App\Http\Livewire\Classes;

use App\Models\Clases;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdateClass extends Component
{
    public $class;

    public function mount(Clases $id)
    {
        $this->class = $id;
    }

    public function render()
    {
        return view('livewire.classes.update-class');
    }
}
