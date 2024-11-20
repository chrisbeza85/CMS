<?php

// app/Http/Controllers/DonorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view('donors.index', compact('donors'));
    }

    public function create()
    {
        return view('donors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        Donor::create($validatedData);
        return redirect()->route('donors.index')->with('success', 'Donor created successfully.');
    }

    public function show($id)
    {
        $donor = Donor::findOrFail($id);
        return view('donors.show', compact('donor'));
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('donors.edit', compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $donor = Donor::findOrFail($id);
        $donor->update($validatedData);
        return redirect()->route('donors.index')->with('success', 'Donor updated successfully.');
    }

    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->delete();
        return redirect()->route('donors.index')->with('success', 'Donor deleted successfully.');
    }
}
