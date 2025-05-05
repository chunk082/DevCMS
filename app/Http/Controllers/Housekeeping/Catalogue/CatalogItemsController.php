<?php

namespace App\Http\Controllers\Housekeeping\Catalogue;

use App\Http\Controllers\Controller;
use App\Models\Housekeeping\CatalogItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogItemsController extends Controller
{
    /**
     * Display a listing of the catalog items.
     */
    public function index(Request $request)
{
    $query = CatalogItems::query();

    if ($request->has('filter') && $request->filter) {
        $filter = $request->filter;

        // If the input is numeric, check if it matches item_id or page_id
        if (is_numeric($filter)) {
            $query->where(function ($q) use ($filter) {
                $q->where('item_ids', $filter) // Exact match for unique `item_id`
                  ->orWhere('page_id', $filter); // Match `page_id` if no `item_id` found
            });
        } else {
            // Otherwise, search across multiple columns
            $query->where(function ($q) use ($filter) {
                $q->where('id', 'like', '%' . $filter . '%')
                    ->orWhere('catalog_name', 'like', '%' . $filter . '%')
                    ->orWhere('club_only', $filter)
                    ->orWhere('have_offer', $filter);
            });
        }
    }

    $catalogItems = $query->paginate(10);

    logHousekeepingActivity("User: " . Auth::user()->username . " has view the catalog items pages.");

    return view('housekeeping.catalog.items', compact('catalogItems'));
}



    /**
     * Store a newly created catalog item in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|unique:catalog_items,id',
            'item_ids' => 'required|string|max:666',
            'page_id' => 'required|integer',
            'catalog_name' => 'required|string|max:100',
            'cost_credits' => 'required|integer',
            'cost_points' => 'nullable|integer',
            'points_type' => 'nullable|integer',
            'amount' => 'nullable|integer',
            'limited_stack' => 'nullable|integer',
            'limited_sells' => 'nullable|integer',
            'order_number' => 'nullable|integer',
            'offer_id' => 'nullable|integer',
            'song_id' => 'nullable|integer',
            'extradata' => 'nullable|string|max:500',
            'have_offer' => 'required|boolean',
            'club_only' => 'required|boolean',
        ]);

        CatalogItems::create($validated);

        logHousekeepingActivity("User: " . Auth::user()->username . " has created a catalog items.");

        return redirect()->route('housekeeping.catalog.items.index')
            ->with('success', 'Catalog item added successfully.');
    }

    /**
     * Update the specified catalog item in the database.
     */
    public function update(Request $request, $id)
    {
        $catalogItem = CatalogItems::findOrFail($id);

        $data = $request->only([
            'item_ids',
            'page_id',
            'catalog_name',
            'cost_credits',
            'cost_points',
            'points_type',
            'amount',
            'limited_stack',
            'limited_sells',
            'order_number',
            'offer_id',
            'song_id',
            'extradata',
            'have_offer',
            'club_only',
        ]);

        $catalogItem->update($data);

        logHousekeepingActivity("User: " . Auth::user()->username . " has updated catalog item.");

        return redirect()->route('housekeeping.catalog.items.index')
            ->with('success', 'Catalog item updated successfully.');
    }

    /**
     * Remove the specified catalog item from the database.
     */
    public function destroy($id)
    {
        $catalogItem = CatalogItems::findOrFail($id);
        $catalogItem->delete();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a catalog items.");

        return redirect()->route('housekeeping.catalog.items.index')
            ->with('success', 'Catalog item deleted successfully.');
    }
}
