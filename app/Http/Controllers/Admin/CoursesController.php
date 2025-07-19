<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses; 
use Intervention\Image\Facades\Image; // Image manipulation library.

class CoursesController extends Controller
{
    /**
     * Get the first four courses.
     */
    public function onSelectFour()
    {
        return Courses::limit(4)->get();
    }

    /**
     * Get all courses.
     */
    public function onSelectAll()
    {
        return Courses::all();
    }

    /**
     * Get details for a specific course by ID.
     */
    public function onSelectDetails(Request $request, $id)
    {
        return Courses::where('id', $id)->get();
    }

    /**
     * Display all courses in the admin panel.
     */
    public function AllCourses()
    {
        $courses = Courses::all();
        return view('backend.courses.all_courses', compact('courses'));
    }

    /**
     * Show form to add a new course.
     */
    public function AddCourses(){
         return view('backend.courses.add_courses');
    }

    /**
     * Store a new course with its image.
     */
    public function StoreCourses(Request $request){
        $request->validate([ // Validate required fields.
            'short_title' => 'required',
            'short_description' => 'required',
            'small_img' => 'required',
        ],[
            'short_title.required' => 'Input Short Title Name',
            'short_description.required' => 'Input Short Description',
        ]);

        // Process and save the small image.
        $image = $request->file('small_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(626,417)->save('upload/courses/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/courses/'.$name_gen;

        Courses::insert([ // Insert course data into database.
            'short_title' => $request->short_title,
            'short_description' => $request->short_description,
            'long_title' => $request->long_title,
            'long_description' => $request->long_description,
            'total_duration' => $request->total_duration,
            'total_lecture' => $request->total_lecture,
            'total_student' => $request->total_student,
            'skill_all' => $request->skill_all,
            'video_url' => $request->video_url,
            'small_img' => $save_url,
        ]);

        $notification = [ // Success notification.
            'message' => 'Courses Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.courses')->with($notification);
    }

    /**
     * Show form to edit an existing course.
     */
    public function EditCourses($id){
        $courses = Courses::findOrFail($id); // Find course by ID.
        return view('backend.courses.edit_courses',compact('courses'));
    }

    /**
     * Update an existing course and its image.
     */
    public function UpdateCourses(Request $request){
        $course_id = $request->id;

        if ($request->file('small_img')) { // If a new image is uploaded.

            $image = $request->file('small_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(626,417)->save('upload/courses/'.$name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/courses/'.$name_gen;

            Courses::findOrFail($course_id)->update([ // Update course with new image.
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_title' => $request->long_title,
                'long_description' => $request->long_description,
                'total_duration' => $request->total_duration,
                'total_lecture' => $request->total_lecture,
                'total_student' => $request->total_student,
                'skill_all' => $request->skill_all,
                'video_url' => $request->video_url,
                'small_img' => $save_url,
            ]);

            $notification = [ // Success notification with image update.
                'message' => 'Course Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.courses')->with($notification);

        }else{ // If no new image is uploaded, update only text fields.

            Courses::findOrFail($course_id)->update([
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_title' => $request->long_title,
                'long_description' => $request->long_description,
                'total_duration' => $request->total_duration,
                'total_lecture' => $request->total_lecture,
                'total_student' => $request->total_student,
                'skill_all' => $request->skill_all,
                'video_url' => $request->video_url,
            ]);

            $notification = [ // Success notification without image update.
                'message' => 'Course Updated Without Image Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.courses')->with($notification);
        }
    }

    /**
     * Delete a course.
     */
    public function DeleteCourses($id){
        Courses::findOrFail($id)->delete(); // Delete course by ID.

        $notification = [ // Success notification.
            'message' => 'Courses Delected Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}