<?php

// app/Http/Controllers/DonatedToController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonatedTo;

class DonatedToController extends Controller
{
    public function index()
    {
        $donatedTos = DonatedTo::all();
        return view('donated_tos.index', compact('donatedTos'));
    }

    public function create()
    {
        return view('donated_tos.create');
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

        DonatedTo::create($validatedData);
        return redirect()->route('donated_tos.index')->with('success', 'DonatedTo created successfully.');
    }

    public function show($id)
    {
        $donatedTo = DonatedTo::findOrFail($id);
        return view('donated_tos.show', compact('donatedTo'));
    }

    public function edit($id)
    {
        $donatedTo = DonatedTo::findOrFail($id);
        return view('donated_tos.edit', compact('donatedTo'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $donatedTo = DonatedTo::findOrFail($id);
        $donatedTo->update($validatedData);
        return redirect()->route('donated_tos.index')->with('success', 'DonatedTo updated successfully.');
    }

    public function destroy($id)
    {
        $donatedTo = DonatedTo::findOrFail($id);
        $donatedTo->delete();
        return redirect()->route('donated_tos.index')->with('success', 'DonatedTo deleted successfully.');
    }
}
