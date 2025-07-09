<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Still needed if you use Request for other things, but not for ID here
use App\Models\Project;

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
}