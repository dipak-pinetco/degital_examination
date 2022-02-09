<?php

namespace App\Http\Livewire\Admins;

use App\Models\User;
use Livewire\Component;

class UpdateAdmin extends Component
{
    public $admin;

    public function mount(User $id)
    {
        $this->admin = $id;
    }

    public function render()
    {
        return view('livewire.admins.update-admin');
    }
}
