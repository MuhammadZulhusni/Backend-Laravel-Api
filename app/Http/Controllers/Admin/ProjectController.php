<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project; // Project model for database interaction.
use Intervention\Image\Facades\Image; // Image manipulation library.

class ProjectController extends Controller
{
    /**
     * Get the first three projects.
     */
    public function onSelectThree()
    {
        return Project::limit(3)->get();
    }

    /**
     * Get all projects.
     */
    public function onSelectAll()
    {
        return Project::all();
    }

    /**
     * Get details for a specific project by ID.
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
     * Display all projects in the admin panel.
     */
    public function AllProject(){
        $projects = Project::all();
        return view('backend.project.all_project', compact('projects'));
    }

    /**
     * Show form to add a new project.
     */
    public function AddProject(){
       return view('backend.project.add_project');
    }

    /**
     * Store a new project with images.
     */
    public function StoreProject(Request $request){
       $request->validate([ // Validate project name, description, and first image.
            'project_name' => 'required',
            'project_description' => 'required',
            'img_one' => 'required',
        ],[
            'project_name.required' => 'Input Project Name',
            'project_description.required' => 'Input Project Description',
        ]);

        // Process and save first image.
        $image_one = $request->file('img_one');
        $name_gen_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension(); // Unique filename.
        Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen_one);
        $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen_one;

        // Process and save second image.
        $image_two = $request->file('img_two');
        $name_gen_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension(); // Unique filename.
        Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen_two);
        $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen_two;

        Project::insert([ // Insert project data into database.
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

         $notification = [ // Success notification.
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.projects')->with($notification);
    }

    /**
     * Show form to edit an existing project.
     */
    public function EditProject($id){
        $project = Project::findOrFail($id); // Find project by ID.
        return view('backend.project.edit_project',compact('project'));
    }

    /**
     * Update an existing project and its images.
     */
    public function UpdateProject(Request $request){
        $project_id = $request->id;
        $project = Project::findOrFail($project_id); // Get existing project data.

        $save_url_one = $project->img_one; // Retain old image URLs by default.
        $save_url_two = $project->img_two;

        // Handle update for Image One.
        if ($request->hasFile('img_one')) { // If a new image is uploaded.
            // Delete old image file if it exists.
            if ($project->img_one && file_exists(public_path('upload/project/'.basename($project->img_one)))) {
                unlink(public_path('upload/project/'.basename($project->img_one)));
            }
            $image_one = $request->file('img_one');
            $name_gen_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(626,417)->save('upload/project/'.$name_gen_one);
            $save_url_one = 'http://127.0.0.1:8000/upload/project/'.$name_gen_one;
        }

        // Handle update for Image Two.
        if ($request->hasFile('img_two')) { // If a new image is uploaded.
            // Delete old image file if it exists.
            if ($project->img_two && file_exists(public_path('upload/project/'.basename($project->img_two)))) {
                unlink(public_path('upload/project/'.basename($project->img_two)));
            }
            $image_two = $request->file('img_two');
            $name_gen_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(540,607)->save('upload/project/'.$name_gen_two);
            $save_url_two = 'http://127.0.0.1:8000/upload/project/'.$name_gen_two;
        }

        Project::findOrFail($project_id)->update([ // Update project data in database.
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'project_features' => $request->project_features,
            'live_preview' => $request->live_preview,
            'img_one' => $save_url_one,
            'img_two' => $save_url_two,
        ]);

        $notification = [ // Success notification.
            'message' => 'Project Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.projects')->with($notification);
    }

    /**
     * Delete a project.
     */
    public function DeleteProject($id){
        Project::findOrFail($id)->delete(); // Delete project by ID.

        $notification = [ // Success notification.
            'message' => 'Project Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}