<?php

namespace App\Http\Livewire\Classes;

use App\Models\Clases;
use App\Models\ClassDivision;
use Livewire\Component;
use Livewire\WithPagination;

class ListClass extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $classes = Clases::with(['school','divisions'])->when(!empty($this->search), function ($query) {
            $query->whereLike(['name'], $this->search);
        })->orderBy('id', 'ASC')->paginate(Clases::PAGINATION_COUNT)->withPath('/classes')->withQueryString();
        return view('livewire.classes.list-class', ['classes' => $classes]);
    }

    public function adminDelete(Clases $clases)
    {
        $clases->delete();
        session()->flash('message', __('Class successfully deleted.'));
        session()->flash('class', 'green');
    }
}
