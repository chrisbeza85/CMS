<!-- resources/views/owned_items/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<!-- resources/views/owned_items/show.blade.php -->
@extends('layouts.app')

@section('title', 'Item Details')

@section('content')
<div class="container mt-4">
    <h1>Item Details</h1>
    <dl class="row">
        <dt class="col-sm-3">Item Name</dt>
        <dd class="col-sm-9">{{ $ownedItem->item_name }}</dd>

        <dt class="col-sm-3">Status</dt>
        <dd class="col-sm-9">{{ $ownedItem->status }}</dd>

        <dt class="col-sm-3">Description</dt>
        <dd class="col-sm-9">{{ $ownedItem->description }}</dd>

        <dt class="col-sm-3">Item Value</dt>
        <dd class="col-sm-9">{{ $ownedItem->item_value }}</dd>

        <dt class="col-sm-3">Item Condition</dt>
        <dd class="col-sm-9">{{ $ownedItem->item_condition }}</dd>

        <dt class="col-sm-3">Location</dt>
        <dd class="col-sm-9">{{ $ownedItem->location }}</dd>

        <dt class="col-sm-3">Supplier</dt>
        <dd class="col-sm-9">{{ $ownedItem->supplier->name ?? 'N/A' }}</dd>

        <dt class="col-sm-3">Customer</dt>
        <dd class="col-sm-9">{{ $ownedItem->customer->name ?? 'N/A' }}</dd>

        <dt class="col-sm-3">Donor</dt>
        <dd class="col-sm-9">{{ $ownedItem->donor->name ?? 'N/A' }}</dd>

        <dt class="col-sm-3">Donated To</dt>
        <dd class="col-sm-9">{{ $ownedItem->donatedTo->name ?? 'N/A' }}</dd>

        <dt class="col-sm-3">Department</dt>
        <dd class="col-sm-9">{{ $ownedItem->department->dept_name ?? 'N/A' }}</dd> <!-- Show department name -->

        <dt class="col-sm-3">Category</dt>
        <dd class="col-sm-9">{{ $ownedItem->category->category_name ?? 'N/A' }}</dd> <!-- Show category name -->

        <dt class="col-sm-3">Subcategory</dt>
        <dd class="col-sm-9">{{ $ownedItem->subcategory->subcategory_name ?? 'N/A' }}</dd> <!-- Show subcategory name -->

        <dt class="col-sm-3">Barcode</dt>
        <dd class="col-sm-9"><img src="{{ route('owned_items.barcode', $ownedItem->id) }}" alt="Barcode"></dd>

        <dt class="col-sm-3">Serial Barcode</dt>
        <dd class="col-sm-9">
            @if($ownedItem->actual_serial_no)
                <img src="{{ route('owned_items.serial_barcode', $ownedItem->id) }}" alt="Serial Barcode">
            @else
                None
            @endif
        </dd>

        <a href="{{ route('owned_items.print', $ownedItem->id) }}" class="btn btn-secondary btn-sm" target="_blank">
            Print Barcode
        </a>
    </dl>
    <a href="{{ route('owned_items.edit', $ownedItem->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('owned_items.destroy', $ownedItem->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('owned_items.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>