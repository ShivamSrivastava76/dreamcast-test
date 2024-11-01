<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class InedxController extends Controller
{
    public function index()
    {
        // Retrieve all role records from the 'roles' table
        $role = Role::all();
    
        // Retrieve all user records along with their associated role from the 'users' table
        $user = User::with('role')->get();
    
        // Return the 'welcome' view, passing both 'user' and 'role' data to it
        return view('welcome', compact('user', 'role'));
    }
}
