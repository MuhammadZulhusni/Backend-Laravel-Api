<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageEtc;
class HomePageEtcController extends Controller
{
    public function SelectVideo()
    {
        $result = HomePageEtc::select('video_description', 'video_url')->get();
        return $result;
    }

    public function SelectTotalHome()
    {
        $result = HomePageEtc::select('total_student', 'total_course', 'total_review')->get();
        return $result;
    }

    public function SelectTechHome()
    {
        $result = HomePageEtc::select('tech_description')->get();
        return $result;
    }

    public function SelectHomeTitle()
    {
        $result = HomePageEtc::select('home_title', 'home_subtitle')->get();
        return $result;
    }
}
