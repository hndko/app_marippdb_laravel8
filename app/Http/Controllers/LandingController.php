<?php

namespace App\Http\Controllers;

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
        $settings = Setting::pluck('value', 'key')->toArray();

        // Fetch latest active announcements (limit 3)
        $announcements = Announcement::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.welcome', compact('settings', 'announcements'));
    }
}
