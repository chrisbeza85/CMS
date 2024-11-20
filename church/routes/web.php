<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnedItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonatedToController;
use App\Http\Controllers\BarcodeScannerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EquipmentCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('owned_items', OwnedItemController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('categories', EquipmentCategoryController::class);
// Subcategories
Route::get('categories/{category}/subcategory/create', [EquipmentCategoryController::class, 'createSubCategory'])->name('categories.create_subcategory');
Route::delete('categories/subcategories/{id}', [EquipmentCategoryController::class, 'destroySubCategory'])->name('categories.subcategories.destroy');
Route::post('categories/{category}/subcategory', [EquipmentCategoryController::class, 'storeSubCategory'])->name('categories.store_subcategory');

Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('donors', DonorController::class);
Route::resource('donated_tos', DonatedToController::class);
Route::get('owned_items/{id}/barcode', [OwnedItemController::class, 'barcode'])->name('owned_items.barcode');
Route::patch('owned_items/{id}/edit', [OwnedItemController::class, 'edit'])->name('owned_items.edit');
Route::post('barcode/scan', [BarcodeScannerController::class, 'scan'])->name('barcode.scan');
Route::get('/barcode/scanner', function () {
    return view('barcode_scanner');
})->name('barcode.scanner');
Route::get('/owned-items/search', [OwnedItemController::class, 'search'])->name('owned_items.search');
Route::get('/owned-items/not-found', function () {
    return view('owned_items.not_found');
})->name('owned_items.not_found');

Route::get('/test-barcode', function() {
    $barcodeGenerator = new DNS1D();
    $barcode = $barcodeGenerator->getBarcodePNG("1234567890", 'C39');

    if (!$barcode) {
        return response('Failed to generate barcode.', 500);
    }

    return response($barcode)
        ->header('Content-Type', 'image/png');
});

Route::get('owned_items/{id}/print', [OwnedItemController::class, 'print'])->name('owned_items.print');
Route::get('/owned_items/{id}/serial-barcode', [OwnedItemController::class, 'generateSerialBarcode'])->name('owned_items.serial_barcode');
