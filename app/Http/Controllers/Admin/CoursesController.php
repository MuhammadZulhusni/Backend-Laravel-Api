<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses; 

class CoursesController extends Controller
{
    public function onSelectFour()
    {
        $result = Courses::limit(4)->get();
        return $result;
    }
    public function onSelectAll()
    {
        $result = Courses::all();
        return $result;
    }
    public function onSelectDetails(Request $request, $id) // Accept $id directly as a parameter
    {
        $result = Courses::where('id', $id)->get();
        return $result;
    }
}
