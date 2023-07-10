<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;

class RolePermissions extends Component
{
    public $permissions;
    public $rolesPermissions;
    public Role $role;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->rolesPermissions = $role->permissions;
        $this->permissions = \App\Models\Permission::all();
    }

    public function render()
    {
        return view('livewire.role-permissions');
    }
}
