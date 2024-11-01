<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
{
    // Validate the incoming request data with specific rules and custom error messages
    $request->validate([
       'name' => 'required|max:255|string', // Ensure 'name' is required, a string, and no longer than 255 characters
        'email' => 'required|email|unique:users,email', // Ensure 'email' is required, a valid format, and unique in the 'users' table
        'phone' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'], // Ensure 'phone' is required and exactly 10 digits
        'description' => 'required|string', // Ensure 'description' is required and a string
        'role_id' => 'required|exists:roles,id', // Ensure 'role_id' is required and references an existing ID in the 'roles' table
        'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048' // Ensure 'profile_image' is required, an image file, and one of the allowed MIME types with a max size of 2MB
    ], [
        'role_id.required' => 'Please select a role for the user.', // Custom error message for 'role_id' required validation
        'role_id.exists' => 'The selected role is invalid. Please choose a valid role.' // Custom error message for 'role_id' existence validation
    ]);

    // Retrieve all the validated request data
    $data = $request->all();

    // Check if a profile image file is uploaded and handle file storage
    if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('profile_images', 'public'); // Store the file in 'profile_images' directory under 'public' disk
        $data['profile_image'] = $path; // Add the stored path to the data array
    }

    // Create a new user record in the database
    User::create($data);

    // Retrieve all users with their associated role for display
    $user = User::with('role')->get();
    
    // Return a view to display the user information table, passing the 'user' data
    return view('components.User.UserInfoTable', compact('user'));
}
}
