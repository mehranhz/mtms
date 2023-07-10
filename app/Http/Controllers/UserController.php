<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('user:read');
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function syncRoles(User $user, Request $request)
    {
        $this->authorize('user:write');
        $user->roles()->sync($request->role);
        return back();
    }
}
