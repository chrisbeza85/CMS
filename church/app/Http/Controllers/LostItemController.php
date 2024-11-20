<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItem;

class LostItemController extends Controller
{
    public function index()
    {
        $lostItems = LostItem::all();
        return view('lost_items.index', compact('lostItems'));
    }

    public function create()
    {
        return view('lost_items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'lost_description' => 'required|string',
            'date_lost' => 'required|date',
        ]);

        LostItem::create($validatedData);

        return redirect()->route('lost_items.index')->with('success', 'Lost item recorded successfully.');
    }

    public function show($id)
    {
        $lostItem = LostItem::findOrFail($id);
        return view('lost_items.show', compact('lostItem'));
    }

    public function edit($id)
    {
        $lostItem = LostItem::findOrFail($id);
        return view('lost_items.edit', compact('lostItem'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'lost_description' => 'required|string',
            'date_lost' => 'required|date',
        ]);

        LostItem::whereId($id)->update($validatedData);

        return redirect()->route('lost_items.index')->with('success', 'Lost item updated successfully.');
    }

    public function destroy($id)
    {
        $lostItem = LostItem::findOrFail($id);
        $lostItem->delete();

        return redirect()->route('lost_items.index')->with('success', 'Lost item deleted successfully.');
    }
}

