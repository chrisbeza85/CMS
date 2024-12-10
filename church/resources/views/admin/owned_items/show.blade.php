<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Item Details">
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Item Details</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgba(173, 216, 230, 0.3), rgba(255, 99, 71, 0.3), rgba(255, 255, 255, 0.5));
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        .details-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .header-section .logo img {
            max-width: 60px;
        }

        .header-section .item-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .details-row {
            margin-top: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .details-item {
            background: #fafafa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
        }

        .details-item dt {
            font-weight: bold;
            color: #555;
        }

        .details-item dd {
            margin: 0;
            color: #777;
        }

        .codes-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .codes-row .code {
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }

        .code img {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        /* Button styles */
        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .details-btn {
            display: inline-block;
            margin: 5px;
            padding: 12px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .details-btn:hover {
            background-color: #0056b3;
        }

        .details-btn.btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .details-btn.btn-warning:hover {
            background-color: #e0a800;
        }

        .details-btn.btn-danger {
            background-color: #dc3545;
        }

        .details-btn.btn-danger:hover {
            background-color: #c82333;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            color: #aaa;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="details-container">
        <div class="header-section">
            <div class="logo">
                <img src="/images/sda.png" alt="Logo">
            </div>
            <div class="item-name">{{ $ownedItem->item_name }}</div>
        </div>

        <div class="details-row">
            <div class="details-item">
                <dt>Department</dt>
                <dd>{{ $ownedItem->department->dept_name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Category</dt>
                <dd>{{ $ownedItem->category->category_name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Sub Category</dt>
                <dd>{{ $ownedItem->subcategory->subcategory_name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Status</dt>
                <dd>{{ $ownedItem->status }}</dd>
            </div>
            <div class="details-item">
                <dt>Description</dt>
                <dd>{{ $ownedItem->description }}</dd>
            </div>
            <div class="details-item">
                <dt>Item Value</dt>
                <dd>{{ $ownedItem->item_value }}</dd>
            </div>
            <div class="details-item">
                <dt>Item Condition</dt>
                <dd>{{ $ownedItem->item_condition }}</dd>
            </div>
            <div class="details-item">
                <dt>Location</dt>
                <dd>{{ $ownedItem->location }}</dd>
            </div>
            <div class="details-item">
                <dt>Barcode Number</dt>
                <dd>{{ $ownedItem->barcode }}</dd>
            </div>
            <div class="details-item">
                <dt>Serial Number</dt>
                <dd>{{ $ownedItem->actual_serial_no ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Donor</dt>
                <dd>{{ $ownedItem->donor->name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Receiver</dt>
                <dd>{{ $ownedItem->donated_to->name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Supplier</dt>
                <dd>{{ $ownedItem->supplier->name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Customer</dt>
                <dd>{{ $ownedItem->customer->name ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Date Added</dt>
                <dd>{{ $ownedItem->created_at ?? 'N/A' }}</dd>
            </div>
            <div class="details-item">
                <dt>Date Updated</dt>
                <dd>{{ $ownedItem->updated_at ?? 'N/A' }}</dd>
            </div>
        </div>

        <div class="codes-row">
            <div class="code">
                <strong>Barcode</strong>
                <img src="{{ route('owned_items.barcode', $ownedItem->id) }}" alt="Barcode">
            </div>
            <div class="code">
                <strong>Serial Barcode</strong>
                @if($ownedItem->actual_serial_no)
                <img src="{{ route('owned_items.serial_barcode', $ownedItem->id) }}" alt="Serial Barcode">
                @else
                <p>None</p>
                @endif
            </div>
            <div class="code">
                <strong>QR Code</strong>
                <img src="{{ route('owned_items.qrcode', ['id' => $ownedItem->id]) }}" alt="QR Code">
            </div>
        </div>

        <div class="button-container">
            <a href="{{ route('owned_items.edit', $ownedItem->id) }}" class="details-btn btn-warning">Edit</a>
            <form action="{{ route('owned_items.destroy', $ownedItem->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="details-btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('admin.show_inventory') }}" class="details-btn btn-primary">Back to List</a>
            <a href="{{ route('owned_items.print', $ownedItem->id) }}" class="details-btn btn-secondary">Print Codes</a>
        </div>
    </div>

    <footer>
        <span>&copy; University SDA Church 2024</span><br>
        <span>Computer Science Dept - <a href="https://www.unza.zm" target="_blank">University Of Zambia</a></span>
    </footer>
</body>

</html>
