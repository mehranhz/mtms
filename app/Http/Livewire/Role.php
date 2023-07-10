<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Role extends Component
{
    public $showCreateForm = false;
    public $showUpdateForm = false;
    public $activeRow = 0;

    public \App\Models\Role $activeRole;

    public function __construct(public $roles)
    {
        $this->roles = \App\Models\Role::all();
    }

    public function render()
    {
        return view('livewire.role');
    }

    public function activateForm()
    {
        $this->showCreateForm = true;
    }

    public function deActiveForm()
    {
        $this->showCreateForm = false;
    }

    public function activateUpdateForm($role)
    {
        $this->activeRow = $role;
        $this->activeRole = \App\Models\Role::find($role);
        $this->showUpdateForm = true;
    }

    public function deActiveUpdateForm()
    {
        $this->activeRow = 0;
        $this->showUpdateForm = false;
    }
}
