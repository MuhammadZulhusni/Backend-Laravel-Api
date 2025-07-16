<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Log out the authenticated admin user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AdminLogout()
    {
        Auth::logout(); // Log out the user
        return Redirect()->route('login'); // Redirect to the login page
    }

    /**
     * Display the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function UserProfile()
    {
        $id = Auth::user()->id; // Get the ID of the authenticated user
        $user = User::find($id); // Find the user by ID

        return view('backend.user.user_profile', compact('user')); // Pass user data to the view
    }

    /**
     * Display the form for editing the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function UserProfileEdit()
    {
        $id = Auth::user()->id; // Get the ID of the authenticated user
        $user = User::find($id); // Find the user by ID

        return view('backend.user.user_profile_edit', compact('user')); // Pass user data to the edit view
    }

    /**
     * Store or update the authenticated user's profile data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id); // Get the authenticated user's record
        $data->name = $request->name; // Update user's name
        $data->email = $request->email; // Update user's email

        // Handle profile photo upload
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            // Delete old profile photo if it exists
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName(); // Generate unique filename
            $file->move(public_path('upload/user_images'), $filename); // Move uploaded file
            $data['profile_photo_path'] = $filename; // Update photo path in data
        }

        $data->save(); // Save the updated user data

        // Prepare success notification
        $notification = [
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('user.profile')->with($notification); // Redirect with notification
    }
}