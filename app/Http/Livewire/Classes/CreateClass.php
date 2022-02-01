<?php

namespace App\Http\Livewire\Classes;

use App\Models\Clases;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateClass extends Component
{
    public $name, $class;

    public function mount($class = null)
    {
        if ($class) {
            $this->class = $class;
            $this->name = $class->name;
        }
    }
    protected function rules()
    {
        $validation = [];

        if (is_null($this->class)) {
            $validation['name'] = ['required', 'min:1', 'max:15',  Rule::unique('clases')->where(function ($query) {
                return $query->where('school_id', auth()->user()->school_id);
            })];
        } else {
            $validation['name'] = ['required', 'min:1', 'max:15',  Rule::unique('clases')->where(function ($query) {
                return $query->where('school_id', auth()->user()->school_id);
            })->ignore($this->class->id)];
        }
        return $validation;
    }

    protected $validationAttributes = [
        'name' => 'class name'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
        $this->name = '';
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['school_id'] = auth()->user()->school_id;

        if (is_null($this->class)) {
            $class = Clases::create($validatedData);
            session()->flash('message', __('Classes successfully created.'));
        } else {
            $this->class->fill($validatedData)->save();
            session()->flash('message', __('Classes successfully updated.'));
        }

        session()->flash('class', 'green');
        // $this->resetInputFields();

        return redirect()->route('classes.index');
    }

    public function render()
    {
        return view('livewire.classes.create-class');
    }
}
