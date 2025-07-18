<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information; 

class InformationController extends Controller
{
    // Fetches all information records from the database
    public function onAllSelect()
    {
        $result = Information::all();
        return $result;
    }

    // Displays all information records in a view
    public function AllInformation()
    {
        $result = Information::all();
        return view('backend.information.all_information',compact('result'));
    } 

    // Shows the form to add new information
    public function AddInformation(){
        return view('backend.information.add_information');
    }

    // Stores a new information record in the database
    public function StoreInformation(Request $request)
    {
        Information::insert([
            'about' => $request->about,
            'refund' => $request->refund,
            'trems' => $request->trems,
            'privacy' => $request->privacy,
        ]);

        $notification = array(
            'message' => 'Information Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.information')->with($notification);
    } 

    // Shows the form to edit an existing information record
    public function EditInformation($id){
        $information = Information::findOrFail($id); 
        return view('backend.information.edit_inforamtion',compact('information'));
    } 

    // Updates an existing information record in the database
    public function UpdateInformation(Request $request, $id){
        Information::findOrFail($id)->update([
            'about' => $request->about,
            'refund' => $request->refund,
            'trems' => $request->trems,
            'privacy' => $request->privacy,
        ]);

        $notification = array(
            'message' => 'Information Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.information')->with($notification);
    }

    // Deletes an information record from the database
    public function DeleteInformation($id){
        Information::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Information Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } 
}