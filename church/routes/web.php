<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PHPMailerController;
use App\Models\User\UserController;
use App\Mail\MailableName;
use Google\Client as GoogleClient;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth;
use Illuminate\Support\Facades\Mail;

// Inventory
use App\Http\Controllers\OwnedItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonatedToController;
use App\Http\Controllers\BarcodeScannerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EquipmentCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportsController;


// Home page route
Route::get('/', [HomeController::class, 'index']);

// Protected routes with middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Route to show the form for sending an email via PHPMailer
Route::get('send-php-mailer', [PHPMailerController::class, 'index'])->name('send.php.mailer.form');

// Route to handle the form submission and send the email
Route::post('send-php-mailer-submit', [PHPMailerController::class, 'store'])->name('send.php.mailer.submit');


// Redirect route
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/redirected', [HomeController::class, 'redirected']);

Route::get('/view_members', [AdminController::class, 'view_members']);

Route::get('/member_registration', [HomeController::class, 'member_registration']);

Route::get('/see_users', [AdminController::class, 'see_users']);

Route::post('/add_members', [AdminController::class, 'add_members']);

Route::post('/add_givings', [AdminController::class, 'add_givings']);

Route::post('/create_strategicplan', [AdminController::class, 'create_strategicplan']);

Route::post('/create_employee', [AdminController::class, 'create_employee']);

Route::get('/time_management', [AdminController::class, 'time_management']);

Route::get('/weekly_schedule', [AdminController::class, 'weekly_schedule']);

Route::get('/update_schedule', [AdminController::class, 'update_schedule']);

Route::get('/view_schedule/{id}', [adminController::class, 'view_schedule'])->name('view_schedule');

Route::get('/view_event/{id}', [adminController::class, 'view_event'])->name('view_event');

Route::get('/show_schedule}', [AdminController::class, 'view_schedule']);

Route::post('/add_schedule', [AdminController::class, 'add_schedule']);

Route::post('/add_event', [AdminController::class, 'add_event']);

Route::get('/insert_event', [AdminController::class, 'insert_event']);

Route::get('/insert_schedule', [AdminController::class, 'insert_schedule']);

Route::get('/delete_schedule/{id}', [AdminController::class, 'delete_schedule']);

Route::get('/view_givings', [AdminController::class, 'view_givings']);

Route::get('/add_strategicplan', [AdminController::class, 'add_strategicplan']);

Route::get('/add_employee', [AdminController::class, 'add_employee']);

Route::get('/member_givings', [HomeController::class, 'member_givings']);

Route::get('/see_givings', [AdminController::class, 'see_givings']);

Route::get('/see_members', [AdminController::class, 'see_members']);

Route::get('/delete_members/{id}', [AdminController::class, 'delete_members']);

Route::get('/delete_givers/{id}', [AdminController::class, 'delete_givers']);

Route::get('/delete_users/{id}', [AdminController::class, 'delete_users']);

Route::get('/view_inventory', [AdminController::class, 'view_inventory']);

Route::post('/add_inventory', [AdminController::class, 'add_inventory']);

Route::get('/admin/inventory', [AdminController::class, 'inventory']);

Route::get('/delete_inventory/{id}', [AdminController::class, 'delete_inventory']);

Route::get('/update_member/{id}', [AdminController::class, 'update_member']);

Route::post('/update_registered/{id}', [AdminController::class, 'update_registered']);

Route::post('/update_users/{id}', [AdminController::class, 'update_users']);

Route::get('/update_user/{id}', [AdminController::class, 'update_user']);

Route::get('/update_inventory/{id}', [AdminController::class, 'update_inventory']);

Route::post('/update_equipment/{id}', [AdminController::class, 'update_equipment']);

