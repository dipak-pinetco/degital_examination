<?php

namespace App\Http\Livewire\Admin;

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
        return view('livewire.admin.update-admin');
    }
}
