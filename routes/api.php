<?php

use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ServiceController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route to fetch all chart data from the ChartController using the 'onAllSelect' method
Route::get('/chartdata', [ChartController::class, 'onAllSelect']);

// Client Review Section 
// Get all client reviews
Route::get('/clientreview', [ClientReviewController::class, 'onAllSelect']);

// Contact Section
// Send contact form data
Route::post('/contactsend', [ContactController::class, 'onContactSend']);

// Courses Section
// Get 4 courses for home page
Route::get('/coursehome', [CoursesController::class, 'onSelectFour']);
// Get all courses
Route::get('/courseall', [CoursesController::class, 'onSelectAll']);
// Get details of a specific course
Route::post('/coursedetails', [CoursesController::class, 'onSelectDetails']);

// Footer Section
// Get footer information
Route::get('/footerdata', [FooterController::class, 'onAllSelect']);

// Information Section 
// Get general information
Route::get('/information', [InformationController::class, 'onAllSelect']);

// Services Section 
// View available services
Route::get('/services', [ServiceController::class, 'ServiceView']);

// Projects Section 
// Get 3 projects for home page
Route::get('/projecthome', [ProjectController::class, 'onSelectThree']);
// Get all projects
Route::get('/projecteall', [ProjectController::class, 'onSelectAll']);
// Get details of a specific project
Route::post('/projectdetails', [ProjectController::class, 'ProjectDetails']);

// Home Page Section 
// Get home page video section data
Route::get('/home/video', [HomePageEtcController::class, 'SelectVideo']);
// Get total counts/statistics for home page
Route::get('/totalhome', [HomePageEtcController::class, 'SelectTotalHome']);
// Get technology section data for home page
Route::get('/techhome', [HomePageEtcController::class, 'SelectTechHome']);
// Get home page title data
Route::get('/homepage/title', [HomePageEtcController::class, 'SelectHomeTitle']);
