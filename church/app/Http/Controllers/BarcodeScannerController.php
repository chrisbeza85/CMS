<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnedItem;

class BarcodeScannerController extends Controller
{
    public function scan(Request $request)
    {
        $barcode = $request->input('barcode');
        $item = OwnedItem::where('barcode', $barcode)->first();

        if ($item) {
            return response()->json([
                'found' => true,
                'redirect_url' => route('owned_items.show', $item->id)
            ]);  
        } else {
            return response()->json(['found' => false]);
        }
    }
}
