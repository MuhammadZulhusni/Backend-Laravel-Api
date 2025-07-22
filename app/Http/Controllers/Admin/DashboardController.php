<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Services;
use App\Models\Project;
use App\Models\Courses;
use App\Models\HomePageEtc;
use App\Models\ClientReview;
use App\Models\Chart; 

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch total counts for each card (from previous implementation)
        $totalInformation = Information::count();
        $totalServices = Services::count();
        $totalProjects = Project::count();
        $totalCourses = Courses::count();
        $totalHomeContent = HomePageEtc::count();
        $totalClientReviews = ClientReview::count();

        // --- Fetch data for the bar chart from the 'charts' table ---
        $chartData = Chart::all(); // Get all records from the 'charts' table

        // Prepare data for Chart.js
        $chartLabels = $chartData->pluck('x_data')->toArray(); // 'x_data' for technology names
        $chartValues = $chartData->pluck('y_data')->toArray(); // 'y_data' for values

        return view('admin.index', compact(
            'totalInformation',
            'totalServices',
            'totalProjects',
            'totalCourses',
            'totalHomeContent',
            'totalClientReviews',
            'chartLabels',   // Pass the technology names for X-axis labels
            'chartValues'    // Pass the corresponding values for Y-axis data
        ));
    }
}