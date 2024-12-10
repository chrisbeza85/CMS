<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OwnedItem;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Donor;
use App\Models\DonatedTo;
use App\Models\EquipmentCategory;
use App\Models\Department;
use App\Models\EquipmentSubCategory;
use Milon\Barcode\DNS1D;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use Illuminate\Http\Response;

class OwnedItemController extends Controller
{
    public function index()
    {
        $ownedItemsGrouped = OwnedItem::select('item_name', \DB::raw('COUNT(*) as quantity'))
                                        ->groupBy('item_name')
                                        ->get();

        return view('admin.owned_items.index', compact('ownedItemsGrouped'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $donors = Donor::all();
        $donatedTos = DonatedTo::all();
        $categories = EquipmentCategory::all();
        $departments = Department::all();
        $subcategories = EquipmentSubCategory::all();

        return view('admin.owned_items.create', compact('suppliers','customers','donors','donatedTos', 'categories','departments', 'subcategories'));
    }

    public function store(Request $request) 
    {

        // validation rule
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'actual_serial_no' => 'nullable|string|unique:owned_items,actual_serial_no',
            'quantity' => 'required|integer',
            'status' => 'required|in:stored,lost,damaged,outbound,inbound,donated,received',
            'description' => 'nullable|string',
            'item_value' => 'nullable|numeric',
            'item_condition' => 'nullable|in:new,used,good,fair,poor',
            'location' => 'nullable|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'customer_id' => 'nullable|exists:customers,id',
            'donor_id' => 'nullable|exists:donors,id',
            'donated_to_id' => 'nullable|exists:donated_tos,id',
            'category_id' => 'required|exists:equipment_categories,id',
            'subcategory_id' => 'required|exists:equipment_subcategories,id',
            'dept_code' => 'required|exists:departments,dept_code',
            'year_bought' => 'required|digits:4',
        ]);

        // Loop to create items with unique barcodes
        for ($i = 0; $i < $validatedData['quantity']; $i++) {
            // Generate a unique serial number
            $serialNumber = $this->generateUniqueSerialNumber();

            // Fetch department code (AAA)
            $department = Department::where('dept_code', $validatedData['dept_code'])->first();
            $departmentCode = $department ? $department->dept_code : '';

            // Fetch category code (BB)
            $category = EquipmentCategory::find($validatedData['category_id']);
            $categoryCode = $category ? $category->category_code : '';

            // Fetch subcategory code (VV)
            $subcategory = EquipmentSubCategory::find($validatedData['subcategory_id']);
            $subcategoryCode = $subcategory ? $subcategory->subcategory_code : '';

            // Year bought (CCCC)
            $yearBought = $validatedData['year_bought'];

            // Build the barcode string: "AAA BB VV CCCC XXXXXX"
            $barcode = "{$departmentCode}{$categoryCode}{$subcategoryCode}{$yearBought}{$serialNumber}";

            // save the barcode number & serial number to the database
            $itemData = array_merge($validatedData, [
                'barcode' => $barcode,
                'serial_number' => $serialNumber
            ]);

            // Check if an actual serial number is provided
            $barcodeGenerator = new DNS1D();

            if (!empty($validatedData['actual_serial_no'])) {
                // Generate barcode for actual_serial_no if present
                $itemData['actual_barcode'] = $barcodeGenerator->getBarcodePNG($validatedData['actual_serial_no'], 'C39', 2, 100);
            }

            // create the OwnedItem with the barcode
            OwnedItem::create($itemData);
        }

    return redirect()->route('admin.show_inventory')->with('success', 'Items created successfully.');
}
    public function show($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $donors = Donor::all();
        $donatedTos = DonatedTo::all();
        $categories = EquipmentCategory::all();
        $departments = Department::all();
        $subcategories = EquipmentSubcategory::all();
        return view('admin.owned_items.show', compact('ownedItem', 'suppliers', 'customers', 'donors', 'donatedTos', 'categories', 'departments', 'subcategories'));
    }

