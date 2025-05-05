<?php

namespace App\Http\Controllers\Housekeeping\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner; // Assuming your Banner model is named 'Banner'
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class BannersController extends Controller
{
    /**
     * Display a listing of the banners.
     */
    public function index()
    {
        $banners = Banner::all();
        logHousekeepingActivity("User: " . Auth::user()->username . " has view the banner page.");
        return view('housekeeping.website.banners', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     */
    public function create()
    {
        return view('housekeeping.website.create');
    }

    /**
     * Store a newly created banner in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'desc' => 'required|string',
        'image' => 'required|string', // Now expecting a string path instead of a file
        'active' => 'required|boolean'
    ]);

    Banner::create([
        'title' => $request->title,
        'desc' => $request->desc,
        'image_path' => 'img/promotions' . $request->image, // Store the selected image path
        'active' => $request->active
    ]);

    logHousekeepingActivity("User: " . Auth::user()->username . " has created a new banner.");

    return redirect()->route('housekeeping.website.banners')->with('success', 'Banner created successfully.');
}

public function update(Request $request, $id)
{
    \Log::info('Banner ID to Update:', ['id' => $id]);

    $banner = Banner::find($id);

    if (!$banner) {
        \Log::error('Banner not found.', ['id' => $id]);
        return redirect()->route('housekeeping.website.banners')->with('error', 'Banner not found.');
    }

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'desc' => 'required|string',
        'active' => 'required|boolean',
    ]);

    \Log::info('Validated Data', $validatedData);

    try {
        $banner->update($validatedData);
        \Log::info('Banner updated successfully.', ['id' => $id]);
    } catch (\Exception $e) {
        \Log::error('Failed to Update Banner', ['id' => $id, 'error' => $e->getMessage()]);
    }

    logHousekeepingActivity("User: " . Auth::user()->username . " has updated a banner.");

    return redirect()->route('housekeeping.website.banners')->with('success', 'Banner updated successfully.');
}

    /**
     * Remove the specified banner from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->image_path);
        $banner->delete();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a banner.");

        return redirect()->route('housekeeping.website.banners')->with('success', 'Banner deleted successfully.');
    }
}

