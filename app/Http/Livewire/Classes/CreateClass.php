<?php

namespace App\Http\Livewire\Classes;

use App\Models\Clases;
use App\Models\ClassDivision;
use App\Rules\AlphabeticalSequence;
use App\Rules\Sequence;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateClass extends Component
{
    public $name, $class;
    public array $divisions = [];

    public function mount($class = null)
    {
        if ($class) {
            $this->class = $class;
            $this->name = $class->name;
            $this->divisions = $class->divisions->pluck('name', 'name')->toArray();
        }
    }

    protected function rules()
    {
        $validation = [
            'divisions' => ['required', 'min:1', new Sequence(ClassDivision::class_divisions_array())]
        ];

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
        $this->divisions = Arr::sort(array_filter($this->divisions));
        $validatedData = $this->validate();
        $validatedData['school_id'] = auth()->user()->school_id;

        if (is_null($this->class)) {
            $this->class = Clases::create($validatedData);
            session()->flash('message', __('Classes successfully created.'));
        } else {
            $this->class->fill($validatedData)->save();
            session()->flash('message', __('Classes successfully updated.'));
        }

        $available_divisions = collect(
            $this->class->divisions()
                ->select('id', 'class_id', 'name')
                ->whereIn('name', array_values($this->divisions))->get()
        );

        $updatedDivisions = [];

        foreach (array_values($this->divisions) as $key => $value) {
            if ($available_divisions->where('name', $value)->isEmpty()) {
                $updatedDivisions[] = ['name' => $value];
            }
        }
        $updatedDivisions = array_merge($updatedDivisions, $available_divisions->toArray());
        $this->class->divisions()->sync($updatedDivisions);

        session()->flash('class', 'green');
        // $this->resetInputFields();

        return redirect()->route('classes.index');
    }

    public function render()
    {
        return view('livewire.classes.create-class', ['classes_divisions' => ClassDivision::class_divisions_array()]);
    }
}
