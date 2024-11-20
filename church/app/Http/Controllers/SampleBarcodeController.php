<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnedItem;
use Milon\Barcode\DNS1D;

Route::get('/test-barcode', function() {
    $barcodeGenerator = new DNS1D();
    $barcode = $barcodeGenerator->getBarcodePNG("1234567890", 'C39');

    if (!$barcode) {
        return response('Failed to generate barcode.', 500);
    }

    return response($barcode)
        ->header('Content-Type', 'image/png');
});
