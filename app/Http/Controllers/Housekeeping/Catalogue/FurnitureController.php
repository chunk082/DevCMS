<?php

namespace App\Http\Controllers\Housekeeping\Catalogue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Housekeeping\Furniture;
use Illuminate\Support\Facades\Auth;

class FurnitureController extends Controller
{
    /**
     * Display a listing of furniture.
     */
    public function index(Request $request)
    {
        $query = Furniture::query();

        // Filtering logic
        if ($request->has('filter') && $request->filter) {
            $query->where('public_name', 'like', '%' . $request->filter . '%')
                  ->orWhere('item_name', 'like', '%' . $request->filter . '%')
                  ->orWhere('type', 'like', '%' . $request->filter . '%');
        }

        $furniture = $query->paginate(10);

        logHousekeepingActivity("User: " . Auth::user()->username . " has view the Furniture pages.");

        return view('housekeeping.catalog.furniture', compact('furniture'));
    }

    /**
     * Store a newly created furniture item in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sprite_id' => 'required|integer',
            'public_name' => 'required|string|max:56',
            'item_name' => 'required|string|max:70',
            'type' => 'required|string|max:3',
            'width' => 'required|integer',
            'length' => 'required|integer',
            'stack_height' => 'required|numeric',
            'allow_stack' => 'required|boolean',
            'allow_sit' => 'required|boolean',
            'allow_lay' => 'required|boolean',
            'allow_walk' => 'required|boolean',
            'allow_gift' => 'required|boolean',
            'allow_trade' => 'required|boolean',
            'allow_recycle' => 'required|boolean',
            'allow_marketplace_sell' => 'required|boolean',
            'allow_inventory_stack' => 'required|boolean',
            'interaction_type' => 'nullable|string|max:500',
            'interaction_modes_count' => 'nullable|integer',
            'vending_ids' => 'nullable|string|max:255',
            'multiheight' => 'nullable|string|max:50',
            'customparams' => 'nullable|string|max:256',
            'effect_id_male' => 'nullable|integer',
            'effect_id_female' => 'nullable|integer',
            'clothing_on_walk' => 'nullable|string|max:255',
        ]);

        Furniture::create($validated);

        logHousekeepingActivity("User: " . Auth::user()->username . " has created new Furniture Item entry.");

        return redirect()->route('housekeeping.furniture.index')
            ->with('success', 'Furniture added successfully.');
    }

    /**
     * Update the specified furniture in the database.
     */
    public function update(Request $request, $id)
{
    $furniture = Furniture::findOrFail($id);

    $validated = $request->validate([
        'sprite_id' => 'nullable|integer',
        'public_name' => 'nullable|string|max:56',
        'item_name' => 'nullable|string|max:70',
        'type' => 'nullable|string|max:3',
        'width' => 'nullable|integer',
        'length' => 'nullable|integer',
        'stack_height' => 'nullable|numeric',
        'allow_stack' => 'nullable|boolean',
        'allow_sit' => 'nullable|boolean',
        'allow_lay' => 'nullable|boolean',
        'allow_walk' => 'nullable|boolean',
        'allow_gift' => 'nullable|boolean',
        'allow_trade' => 'nullable|boolean',
        'allow_recycle' => 'nullable|boolean',
        'allow_marketplace_sell' => 'nullable|boolean',
        'allow_inventory_stack' => 'nullable|boolean',
        'interaction_type' => 'nullable|string|max:500',
        'interaction_modes_count' => 'nullable|integer',
        'vending_ids' => 'nullable|string|max:255',
        'multiheight' => 'nullable|string|max:50',
        'customparams' => 'nullable|string|max:256',
        'effect_id_male' => 'nullable|integer',
        'effect_id_female' => 'nullable|integer',
        'clothing_on_walk' => 'nullable|string|max:255',
    ]);

    $furniture->update($validated);

    return redirect()->route('housekeeping.catalog.furniture.index')
        ->with('success', 'Furniture updated successfully.');
}
    /**
     * Remove the specified furniture from the database.
     */
    public function destroy($id)
    {
        $furniture = Furniture::findOrFail($id);
        $furniture->delete();

        logHousekeepingActivity("User: " . Auth::user()->username . " has deleted a Furniture Item");

        return redirect()->route('housekeeping.furniture.index')
            ->with('success', 'Furniture deleted successfully.');
    }
}
