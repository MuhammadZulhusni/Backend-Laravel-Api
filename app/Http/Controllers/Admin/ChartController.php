<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use App\Models\Chart; 

class ChartController extends Controller
{
    /**
     * Fetches all chart data.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function onAllSelect()
    {
        $result = Chart::all(); // Retrieves all records from the 'charts' table.
        return $result;
    }

    /**
     * Displays all chart content in a backend view.
     *
     * @return \Illuminate\View\View
     */
    public function AllChartContent()
    {
        $chart = Chart::all(); // Fetches all chart records.
        return view('backend.chart.all_chart', compact('chart')); // Returns the 'all_chart' view, passing the chart data.
    }

    /**
     * Displays the form to edit a specific chart entry.
     *
     * @param  int  $id The ID of the chart entry to edit.
     * @return \Illuminate\View\View
     */
    public function EditChartContent($id)
    {
        $chart = Chart::findOrFail($id); // Finds the chart record by ID or throws a 404 error.
        return view('backend.chart.edit_chart', compact('chart')); // Returns the 'edit_chart' view, passing the specific chart data.
    }

    /**
     * Updates an existing chart entry.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdateChartContent(Request $request)
    {
        $chart_id = $request->id; // Retrieves the ID of the chart entry from the request.

        Chart::findOrFail($chart_id)->update([ // Finds and updates the chart record.
            'x_data' => $request->Techonology, // Maps 'Techonology' from request to 'x_data' field.
            'y_data' => $request->Projects,    // Maps 'Projects' from request to 'y_data' field.
        ]);

        $notification = [ // Prepares a success notification message.
            'message' => 'Chart Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.chart.content')->with($notification); // Redirects to the all chart content page with the notification.
    }
}