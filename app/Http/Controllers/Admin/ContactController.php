<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\Models\Contact; 

class ContactController extends Controller
{
    /**
     * Stores a new contact message from a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int Returns 1 on success, 0 on failure.
     */
    public function onContactSend(Request $request)
    {
        // Inserts a new record into the 'contacts' table with data from the request.
        $result = Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return $result ? 1 : 0; // Returns 1 if insertion was successful, otherwise 0.
    }

    /**
     * Displays all contact messages in the backend.
     *
     * @return \Illuminate\View\View
     */
    public function AllContactMessage()
    {
        $contact = Contact::all(); // Fetches all contact messages from the database.
        return view('backend.contact.all_contact', compact('contact')); // Returns the 'all_contact' view, passing the fetched data.
    }

    /**
     * Deletes a specific contact message by ID.
     *
     * @param  int  $id The ID of the contact message to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function DeleteContactMessage($id)
    {
        Contact::findOrFail($id)->delete(); // Finds the contact message by ID and deletes it; throws 404 if not found.

        $notification = array( // Prepares a success notification.
            'message' => 'Contact Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); // Redirects back to the previous page with the notification.
    }
}