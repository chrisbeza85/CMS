<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $audits = Audit::query();

        if ($request->has('model_type')) {
            $audits->where('auditable_type', $request->get('model_type'));
        }

        if ($request->has('event')) {
            $audits->where('event', $request->get('event'));
        }

        // Add more filters as needed (e.g., date range)

        $audits = $audits->latest()->get();

        return view('admin.reports.index', compact('audits'));
    }

    public function show($id)
    {
        $audit = Audit::findOrFail($id);
        return view('admin.reports.show', compact('audit'));
    }

}
