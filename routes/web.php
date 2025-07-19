<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminUserController; 
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomePageEtcController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ClientReviewController;

Route::get('/', function () {
    return view('auth.login');
});

// Routes requiring authentication, Sanctum, Jetstream session, and verification
Route::middleware([
    'auth:sanctum', // Authenticate using Sanctum
    config('jetstream.auth_session'), // Utilize Jetstream's authentication session
    'verified', // Ensure user is verified
])->group(function () {
    // Dashboard route for authenticated users
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

// Admin logout route
Route::get('/logout',[AdminUserController::class, 'AdminLogout'])->name('admin.logout');

// Admin-specific routes with '/admin' prefix
Route::prefix('admin')->group(function(){
    // Route to display user profile
    Route::get('/user/profile',[AdminUserController::class, 'UserProfile'])->name('user.profile');
    // Route to display user profile edit form
    Route::get('/user/profile/edit',[AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    // Route to store updated user profile data
    Route::post('/user/profile/store',[AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
    // Route to display change passsword form
    Route::get('/change/password',[AdminUserController::class, 'UserChangePassword'])->name('change.password');
    // Route to change/update new password
    Route::post('/change/password/update',[AdminUserController::class, 'UserPasswordUpdate'])->name('change.password.update');
});

// Groups all routes related to 'information' under the '/information' URL prefix.
Route::prefix('information')->group(function(){
    // Route to display all information records.
    Route::get('/all',[InformationController::class, 'AllInformation'])->name('all.information');
    // Route to display the form for adding new information.
    Route::get('/add',[InformationController::class, 'AddInformation'])->name('add.information');
    // Route to store new information submitted via a POST request.
    Route::post('/store',[InformationController::class, 'StoreInformation'])->name('information.store');
    // Route to display the form for editing a specific information record, identified by its ID.
    Route::get('/edit/{id}',[InformationController::class, 'EditInformation'])->name('edit.information');
    // Route to update a specific information record, identified by its ID, via a POST request.
    Route::post('/update/{id}',[InformationController::class, 'UpdateInformation'])->name('information.update');
    // Route to delete a specific information record, identified by its ID.
    Route::get('/delete/{id}',[InformationController::class, 'DeleteInformation'])->name('delete.information');
});

// Groups all routes related to 'service' under the '/service' URL prefix.
Route::prefix('service')->group(function(){
    // Display all services
    Route::get('/all',[ServiceController::class, 'AllService'])->name('all.services');
    // Show form to add a new service
    Route::get('/add',[ServiceController::class, 'AddService'])->name('add.services');
    // Store a new service in the database
    Route::post('/store',[ServiceController::class, 'StoreService'])->name('service.store');
    // Show form to edit an existing service
    Route::get('/edit/{id}',[ServiceController::class, 'EditService'])->name('edit.service');
    // Update an existing service in the database
    Route::post('/update',[ServiceController::class, 'UpdateService'])->name('service.update');
    // Delete a service from the database
    Route::get('/delete/{id}',[ServiceController::class, 'DeleteService'])->name('delete.service');
});

// Groups all routes related to 'project' under the '/project' URL prefix.
Route::prefix('project')->group(function(){
    // Display all projects
    Route::get('/all',[ProjectController::class, 'AllProject'])->name('all.projects');
    // Show form to add a new project
    Route::get('/add',[ProjectController::class, 'AddProject'])->name('add.projects');
    // Store a new project in the database
    Route::post('/store',[ProjectController::class, 'StoreProject'])->name('project.store');
    // Show form to edit an existing project
    Route::get('/edit/{id}',[ProjectController::class, 'EditProject'])->name('edit.project');
    // Update an existing project in the database
    Route::post('/update/',[ProjectController::class, 'UpdateProject'])->name('project.update');
    // Delete a project from the database
    Route::get('/delete/{id}',[ProjectController::class, 'DeleteProject'])->name('delete.project'); 
});

// Groups all routes related to 'course' under the '/course' URL prefix.
Route::prefix('course')->group(function(){
    // Route to display all courses.
    Route::get('/all',[CoursesController::class, 'AllCourses'])->name('all.courses');
    // Route to show the form for adding a new course.
    Route::get('/add',[CoursesController::class, 'AddCourses'])->name('add.courses');
    // Route to store a new course in the database.
    Route::post('/store',[CoursesController::class, 'StoreCourses'])->name('courses.store');
    // Route to show the form for editing an existing course by its ID.
    Route::get('/edit/{id}',[CoursesController::class, 'EditCourses'])->name('edit.courses');
    // Route to update an existing course in the database.
    Route::post('/update/',[CoursesController::class, 'UpdateCourses'])->name('courses.update');
    // Route to delete a course by its ID.
    Route::get('/delete/{id}',[CoursesController::class, 'DeleteCourses'])->name('delete.courses');
});

// Groups all routes related to 'home' under the '/home' URL prefix.
Route::prefix('home')->group(function(){
    // Route to display all home page content.
    Route::get('/all',[HomePageEtcController::class, 'AllHomeContent'])->name('all.home.content');
    // Route to show the form for adding new home page content.
    Route::get('/add',[HomePageEtcController::class, 'AddHomeContent'])->name('add.home.content');
    // Route to store new home page content in the database.
    Route::post('/store',[HomePageEtcController::class, 'StoreHomeContent'])->name('homecontent.store');
    // Route to show the form for editing existing home page content by ID.
    Route::get('/edit/{id}',[HomePageEtcController::class, 'EditHomeContent'])->name('edit.homecontent');
    // Route to update existing home page content in the database.
    Route::post('/update/',[HomePageEtcController::class, 'UpdateHomeContent'])->name('homecontent.update');
    // Route to delete home page content by ID.
    Route::get('/delete/{id}',[HomePageEtcController::class, 'DeleteHomeContent'])->name('delete.homecontent');
});

// Groups all routes related to 'review' under the '/review' URL prefix.
Route::prefix('review')->group(function(){
    // Route to display all reviews.
    Route::get('/all',[ClientReviewController::class, 'AllReview'])->name('all.review');
    // Route to display the form for adding a review.
    Route::get('/add',[ClientReviewController::class, 'AddReview'])->name('add.review');
    // Route to store a new review.
    Route::post('/store',[ClientReviewController::class, 'StoreReview'])->name('review.store');
    // Route to display the form for editing a review, takes review ID.
    Route::get('/edit/{id}',[ClientReviewController::class, 'EditReview'])->name('edit.review');
    // Route to update an existing review.
    Route::post('/update/',[ClientReviewController::class, 'UpdateReview'])->name('review.update');
    // Route to delete a review, takes review ID.
    Route::get('/delete/{id}',[ClientReviewController::class, 'DeleteReview'])->name('delete.review'); 
});

// Groups all routes related to 'footer' under the '/footer' URL prefix.
Route::prefix('footer')->group(function(){
    // Route to display all footer.
    Route::get('/all',[FooterController::class, 'AllFooterContent'])->name('all.footer.content');
    // Route to display the form for editing, takes footer ID.
    Route::get('/edit/{id}',[FooterController::class, 'EditFooterContent'])->name('edit.footer');
    // Route to update an existing footer.
    Route::post('/update/',[FooterController::class, 'UpdateFooterContent'])->name('footer.update');
});

 // Chart Content All Routes 
Route::prefix('chart')->group(function(){
    Route::get('/all',[ChartController::class, 'AllChartContent'])->name('all.chart.content');
    Route::get('/edit/{id}',[ChartController::class, 'EditChartContent'])->name('edit.chart');
    Route::post('/update/',[ChartController::class, 'UpdateChartContent'])->name('chart.update');
});

Route::get('/all',[ContactController::class, 'AllContactMessage'])->name('contact.message');
Route::get('/delete/message/{id}',[ContactController::class, 'DeleteContactMessage'])->name('delete.message'); 