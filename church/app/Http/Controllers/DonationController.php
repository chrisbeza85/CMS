<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        return view('donations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'donor_name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Donation::create($validatedData);

        return redirect()->route('donations.index')->with('success', 'Donation recorded successfully.');
    }

    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return view('donations.show', compact('donation'));
    }

    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        return view('donations.edit', compact('donation'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'donor_name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Donation::whereId($id)->update($validatedData);

        return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
    }
}

