<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Announcement;

class LandingController extends Controller
{
    /**
     * Display the landing page with dynamic content.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all settings as key-value pairs
        $data['settings'] = Setting::pluck('value', 'key')->toArray();

        // Fetch latest active announcements (limit 3)
        $data['announcements'] = Announcement::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.welcome', $data);
    }
}
