<?php

namespace App\Http\Livewire\Admins;

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
        $users = User::RoleUser(['admin'])
            ->when(!empty($this->search), function ($query) {
                $query->whereLike(['first_name'], $this->search);
            })->orderBy('id', 'DESC')->paginate(User::PAGINATION_COUNT)->withPath('/admin')->withQueryString();
        return view('livewire.admins.list-admin', ['users' => $users]);
    }

    public function adminDelete(User $admin)
    {
        $admin->delete();
        session()->flash('message', __('Admin successfully deleted.'));
        session()->flash('class', 'green');
    }
}
