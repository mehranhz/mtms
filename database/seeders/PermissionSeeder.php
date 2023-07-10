<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $roles = [
        'super admin' => [
            'permissions' => [
                'user:read',
                'user:write',
                'permission:read',
                'permission:write',
                'role:read',
                'role:write',
                'scenario:read',
                'scenario:write',
                'test-case:read',
                'test-case:write',
                'test:raed',
                'test:write',
                'app:read',
                'app:write',
            ]
        ],
        'tester' => [

        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->roles as $role=>$permissions) {
            try {
                $roleOBJ = Role::where('title', $role)->first();
                $rolePermissions = [];
                foreach ($permissions['permissions'] as $key=>$permission){
                    $rolePermissions[] = Permission::create([
                        'title'=>$permission
                    ])->id;
                }
                $roleOBJ->permissions()->sync($rolePermissions);
            } catch (\Exception $exception) {

            }
        }
    }
}
