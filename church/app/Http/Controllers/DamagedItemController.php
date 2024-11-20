<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamagedItem;

class DamagedItemController extends Controller
{
    public function index()
    {
        $damagedItems = DamagedItem::all();
        return view('damaged_items.index', compact('damagedItems'));
    }

    public function create()
    {
        return view('damaged_items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'damage_description' => 'required|string',
            'date_damaged' => 'required|date',
        ]);

        DamagedItem::create($validatedData);

        return redirect()->route('damaged_items.index')->with('success', 'Damaged item recorded successfully.');
    }

    public function show($id)
    {
        $damagedItem = DamagedItem::findOrFail($id);
        return view('damaged_items.show', compact('damagedItem'));
    }

    public function edit($id)
    {
        $damagedItem = DamagedItem::findOrFail($id);
        return view('damaged_items.edit', compact('damagedItem'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'damage_description' => 'required|string',
            'date_damaged' => 'required|date',
        ]);

        DamagedItem::whereId($id)->update($validatedData);

        return redirect()->route('damaged_items.index')->with('success', 'Damaged item updated successfully.');
    }

    public function destroy($id)
    {
        $damagedItem = DamagedItem::findOrFail($id);
        $damagedItem->delete();

        return redirect()->route('damaged_items.index')->with('success', 'Damaged item deleted successfully.');
    }
}

