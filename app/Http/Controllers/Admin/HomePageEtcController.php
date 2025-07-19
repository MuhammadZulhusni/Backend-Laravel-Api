<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageEtc; 

class HomePageEtcController extends Controller
{
    /**
     * Retrieves video description and URL.
     */
    public function SelectVideo()
    {
        return HomePageEtc::select('video_description', 'video_url')->get();
    }

    /**
     * Retrieves total student, course, and review counts.
     */
    public function SelectTotalHome()
    {
        return HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
    }

    /**
     * Retrieves technology description.
     */
    public function SelectTechHome()
    {
        return HomePageEtc::select('tech_description')->get();
    }

    /**
     * Retrieves home title and subtitle.
     */
    public function SelectHomeTitle()
    {
        return HomePageEtc::select('home_title', 'home_subtitle')->get();
    }

    /**
     * Displays all home page content in the admin panel.
     */
    public function AllHomeContent()
    {
        $homecontent = HomePageEtc::all();
        return view('backend.homecontent.all_homecontent', compact('homecontent'));
    }

    /**
     * Shows the form for adding new home page content.
     */
    public function AddHomeContent(){
        return view('backend.homecontent.add_homecontent');
    }

    /**
     * Stores a newly created home page content record in the database.
     */
    public function StoreHomeContent(Request $request){
        // Validates all incoming request data based on database NOT NULL constraints.
        $request->validate([
            'home_title' => 'required|string|max:255',
            'home_subtitle' => 'required|string|max:255',
            'tech_description' => 'required|string',
            'total_student' => 'required|integer',
            'total_course' => 'required|integer',
            'total_review' => 'required|integer',
            'video_description' => 'required|string',
            'video_url' => 'required|url|max:255',
        ],[
            // Custom error messages for validation failures.
            'home_title.required' => 'Please enter the Home Title.',
            'home_subtitle.required' => 'Please enter the Home Subtitle.',
            'tech_description.required' => 'Please enter the Technology Description.',
            'total_student.required' => 'Please enter the Total Students count.',
            'total_student.integer' => 'Total Students must be a number.',
            'total_course.required' => 'Please enter the Total Courses count.',
            'total_course.integer' => 'Total Courses must be a number.',
            'total_review.required' => 'Please enter the Total Reviews count.',
            'total_review.integer' => 'Total Reviews must be a number.',
            'video_description.required' => 'Please enter the Video Description.',
            'video_url.required' => 'Please enter the Video URL.',
            'video_url.url' => 'Please enter a valid URL for the Video.',
        ]);

        // Inserts new record into the home_page_etcs table.
        HomePageEtc::insert([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,
            'total_student' => $request->total_student,
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,
            'created_at' => now(), // Sets creation timestamp.
            'updated_at' => now(), // Sets update timestamp.
        ]);

        // Prepares a success notification.
        $notification = [
            'message' => 'Home Content Inserted Successfully',
            'alert-type' => 'success'
        ];

        // Redirects to the all home content page with the notification.
        return redirect()->route('all.home.content')->with($notification);
    }

    /**
     * Shows the form for editing existing home page content.
     *
     * @param int $id The ID of the home content to edit.
     */
    public function EditHomeContent($id){
        $homecontent = HomePageEtc::findOrFail($id); // Finds content by ID or throws 404.
        return view('backend.homecontent.edit_homecontent', compact('homecontent'));
    }

    /**
     * Updates an existing home page content record in the database.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function UpdateHomeContent(Request $request){
        $home_id = $request->id;

        // Updates the record found by ID with new data.
        HomePageEtc::findOrFail($home_id)->update([
            'home_title' => $request->home_title,
            'home_subtitle' => $request->home_subtitle,
            'tech_description' => $request->tech_description,
            'total_student' => $request->total_student,
            'total_course' => $request->total_course,
            'total_review' => $request->total_review,
            'video_description' => $request->video_description,
            'video_url' => $request->video_url,
        ]);

        // Prepares a success notification.
        $notification = [
            'message' => 'Home Content Updated Successfully',
            'alert-type' => 'success'
        ];

        // Redirects to the all home content page with the notification.
        return redirect()->route('all.home.content')->with($notification);
    }

    /**
     * Deletes a home page content record from the database.
     *
     * @param int $id The ID of the home content to delete.
     */
    public function DeleteHomeContent($id){
        HomePageEtc::findOrFail($id)->delete(); // Finds and deletes the record.

        // Prepares a success notification.
        $notification = [
            'message' => 'Home Content Deleted Successfully',
            'alert-type' => 'success'
        ];

        // Redirects back to the previous page with the notification.
        return redirect()->back()->with($notification);
    }
}