// Inventory System Routes
// Show routes
Route::get('/show_inventory', [AdminController::class, 'show_inventory'])->name('admin.show_inventory');
Route::get('/show_departments', [AdminController::class, 'show_departments'])->name('admin.show_departments');
Route::get('/show_suppliers', [AdminController::class, 'show_suppliers'])->name('admin.show_suppliers');
Route::get('/show_customers', [AdminController::class, 'show_customers'])->name('admin.show_customers');
Route::get('/show_donors', [AdminController::class, 'show_donors'])->name('admin.show_donors');
Route::get('/show_recipients', [AdminController::class, 'show_recipients'])->name('admin.show_recipients');
Route::get('/show_categories', [AdminController::class, 'show_categories'])->name('admin.show_categories');
Route::get('/show_barcode', [AdminController::class, 'show_barcode'])->name('admin.show_barcode');
Route::get('/show_qrcode', [AdminController::class, 'show_qrcode'])->name('admin.show_qrcode');
Route::get('/show_dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
Route::get('/show_report', [AdminController::class, 'show_report'])->name('admin.report');


// View routes
Route::get('/view_inventory', [AdminController::class, 'view_inventory'])->name('view_inventory');
Route::get('/view_departments', [AdminController::class, 'view_departments'])->name('view_departments');
Route::get('/view_suppliers', [AdminController::class, 'view_suppliers'])->name('view_suppliers');
Route::get('/view_customers', [AdminController::class, 'view_customers'])->name('view_customers');
Route::get('/view_donors', [AdminController::class, 'view_donors'])->name('view_donors');
Route::get('/view_recipients', [AdminController::class, 'view_recipients'])->name('view_recipients');
Route::get('/view_categories', [AdminController::class, 'view_categories'])->name('view_categories');
Route::get('/view_barcode', [AdminController::class, 'view_barcode'])->name('admin.view_barcode');
Route::get('/view_qrcode', [AdminController::class, 'view_qrcode'])->name('admin.view_qrcode');
Route::get('/view_dashboard', [AdminController::class, 'view_dashboard'])->name('admin.view_dashboard');
Route::get('/view_report', [AdminController::class, 'view_report'])->name('admin.view_report');

// ~ Reports
Route::get('reports/index', [ReportsController::class, 'index'])->name('reports.index');
Route::get('reports/{id}', [ReportsController::class, 'show'])->name('reports.show');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Old routes
Route::resource('owned_items', OwnedItemController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('categories', EquipmentCategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('donors', DonorController::class);
Route::resource('donated_tos', DonatedToController::class);
// ~ Subcategories
Route::get('categories/{category}/subcategory/create', [EquipmentCategoryController::class, 'createSubCategory'])->name('categories.create_subcategory');
Route::post('categories/{category}/subcategory', [EquipmentCategoryController::class, 'storeSubCategory'])->name('categories.store_subcategory');
Route::get('categories/subcategories/{id}/edit', [EquipmentCategoryController::class, 'editSubCategory'])->name('categories.subcategories.edit'); // Edit route
Route::put('categories/subcategories/{id}', [EquipmentCategoryController::class, 'updateSubCategory'])->name('categories.subcategories.update'); // Update route
Route::delete('categories/subcategories/{id}', [EquipmentCategoryController::class, 'destroySubCategory'])->name('categories.subcategories.destroy');
// ~ Owned Items & Barcode
Route::get('owned_items/{id}/barcode', [OwnedItemController::class, 'barcode'])->name('owned_items.barcode');
Route::get('owned-items/create', [OwnedItemController::class, 'create'])->name('owned_items.create');
Route::get('owned_items/{id}', [OwnedItemController::class, 'show'])->name('owned_items.show');
Route::patch('owned_items/{id}/edit', [OwnedItemController::class, 'edit'])->name('owned_items.edit');
Route::post('barcode/scan', [BarcodeScannerController::class, 'scan'])->name('barcode.scan');
Route::get('/barcode/scanner', function () {
    return view('admin.barcode_scanner');
})->name('barcode.scanner');
Route::get('/owned-items/search', [OwnedItemController::class, 'search'])->name('owned_items.search');
Route::get('/owned-items/not-found', function () {
    return view('admin.owned_items.not_found');
})->name('owned_items.not_found');
Route::get('owned_items/{id}/print', [OwnedItemController::class, 'print'])->name('owned_items.print');
Route::get('/owned_items/{id}/serial-barcode', [OwnedItemController::class, 'generateSerialBarcode'])->name('owned_items.serial_barcode');
Route::get('/owned-items/{id}/qrcode', [OwnedItemController::class, 'generateQrCode'])->name('owned_items.qrcode');

// print
Route::get('/inventory/print', [OwnedItemController::class, 'printlist'])->name('admin.inventory.print');



