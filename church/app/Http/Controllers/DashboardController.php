<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnedItem;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for widgets
        $todayUpdates = OwnedItem::whereDate('created_at', today())->count();
        $recentUpdates = OwnedItem::orderBy('created_at', 'desc')->take(5)->get();
        $poorConditionCount = OwnedItem::where('condition', 'poor')->count();
        $lostItemsCount = OwnedItem::where('status', 'lost')->count();
        $damagedItemsCount = OwnedItem::where('status', 'damaged')->count();
        $totalItems = OwnedItem::count();

        // Prepare data for bar graph
        $barGraphData = [
            'poor' => $poorConditionCount,
            'lost' => $lostItemsCount,
            'damaged' => $damagedItemsCount,
        ];

        // Pass data to the view
        return view('admin.dashboard', compact(
            'todayUpdates',
            'recentUpdates',
            'poorConditionCount',
            'lostItemsCount',
            'damagedItemsCount',
            'totalItems',
            'barGraphData'
        ));
    }
}
