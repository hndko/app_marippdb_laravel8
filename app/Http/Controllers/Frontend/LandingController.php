<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Announcement;
use App\Models\Feature;

class LandingController extends Controller
{
    private function getCommonData()
    {
        return [
            'settings' => Setting::pluck('value', 'key')->toArray()
        ];
    }

    public function index()
    {
        $data = $this->getCommonData();
        // Fetch latest active announcements (limit 3)
        $data['announcements'] = Announcement::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.welcome', $data);
    }

    public function services()
    {
        $data = $this->getCommonData();
        $data['services'] = \App\Models\Service::where('is_active', true)->get();
        return view('frontend.pages.services', $data);
    }

    public function features()
    {
        $data = $this->getCommonData();
        $data['features'] = Feature::where('is_active', true)->get();
        return view('frontend.pages.features', $data);
    }

    public function schedules()
    {
        $data = $this->getCommonData();
        return view('frontend.pages.schedules', $data);
    }

    public function contact()
    {
        $data = $this->getCommonData();
        return view('frontend.pages.contact', $data);
    }

    public function team()
    {
        $data = $this->getCommonData();
        return view('frontend.pages.team', $data);
    }

    public function testimonials()
    {
        $data = $this->getCommonData();
        return view('frontend.pages.testimonials', $data);
    }
}
