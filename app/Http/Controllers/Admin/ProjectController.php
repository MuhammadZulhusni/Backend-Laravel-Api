<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Project;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function onSelectThree()
    {
        $result = Project::limit(3)->get();
        return $result;
    }

    public function onSelectAll()
    {
        $result = Project::all();
        return $result;
    }

    // IMPORTANT: Change this method to accept the ID directly as a parameter
    // This $id parameter will automatically be populated from the {id} in your route (e.g., /projectdetails/{id})
    public function ProjectDetails($id) // Removed Request $request, added $id
    {
        // Now, $id is directly available from the URL segment
        $result = Project::where('id', $id)->get(); // Use the $id directly

        // Optional: Add a check for not found
        if ($result->isEmpty()) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return $result; // Laravel will automatically convert this Collection to JSON
    }

    public function AllProject(){
        $projects = Project::all();
        return view('backend.project.all_project',compact('projects'));
    } 

    public function AddProject(){
       return view('backend.project.add_project');
    } 

    public function StoreProject(Request $request){

       $request->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',
        ],[
            'project_name.required' => 'Input Project Name',
            'project_description.required' => 'Input Project Description',

        ]);

        $image_one = $request->file('img_one'); 
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen);
        $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen;


        $image_two = $request->file('img_two'); 
        $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen);
        $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

        Project::insert([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

         $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.projects')->with($notification);

    } 

       public function EditProject($id){

        $project = Project::findOrFail($id);
        return view('backend.project.edit_project',compact('project'));

    } 


    public function UpdateProject(Request $request){

        $project_id = $request->id;

        if ($request->file('img_one')) {

        $image_one = $request->file('img_one'); 
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen);
        $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen;


        $image_two = $request->file('img_two'); 
        $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen);
        $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

        Project::findOrFail($project_id)->update([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

         $notification = array(
            'message' => 'Project Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.projects')->with($notification);
            
        }else{

            Project::findOrFail($project_id)->update([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            
        ]);

         $notification = array(
            'message' => 'Project Updated Without Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.projects')->with($notification);

        }

    } 

    public function DeleteProject($id){

        Project::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Project Delected Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end mehtod 
}