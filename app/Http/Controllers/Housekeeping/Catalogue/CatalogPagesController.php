<?php

namespace App\Http\Controllers\Housekeeping\Catalogue;

use App\Http\Controllers\Controller;
use App\Models\Housekeeping\CatalogPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogPagesController extends Controller
{
    /**
     * Display a listing of the catalog pages.
     */
    public function index(Request $request)
{
    $query = CatalogPage::query();

    // Check for filters and apply them
    if ($request->has('filter')) {
        $filter = $request->filter;

        $query->where(function ($q) use ($filter) {
            $q->where('id', 'like', '%' . $filter . '%')  // Search by ID
                ->orWhere('caption', 'like', '%' . $filter . '%') // Search by caption
                ->orWhere('vip_only', $filter) // Exact match for vip_only
                ->orWhere('club_only', $filter); // Exact match for club_only
        });
    }

    $catalogPages = $query->paginate(10);

    logHousekeepingActivity("User: " . Auth::user()->username . " has view the catalog pages.");

    return view('housekeeping.catalog.pages', compact('catalogPages'));
}

    /**
     * Store a newly created catalog page in the database.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|integer|unique:catalog_pages,id',
        'parent_id' => 'nullable|integer',
        'caption_save' => 'nullable|string|max:25',
        'caption' => 'required|string|max:128',
        'page_layout' => 'required|in:default_3x3,club_buy,club_gift',
        'icon_color' => 'nullable|integer',
        'icon_image' => 'nullable|integer',
        'min_rank' => 'required|integer',
        'order_num' => 'required|integer',
        'visible' => 'required|boolean',
        'enabled' => 'required|boolean',
        'club_only' => 'required|boolean',
        'vip_only' => 'required|boolean',
        'page_headline' => 'nullable|string|max:1024',
        'page_teaser' => 'nullable|string|max:64',
        'page_special' => 'nullable|string|max:2048',
        'page_text1' => 'nullable|string',
        'page_text2' => 'nullable|string',
        'page_text_details' => 'nullable|string',
        'page_text_teaser' => 'nullable|string',
        'room_id' => 'nullable|integer',
        'includes' => 'nullable|string|max:128',
    ]);

    // Insert the catalog page
    CatalogPage::create($validated);

    logHousekeepingActivity("User: " . Auth::user()->username . " has created a new catalog pages.");
    return redirect()->route('housekeeping.catalog.pages.index')
        ->with('success', 'Catalog page added successfully.');
}

    /**
     * Update the specified catalog page in the database.
     */
    public function update(Request $request, $id)
    {
        $catalogPage = CatalogPage::findOrFail($id);

        // Only fetch the fields submitted in the request
        $data = $request->only(['visible', 'min_rank', 'order_num', 'club_only', 'vip_only']);

        // Update only the fields that were submitted
        $catalogPage->update($data);

        logHousekeepingActivity("User: " . Auth::user()->username . " has updated the catalog pages.");

        return redirect()->route('housekeeping.catalog.pages.index')
            ->with('success', 'Catalog page updated successfully.');
    }

    /**
     * Remove the specified catalog page from the database.
     */
    public function destroy($id)
{
    $catalogPage = CatalogPage::findOrFail($id);
    $catalogPage->delete();

    logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a catalog pages.");

    return redirect()->route('housekeeping.catalog.pages.index')
        ->with('success', 'Catalog page deleted successfully.');
}
}