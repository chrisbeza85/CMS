<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutboundItem;
use App\Models\Customer;

class OutboundItemController extends Controller
{
    public function index()
    {
        $outboundItems = OutboundItem::all();
        return view('outbound_items.index', compact('outboundItems'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('outbound_items.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'customer_id' => 'required|integer',
            'date_sent' => 'required|date',
            // Add other validation rules as needed
        ]);

        OutboundItem::create($validatedData);

        return redirect()->route('outbound_items.index')->with('success', 'Outbound item recorded successfully.');
    }

    public function show($id)
    {
        $outboundItem = OutboundItem::findOrFail($id);
        return view('outbound_items.show', compact('outboundItem'));
    }

    public function edit($id)
    {
        $outboundItem = OutboundItem::findOrFail($id);
        $customers = Customer::all();
        return view('outbound_items.edit', compact('outboundItem', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'customer_id' => 'required|integer',
            'date_sent' => 'required|date',
            // Add other validation rules as needed
        ]);

        OutboundItem::whereId($id)->update($validatedData);

        return redirect()->route('outbound_items.index')->with('success', 'Outbound item updated successfully.');
    }

    public function destroy($id)
    {
        $outboundItem = OutboundItem::findOrFail($id);
        $outboundItem->delete();

        return redirect()->route('outbound_items.index')->with('success', 'Outbound item deleted successfully.');
    }
}

