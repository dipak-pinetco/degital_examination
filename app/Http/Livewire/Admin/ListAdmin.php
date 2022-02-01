<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListAdmin extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $users = User::with(['roles'])->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->when(!auth()->user()->hasRole('super-admin'), function ($query) {
            $query->whereHas('school', function ($query) {
                $query->where('id', auth()->user()->school_id);
            });
        })->when(!empty($this->search), function ($query) {
            $query->whereLike(['first_name'], $this->search);
        })->paginate(User::PAGINATION_COUNT)->withPath('/admin')->withQueryString();
        return view('livewire.admin.list-admin', ['users' => $users]);
    }

    public function adminDelete(User $admin)
    {
        $admin->delete();
        session()->flash('message', __('Admin successfully deleted.'));
        session()->flash('class', 'green');
    }
}
