<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('role:read');
        return view('role.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('role:write');

        Role::create([
            'title' => $request->title,
            'description' => $request->description
        ]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('role:write');
        $role->title = $request->title ?? $role->title;
        $role->description = $request->description ?? $role->description;
        $role->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize('role:write');
        $role->delete();
        return back();
    }

    public function syncPermissions(Request $request,Role $role){
        $this->authorize('role:write');
        $role->permissions()->sync($request->permission);
        return back();
    }
}
