<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project; // Imports the Project Eloquent model.
use Intervention\Image\Facades\Image; // Imports the Intervention Image facade for image manipulation.

class ProjectController extends Controller
{
    /**
     * Retrieves the first three projects.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function onSelectThree()
    {
        $result = Project::limit(3)->get();
        return $result;
    }

    /**
     * Retrieves all projects.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function onSelectAll()
    {
        $result = Project::all();
        return $result;
    }

    /**
     * Retrieves details for a specific project by its ID.
     *
     * @param int $id The ID of the project.
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Database\Eloquent\Collection
     */
    public function ProjectDetails($id)
    {
        $result = Project::where('id', $id)->get();

        if ($result->isEmpty()) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return $result;
    }

    /**
     * Displays a list of all projects in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function AllProject(){
        $projects = Project::all();
        return view('backend.project.all_project',compact('projects'));
    }

    /**
     * Shows the form for adding a new project.
     *
     * @return \Illuminate\View\View
     */
    public function AddProject(){
       return view('backend.project.add_project');
    }

    /**
     * Stores a newly created project in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreProject(Request $request){
       $request->validate([ // Validates incoming request data.
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',
        ],[
            'project_name.required' => 'Input Project Name', // Custom error message.
            'project_description.required' => 'Input Project Description', // Custom error message.
        ]);

        // Handles upload and resizing for the first image.
        $image_one = $request->file('img_one');
        $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
        Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen);
        $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

        // Handles upload and resizing for the second image.
        $image_two = $request->file('img_two');
        $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
        Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen);
        $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

        Project::insert([ // Inserts new project record into the database.
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

         $notification = array( // Prepares a success notification.
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.projects')->with($notification); // Redirects to all projects with notification.
    }

    /**
     * Shows the form for editing an existing project.
     *
     * @param int $id The ID of the project to edit.
     * @return \Illuminate\View\View
     */
    public function EditProject($id){
        $project = Project::findOrFail($id); // Finds the project by ID or throws 404.
        return view('backend.project.edit_project',compact('project'));
    }

    /**
     * Updates an existing project in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdateProject(Request $request){
        $project_id = $request->id;

        if ($request->file('img_one')) { // Checks if new images are uploaded.

            // Handles upload and resizing for the first image.
            $image_one = $request->file('img_one');
            $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen);
            $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

            // Handles upload and resizing for the second image.
            $image_two = $request->file('img_two');
            $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen);
            $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen;

            Project::findOrFail($project_id)->update([ // Updates project with new images.
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
                'img_one' => $save_url_one,
                'img_two' => $save_url_two,
            ]);

            $notification = array( // Success notification with image update.
                'message' => 'Project Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.projects')->with($notification);

        }else{ // If no new images are uploaded, update only text fields.

            Project::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
            ]);

            $notification = array( // Info notification without image update.
                'message' => 'Project Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.projects')->with($notification);
        }
    }

    /**
     * Deletes a project from the database.
     *
     * @param int $id The ID of the project to delete.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function DeleteProject($id){
        Project::findOrFail($id)->delete(); // Finds and deletes the project.

        $notification = array( // Success notification for deletion.
            'message' => 'Project Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); // Redirects back to the previous page.
    }
}