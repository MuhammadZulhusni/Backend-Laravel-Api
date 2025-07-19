<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Footer; 

class FooterController extends Controller
{
    public function onAllSelect()
    {
        $result = Footer::all(); // Fetches all footer records.
        return $result; // Returns the fetched footer data.
    }

    public function AllFooterContent(){
        $footer = Footer::all(); // Retrieves all footer records from the database.
        return view('backend.footer.all_footer',compact('footer')); // Returns the 'all_footer' view, passing the footer data to it.
    } 

    public function EditFooterContent($id){
        $footer = Footer::findOrFail($id); // Finds a footer record by its ID or aborts with a 404 error.
        return view('backend.footer.edit_footer',compact('footer')); // Returns the 'edit_footer' view, passing the specific footer data for editing.
    } // end method 

    public function UpdateFooterContent(Request $request){
        $footer_id = $request->id; // Gets the ID of the footer record to be updated from the request.

        Footer::findOrFail($footer_id)->update([ // Finds the footer record by ID and updates its fields.
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'footer_credit' => $request->footer_credit,
        ]);

        $notification = array( // Prepares a success notification message.
            'message' => 'Footer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.footer.content')->with($notification); // Redirects to the 'all_footer_content' route with the success notification.
    } // end method 
}