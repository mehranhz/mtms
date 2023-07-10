<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Role;

class RoleUser extends Component
{
    public $user;
    public $roles;
    public $userRoles;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = Role::all();
        $this->userRoles = $user->roles;
    }

    public function render()
    {
        return view('livewire.role-user');
    }
}
