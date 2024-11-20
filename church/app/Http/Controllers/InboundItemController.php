<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InboundItem;
use App\Models\Supplier;

class InboundItemController extends Controller
{
    public function index()
    {
        $inboundItems = InboundItem::all();
        return view('inbound_items.index', compact('inboundItems'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('inbound_items.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|integer',
            'date_received' => 'required|date',
        ]);

        InboundItem::create($validatedData);

        return redirect()->route('inbound_items.index')->with('success', 'Inbound item recorded successfully.');
    }

    public function show($id)
    {
        $inboundItem = InboundItem::findOrFail($id);
        return view('inbound_items.show', compact('inboundItem'));
    }

    public function edit($id)
    {
        $inboundItem = InboundItem::findOrFail($id);
        $suppliers = Supplier::all();
        return view('inbound_items.edit', compact('inboundItem', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'supplier_id' => 'required|integer',
            'date_received' => 'required|date',
        ]);

        InboundItem::whereId($id)->update($validatedData);

        return redirect()->route('inbound_items.index')->with('success', 'Inbound item updated successfully.');
    }

    public function destroy($id)
    {
        $inboundItem = InboundItem::findOrFail($id);
        $inboundItem->delete();

        return redirect()->route('inbound_items.index')->with('success', 'Inbound item deleted successfully.');
    }
}
