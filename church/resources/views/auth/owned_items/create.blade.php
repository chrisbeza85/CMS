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

@section('title', 'Add Owned Item')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add Item</h1>

    <form action="{{ route('owned_items.store') }}" method="POST">
        @csrf
        <!-- Item Name -->
        <div class="form-group">
            <label for="item_name">Item Name</label>
            <input type="text" name="item_name" class="form-control" id="item_name" required>
        </div>

        <!-- Serial Number -->
        <div class="form-group">
            <label for="actual_serial_no">Serial Number</label>
            <input type="text" name="actual_serial_no" class="form-control" id="actual_serial_no" required>
        </div>

        <!-- Quantity -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" required>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="stored">Stored</option>
                <option value="lost">Lost</option>
                <option value="damaged">Damaged</option>
                <option value="outbound">Outbound</option>
                <option value="inbound">Inbound</option>
                <option value="donated">Donated</option>
                <option value="received">Received</option>
            </select>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>

        <!-- Item Value -->
        <div class="form-group">
            <label for="item_value">Item Value</label>
            <input type="number" step="0.01" name="item_value" class="form-control" id="item_value">
        </div>

        <!-- Item Condition -->
        <div class="form-group">
            <label for="item_condition">Item Condition</label>
            <select name="item_condition" class="form-control" id="item_condition">
                <option value="new">New</option>
                <option value="used">Used</option>
                <option value="good">Good</option>
                <option value="fair">Fair</option>
                <option value="poor">Poor</option>
            </select>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="location">
        </div>

        <!-- Supplier -->
        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" id="supplier_id">
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Customer -->
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" class="form-control" id="customer_id">
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Donor -->
        <div class="form-group">
            <label for="donor_id">Donor</label>
            <select name="donor_id" class="form-control" id="donor_id">
                <option value="">Select Donor</option>
                @foreach ($donors as $donor)
                    <option value="{{ $donor->id }}">{{ $donor->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Donated To -->
        <div class="form-group">
            <label for="donated_to_id">Donated To</label>
            <select name="donated_to_id" class="form-control" id="donated_to_id">
                <option value="">Select Recipient</option>
                @foreach ($donatedTos as $donatedTo)
                    <option value="{{ $donatedTo->id }}">{{ $donatedTo->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Department -->
        <div class="form-group">
            <label for="dept_code">Department</label>
            <select name="dept_code" class="form-control" id="dept_code" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->dept_code }}">{{ $department->dept_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Equipment Category -->
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Equipment Subcategory -->
        <div class="form-group">
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" class="form-control" id="subcategory_id" required>
                <option value="">Select Subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Year Bought -->
        <div class="form-group">
            <label for="year_bought">Year Bought</label>
            <input type="number" name="year_bought" class="form-control" id="year_bought" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>
@endsection


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
