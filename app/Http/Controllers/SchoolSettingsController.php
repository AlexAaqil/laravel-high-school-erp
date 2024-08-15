<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SchoolSettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit');
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'system_name' => 'required|string',
            'current_session' => 'required|string',
            'system_title' => 'nullable|string',
            'phone' => 'nullable|string',
            'system_email' => 'nullable|email',
            'address' => 'required|string',
            'term_ends' => 'nullable|date',
            'term_begins' => 'nullable|date',
            'lock_exam' => 'nullable|boolean',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            // Include validations for dynamic fees fields
        ]);

        // Prepare the data to update
        $settings = [
            'system_name' => $request->input('system_name'),
            'current_session' => $request->input('current_session'),
            'system_title' => $request->input('system_title'),
            'phone' => $request->input('phone'),
            'system_email' => $request->input('system_email'),
            'address' => $request->input('address'),
            'term_ends' => $request->input('term_ends'),
            'term_begins' => $request->input('term_begins'),
            'lock_exam' => $request->input('lock_exam') ? 1 : 0,
        ];

        // Update static settings
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['type' => $key], ['description' => $value]);
        }

        // Handle logo upload if present
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            $oldLogo = Setting::where('type', 'logo')->first();
            if ($oldLogo && $oldLogo->description) {
                Storage::delete('public/' . $oldLogo->description);
            }

            // Upload the new logo
            $logo = $request->file('logo');
            $filename = 'logo.' . $logo->getClientOriginalExtension();
            $logoPath = $logo->storeAs('logos', $filename, 'public');
            $logoUrl = asset('storage/' . $logoPath);

            // Update the logo setting
            Setting::updateOrCreate(['type' => 'logo'], ['description' => $logoUrl]);
        }

        // Update dynamic fees fields
        // Assuming $class_types are available and passed to this controller
        foreach ($class_types as $classType) {
            $feeKey = 'next_term_fees_' . strtolower($classType->code);
            if ($request->has($feeKey)) {
                $feeValue = $request->input($feeKey);
                Setting::updateOrCreate(['type' => $feeKey], ['description' => $feeValue]);
            }
        }

        return back()->with('flash_success', __('msg.update_ok'));
    }
}
