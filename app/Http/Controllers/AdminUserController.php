<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Controller for managing admin user-related actions.
 */
class AdminUserController extends Controller
{
    /**
     * Log out the authenticated admin user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AdminLogout()
    {
        Auth::logout(); // Logs out the currently authenticated user.
        return Redirect()->route('login'); // Redirects the user to the 'login' route.
    }

    /**
     * Display the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function UserProfile()
    {
        $id = Auth::user()->id; // Gets the ID of the authenticated user.
        $user = User::find($id); // Finds the user record by ID.
        return view('backend.user.user_profile', compact('user')); // Passes user data to the view.
    }

    /**
     * Display the form for editing the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function UserProfileEdit()
    {
        $id = Auth::user()->id; // Gets the ID of the authenticated user.
        $user = User::find($id); // Finds the user record by ID.
        return view('backend.user.user_profile_edit', compact('user')); // Passes user data to the view.
    }

    /**
     * Store or update the authenticated user's profile data.
     *
     * @param  \Illuminate\Http\Request  $request The incoming HTTP request.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id); // Finds the authenticated user.
        $data->name = $request->name; // Updates user's name.
        $data->email = $request->email; // Updates user's email.

        // Handles profile photo upload and replacement.
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path)); // Deletes old photo.
            $filename = date('YmdHi') . $file->getClientOriginalName(); // Generates unique filename.
            $file->move(public_path('upload/user_images'), $filename); // Moves new photo.
            $data['profile_photo_path'] = $filename; // Updates photo path.
        }

        $data->save(); // Saves updated user data.

        $notification = [ // Prepares success notification.
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('user.profile')->with($notification); // Redirects with notification.
    }

    /**
     * Display the form for changing the authenticated user's password.
     *
     * @return \Illuminate\View\View
     */
    public function UserChangePassword()
    {
        $id = Auth::user()->id; // Gets the ID of the authenticated user.
        $user = User::find($id); // Finds the user record.
        return view('backend.user.change_password', compact('user')); // Passes user data to the view.
    }

    /**
     * Update the authenticated user's password.
     *
     * @param  \Illuminate\Http\Request  $request The incoming HTTP request.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UserPasswordUpdate(Request $request)
    {
        // Validates old and new passwords.
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->getAuthPassword(); // Gets current hashed password.

        // Checks if old password matches.
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id()); // Finds the authenticated user.
            $user->password = Hash::make($request->password); // Hashes and updates new password.
            $user->save(); // Saves the updated password.

            $notification = [ // Prepares success notification.
                'message' => 'Password updated successfully!',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification); // Redirects back with success.
        } else {
            $notification = [ // Prepares error notification.
                'message' => 'Old password does not match!',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification); // Redirects back with error.
        }
    }
}