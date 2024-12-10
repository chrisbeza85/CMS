<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\OwnedItem;
use App\Http\Controllers\OwnedItemController;
use App\Http\Middleware\CorsMiddleware;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/item/{qrCode}', function ($qrCode) {
    $item = OwnedItem::where('qr_code', $qrCode)->first();

    if ($item) {
        return response()->json($item, 200);
    }
    return response()->json(['message' => 'Item not found'], 404);
});

Route::get('/api/items/{qr_code}', [OwnedItemController::class, 'findByQRCode']);
Route::middleware([CorsMiddleware::class])->group(function () {
    Route::get('/api/items', [OwnedItemController::class, 'index']);
    // Add other routes here
});
Route::get('/check-qr-code/{qr_code}', [OwnedItemController::class, 'checkQRCode']);