    public function edit($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $donors = Donor::all();
        $donatedTos = DonatedTo::all();
        $categories = EquipmentCategory::all();
        $departments = Department::all();
        $subcategories = EquipmentSubcategory::all();
        return view('admin.owned_items.edit', compact('ownedItem', 'suppliers', 'customers', 'donors', 'donatedTos', 'categories', 'departments', 'subcategories'));
    }

    public function update(Request $request, $id) 
    {   
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'actual_serial_no' => 'nullable|string|unique:owned_items,actual_serial_no',
            'quantity' => 'nullable|integer',
            'status' => 'required|in:stored,lost,damaged,outbound,inbound,donated,received',
            'description' => 'nullable|string',
            'item_value' => 'nullable|numeric',
            'item_condition' => 'nullable|in:new,used,good,fair,poor',
            'location' => 'nullable|string',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'customer_id' => 'nullable|exists:customers,id',
            'donor_id' => 'nullable|exists:donors,id',
            'donated_to_id' => 'nullable|exists:donated_tos,id',
            'category_id' => 'required|exists:equipment_categories,id',
            'subcategory_id' => 'required|exists:equipment_subcategories,id',
            'dept_code' => 'required|exists:departments,dept_code',
            'year_bought' => 'required|digits:4',
        ]);

        // Fetch the existing item
        $ownedItem = OwnedItem::findOrFail($id);
        $currentQuantity = OwnedItem::where('item_name', $ownedItem->item_name)->count();

        // quantity change
        if ($validatedData['quantity'] > $currentQuantity) {
            // Increase quantity
            $difference = $validatedData['quantity'] - $currentQuantity;

            for ($i = 0; $i < $difference; $i++) {
                // Generate a unique serial number
                $serialNumber = $this->generateUniqueSerialNumber();

                // Fetch department code (AAA)
                $department = Department::where('dept_code', $validatedData['dept_code'])->first();
                $departmentCode = $department ? $department->dept_code : '';

                // Fetch category code (BB)
                $category = EquipmentCategory::find($validatedData['category_id']);
                $categoryCode = $category ? $category->category_code : '';

                // Fetch subcategory code (VV)
                $subcategory = EquipmentSubCategory::find($validatedData['subcategory_id']);
                $subcategoryCode = $subcategory ? $subcategory->subcategory_code : '';

                // Year bought (CCCC)
                $yearBought = $validatedData['year_bought'];

                // Build the barcode string: "AAA BB VV CCCC XXXXXX"
                $barcode = "{$departmentCode} {$categoryCode} {$subcategoryCode} {$yearBought} {$serialNumber}";
                    OwnedItem::create(array_merge($validatedData, [
                        'barcode' => $barcode,
                        'serial_number' => $serialNumber
                    ]));

                }
        } elseif ($validatedData['quantity'] < $currentQuantity) {
            // Decrease quantity
            $difference = $currentQuantity - $validatedData['quantity'];
            $itemsToRemove = OwnedItem::where('item_name', $ownedItem->item_name)
                ->where('status', $ownedItem->status)
                ->limit($difference)
                ->get();

            foreach ($itemsToRemove as $item) {
                $item->delete();
            }
        }

        // If an actual serial number is provided, generate a barcode for it
        $barcodeGenerator = new DNS1D();

        if (!empty($validatedData['actual_serial_no'])) {
            $itemData['actual_barcode'] = $barcodeGenerator->getBarcodePNG($validatedData['actual_serial_no'], 'C39', 2, 100);
        }
        
        $ownedItem->update($validatedData);
        return redirect()->route('admin.show_inventory')->with('success', 'Item updated successfully.');
        
}

    public function destroy($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);
        $ownedItem->delete();

        return redirect()->route('admin.show_inventory')->with('success', 'Item deleted successfully.');
    }

    public function barcode($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);

        if (empty($ownedItem->barcode)) {
            return response('No barcode value found.', 500);
        }

        $barcodeGenerator = new DNS1D();

        try {
            // generate barcode image
            $barcode = $barcodeGenerator->getBarcodePNG($ownedItem->barcode, 'C39', 2, 100);
        } catch (\Exception $e) {
            return response('Error generating barcode: ' . $e->getMessage(), 500);
        }

        // create an image resource from the base64 string
        $imageData = base64_decode($barcode);
        if (!$imageData) {
            return response('Failed to generate barcode image.', 500);
        }

        // Send the image to the browser with the correct content type
        return response($imageData)->header('Content-Type', 'image/png');
    }

    public function generateSerialBarcode($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);

        if (empty($ownedItem->actual_serial_no)) {
            return response('No barcode value found.', 500);
        }

        $barcodeGenerator = new DNS1D();

        try {
            // generate barcode image
            $barcode = $barcodeGenerator->getBarcodePNG($ownedItem->actual_serial_no, 'C39', 2, 100);
        } catch (\Exception $e) {
            return response('Error generating barcode: ' . $e->getMessage(), 500);
        }

        // create an image resource from the base64 string
        $imageData = base64_decode($barcode);
        if (!$imageData) {
            return response('Failed to generate barcode image.', 500);
        }

        // Send the image to the browser with the correct content type
        return response($imageData)->header('Content-Type', 'image/png');
    }

    public function print($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);

        return view('admin.owned_items.print', compact('ownedItem'));
    }

    public function updateStatus(Request $request, $id)
    {
        $ownedItem = OwnedItem::findOrFail($id);
        $ownedItem->status = $request->status;
        $ownedItem->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    // search for an item by barcode
    public function search(Request $request)
    {
        $barcode = $request->input('barcode');

        // find item by barcode
        $ownedItem = OwnedItem::where('barcode', $barcode)->first();

        if ($ownedItem) {
            // Redirect to the item's show page if found
            return redirect()->route('owned_items.show', $ownedItem->id);
        } else {
            // redirect to a custom Item not found page
            return redirect()->route('owned_items.not_found');
        }
    }

    private function generateUniqueSerialNumber()
    {
        // Define a set of characters (A-Z and 0-9)
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $length = 6;

        do {
            // Generate a random serial number of 6 characters
            $serialNumber = '';
            for ($i = 0; $i < $length; $i++) {
                $serialNumber .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while (OwnedItem::where('serial_number', $serialNumber)->exists());// unique

        return $serialNumber;
    }

    public function generateQrCode($id)
    {
        $ownedItem = OwnedItem::findOrFail($id);

        // Use the barcode or actual_serial_no to generate the QR code
        $qrData = $ownedItem->barcode ?: $ownedItem->actual_serial_no;

        if (empty($qrData)) {
            return response('No QR code data found.', 500);
        }

        // Set up the QR code renderer and writer
        $renderer = new ImageRenderer(
            new RendererStyle(256), // Set size to 256x256
            new SvgImageBackEnd()   // Use SVG as the backend
        );

        $writer = new Writer($renderer);

        // Generate the QR code as SVG
        $qrCodeSvg = $writer->writeString($qrData);

        // Return the SVG response
        return response($qrCodeSvg, 200)->header('Content-Type', 'image/svg+xml');
    }

    public function findByQRCode($qrCode)
    {
        $item = OwnedItem::where('qr_code', $qrCode)->first();

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($item, 200);
    }

    public function checkQRCode($qrCode)
    {
        $item = OwnedItem::where('barcode', $qrCode)->first();

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found'
        ]);
    }

    // app/Http/Controllers/InventoryController.php
public function printlist()
{
    $items = OwnedItem::all(); // Fetch all items, adjust if necessary for pagination or filtering
    return view('admin.inventory.print', compact('items'));
}


}

