<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log; // For error logging
use Illuminate\Support\Facades\File; // For file system operations

class ServiceController extends Controller
{
    // Returns all services (internal use, not directly for views)
    public function ServiceView()
    {
        return Services::all();
    }

    // Displays a view with all services
    public function AllService()
    {
        $service = Services::all();
        return view('backend.service.all_service', compact('service'));
    }

    // Displays the form to add a new service
    public function AddService()
    {
        return view('backend.service.add_service');
    }

    // Stores a new service and its logo
    public function StoreService(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'required|string',
            'service_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('service_logo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        // Define and create upload directory if it doesn't exist
        $upload_dir = 'upload/service/';
        $absolute_path = public_path($upload_dir);
        if (!File::isDirectory($absolute_path)) {
            try {
                File::makeDirectory($absolute_path, 0775, true);
            } catch (\Exception $e) {
                Log::error("Failed to create directory {$absolute_path}: " . $e->getMessage());
                return redirect()->back()->with(['message' => 'Error: Could not create upload directory.', 'alert-type' => 'error']);
            }
        } elseif (!is_writable($absolute_path)) {
            Log::error("Directory not writable: " . $absolute_path);
            return redirect()->back()->with(['message' => 'Error: Upload directory is not writable. Check permissions.', 'alert-type' => 'error']);
        }

        $save_path = $absolute_path . $name_gen;

        // Save the image using Intervention Image
        try {
            Image::make($image)->resize(512, 512)->save($save_path);
        } catch (\Exception $e) {
            Log::error("Error saving image: " . $e->getMessage());
            return redirect()->back()->with(['message' => 'Error: Failed to save service logo.', 'alert-type' => 'error']);
        }

        $save_url = url($upload_dir . $name_gen);

        // Create new service record in the database
        try {
            Services::create([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
                'service_logo' => $save_url,
            ]);
        } catch (\Exception $e) {
            Log::error("Error inserting service into database: " . $e->getMessage());
            return redirect()->back()->with(['message' => 'Error: Failed to add service to database.', 'alert-type' => 'error']);
        }

        return redirect()->route('all.services')->with(['message' => 'Service Inserted Successfully!', 'alert-type' => 'success']);
    }

    // Displays the form to edit an existing service
    public function EditService($id)
    {
        $services = Services::findOrFail($id);
        return view('backend.service.edit_service', compact('services'));
    }

    // Updates an existing service, including optional logo update
    public function UpdateService(Request $request)
    {
        $service_id = $request->id;

        if ($request->file('service_logo')) {
            // New image uploaded: process and update logo
            $image = $request->file('service_logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(512, 512)->save('upload/service/' . $name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/service/' . $name_gen; // Consider using `url()` helper

            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
                'service_logo' => $save_url,
            ]);

            return redirect()->route('all.services')->with(['message' => 'Service Updated Successfully!', 'alert-type' => 'success']);
        } else {
            // No new image: update only text fields
            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
            ]);

            return redirect()->route('all.services')->with(['message' => 'Service Updated Without Image Successfully!', 'alert-type' => 'success']);
        }
    }

    // Deletes a service by ID
    public function DeleteService($id)
    {
        Services::findOrFail($id)->delete();

        return redirect()->back()->with(['message' => 'Service Deleted Successfully!', 'alert-type' => 'success']);
    }
}