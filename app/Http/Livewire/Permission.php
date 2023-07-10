<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Permission extends Component
{
    public $showCreateForm = false;
    public $showUpdateForm = false;
    public $activeRow = 0;

    public \App\Models\Permission $activePermission;

    public function __construct(public $permissions)
    {
        $this->permissions = \App\Models\Permission::all();
    }

    public function render()
    {
        return view('livewire.permission');
    }

    public function activateForm()
    {
        $this->showCreateForm = true;
    }

    public function deActiveForm()
    {
        $this->showCreateForm = false;
    }

    public function activateUpdateForm($permission)
    {
        $this->activeRow = $permission;
        $this->activePermission = \App\Models\Permission::find($permission);
        $this->showUpdateForm = true;
    }

    public function deActiveUpdateForm()
    {
        $this->activeRow = 0;
        $this->showUpdateForm = false;
    }
}
