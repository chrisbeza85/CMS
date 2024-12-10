<!-- resources/views/owned_items/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<div class="container mt-4">
    <h1>Edit Item</h1>
    <form action="{{ route('owned_items.update', $ownedItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" id="item_name" value="{{ $ownedItem->item_name }}" readonly>
        </div>

        <div class="form-group">
            <label for="actual_serial_no">Serial Number</label>
            <input type="text" name="actual_serial_no" class="form-control" id="actual_serial_no" value="{{ $ownedItem->actual_serial_no }}">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $ownedItem->quantity }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="stored" {{ $ownedItem->status === 'Stored' ? 'selected' : '' }}>Stored</option>
                <option value="lost" {{ $ownedItem->status === 'Lost' ? 'selected' : '' }}>Lost</option>
                <option value="damaged" {{ $ownedItem->status === 'Damaged' ? 'selected' : '' }}>Damaged</option>
                <option value="outbound" {{ $ownedItem->status === 'Outbound' ? 'selected' : '' }}>Outbound</option>
                <option value="inbound" {{ $ownedItem->status === 'Inbound' ? 'selected' : '' }}>Inbound</option>
                <option value="donated" {{ $ownedItem->status === 'Donated' ? 'selected' : '' }}>Donated</option>
                <option value="received" {{ $ownedItem->status === 'Received' ? 'selected' : '' }}>Received</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description">{{ $ownedItem->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="item_value">Item Value</label>
            <input type="number" step="0.01" name="item_value" class="form-control" id="item_value" value="{{ $ownedItem->item_value }}">
        </div>

        <div class="form-group">
            <label for="item_condition">Item Condition</label>
            <select name="item_condition" class="form-control" id="item_condition">
                <option value="new" {{ $ownedItem->item_condition == 'new' ? 'selected' : '' }}>New</option>
                <option value="used" {{ $ownedItem->item_condition == 'used' ? 'selected' : '' }}>Used</option>
                <option value="good" {{ $ownedItem->item_condition == 'good' ? 'selected' : '' }}>Good</option>
                <option value="fair" {{ $ownedItem->item_condition == 'fair' ? 'selected' : '' }}>Fair</option>
                <option value="poor" {{ $ownedItem->item_condition == 'poor' ? 'selected' : '' }}>Poor</option>
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="location" value="{{ $ownedItem->location }}">
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" id="supplier_id">
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $ownedItem->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" class="form-control" id="customer_id">
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $ownedItem->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="donor_id">Donor</label>
            <select name="donor_id" class="form-control" id="donor_id">
                <option value="">Select Donor</option>
                @foreach ($donors as $donor)
                    <option value="{{ $donor->id }}" {{ $ownedItem->donor_id == $donor->id ? 'selected' : '' }}>{{ $donor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="donated_to_id">Donated To</label>
            <select name="donated_to_id" class="form-control" id="donated_to_id">
                <option value="">Select Recipient</option>
                @foreach ($donatedTos as $donatedTo)
                    <option value="{{ $donatedTo->id }}" {{ $ownedItem->donated_to_id == $donatedTo->id ? 'selected' : '' }}>{{ $donatedTo->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- New Fields -->
        <div class="form-group">
            <label for="dept_code">Department</label>
            <select name="dept_code" class="form-control" id="dept_code" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->dept_code }}" {{ $ownedItem->dept_code == $department->dept_code ? 'selected' : '' }}>{{ $department->dept_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $ownedItem->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" class="form-control" id="subcategory_id" required>
                <option value="">Select Subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $ownedItem->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="year_bought">Year Bought</label>
            <input type="number" name="year_bought" class="form-control" id="year_bought" value="{{ $ownedItem->year_bought }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.show_inventory') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>