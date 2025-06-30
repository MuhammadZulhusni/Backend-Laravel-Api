<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function ProjectDetails(Request $request)
    {
        $id = $request->input('id');
        $result = Project::where('id', $id)->get();
        return $result;
    }
}
