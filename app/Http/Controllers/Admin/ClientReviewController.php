<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\ClientReview; 
use Intervention\Image\Facades\Image; // Imports the Image facade for image manipulation.

class ClientReviewController extends Controller
{
    public function onAllSelect()
    {
        $result = ClientReview::all(); // Retrieves all client reviews.
        return $result; // Returns the retrieved reviews.
    }

    public function AllReview(){
        $review = ClientReview::all(); // Fetches all client reviews.
        return view('backend.review.all_review',compact('review')); // Returns the 'all_review' view with review data.
    } 

    public function AddReview(){
        return view('backend.review.add_review'); // Returns the 'add_review' view.
    }

    public function StoreReview(Request $request){
        // Validates incoming request data.
        $request->validate([
            'client_title' => 'required',
            'client_description' => 'required',
            'client_img' => 'required',
        ],[
            'client_title.required' => 'Input Client Name', // Custom error message for client title.
            'client_description.required' => 'Input Client Description', // Custom error message for client description.
        ]);

        $image = $request->file('client_img'); // Gets the uploaded image file.
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // Generates a unique image name.
        Image::make($image)->resize(626,417)->save('upload/review/'.$name_gen); // Resizes and saves the image.
        $save_url = 'http://127.0.0.1:8000/upload/review/'.$name_gen; // Constructs the image URL.

        ClientReview::insert([ // Inserts new client review record into the database.
            'client_title' => $request->client_title,
            'client_description' => $request->client_description,
            'client_img' => $save_url,
        ]);

        $notification = array( // Prepares success notification.
            'message' => 'Review Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification); // Redirects to all reviews with success notification.
    } // end method 

    public function EditReview($id){
        $review = ClientReview::findOrFail($id); // Finds a client review by ID or throws 404.
        return view('backend.review.edit_review',compact('review')); // Returns the 'edit_review' view with review data.
    } // end method 

    public function UpdateReview(Request $request){
        $review_id = $request->id; // Gets the review ID from the request.

        if ($request->file('client_img')) { // Checks if a new image is uploaded.
            $image = $request->file('client_img'); // Gets the new image file.
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // Generates unique name for new image.
            Image::make($image)->resize(626,417)->save('upload/review/'.$name_gen); // Resizes and saves the new image.
            $save_url = 'http://127.0.0.1:8000/upload/review/'.$name_gen; // Constructs the new image URL.

            ClientReview::findOrFail($review_id)->update([ // Updates the review with new image.
                'client_title' => $request->client_title,
                'client_description' => $request->client_description,
                'client_img' => $save_url,
            ]);

            $notification = array( // Prepares success notification for update with image.
                'message' => 'Review Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification); // Redirects to all reviews with success.
        }else{ // If no new image is uploaded.
            ClientReview::findOrFail($review_id)->update([ // Updates the review without changing the image.
                'client_title' => $request->client_title,
                'client_description' => $request->client_description,
            ]);

            $notification = array( // Prepares success notification for update without image.
                'message' => 'Review Updated Without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification); // Redirects to all reviews with success.
        }
    } // end method 

    public function DeleteReview($id){
        ClientReview::findOrFail($id)->delete(); // Deletes the review by ID.

        $notification = array( // Prepares success notification for deletion.
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); // Redirects back with success notification.
    } // end method 
}