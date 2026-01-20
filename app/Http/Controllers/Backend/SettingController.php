<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // Fetch all settings and pluck key-value pairs
        $data['settings'] = Setting::all()->pluck('value', 'key')->toArray();
        return view('backend.settings.index', $data);
    }

    public function update(Request $request)
    {
        $settings = $request->except('_token');

        // Handle File Uploads
        $fileKeys = ['app_logo', 'hero_bg_image', 'og_image'];

        foreach ($fileKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('settings', $filename, 'public');

                // Delete old file if exists
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldSetting->value)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($oldSetting->value);
                }

                // Update settings array with new path
                $settings[$key] = $path;
            } else {
                // If no file uploaded, remove from settings array to avoid overwriting with null/empty if handled incorrectly,
                // BUT if it's not in the request, it won't be in $settings = $request->except('_token').
                // If it IS in the request but null (e.g. empty file input), we should remove it.
                // However, HTML forms don't send empty file inputs as null usually, they just don't send the file.
                // But let's be safe.
                if (array_key_exists($key, $settings) && is_null($settings[$key])) {
                    unset($settings[$key]);
                }
            }
        }

        foreach ($settings as $key => $value) {
            // Skip if value is a file object (should remain handled above or path string)
            if ($request->hasFile($key)) {
                // Value is already path string from above logic
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
