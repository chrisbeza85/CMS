<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        .inventory-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .item-header h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .item-details {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .barcode-container,
        .qr-code-container {
            flex: 1;
            text-align: center;
        }

        .barcode-container img,
        .qr-code-container img {
            max-width: 100px;
            height: auto;
        }

        .actions {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 20px;
        }

        .actions button, .actions a {
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn {
            font-weight: 500;
        }

        .collapse-toggle {
            color: #007bff;
            cursor: pointer;
        }

        .collapse-toggle:hover {
            text-decoration: underline;
        }

        .table-container {
            margin-top: 30px;
        }

        /* Ensuring both buttons are of the same size and aligned */
        .btn-flex, .details-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            width: 200px; /* Set the width to ensure both buttons are the same size */
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

        /* Spacing between the buttons */
        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn-flex i, .details-btn i {
            margin-right: 8px; /* Space between icon and text */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Optional: You can add this style if you want a more consistent layout across other button types */
        .details-btn {
            background-color: #007bff;
            color: #fff;
        }

        .details-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

@extends('layouts.app')

@section('title', 'Inventory')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Inventory</h1>
    <div class="button-container">
        <!-- Add Inventory Button -->
        <a href="{{ route('owned_items.create') }}" class="btn btn-primary mb-4 btn-flex">
            <i class="fas fa-plus"></i> Add Inventory
        </a>
        <!-- Print Inventory Button -->
        <a href="{{ route('admin.inventory.print') }}" class="btn btn-primary mb-4 btn-flex" target="_blank">
            <i class="fas fa-print"></i> Print Inventory
        </a>
    </div>

    <div class="table-container">
        @foreach($ownedItemsGrouped as $group)
        <div class="inventory-card">
            <div class="item-header">
                <h2>{{ $group->item_name }}</h2>
                <span class="collapse-toggle" data-toggle="collapse" data-target="#itemDetails{{ $loop->index }}" aria-expanded="false" aria-controls="itemDetails{{ $loop->index }}">
                    View Details <i class="fas fa-chevron-down"></i>
                </span>
            </div>
            <div id="itemDetails{{ $loop->index }}" class="collapse">
                <div>
                    <strong>Quantity:</strong> {{ $group->quantity }}
                </div>
                @foreach(App\Models\OwnedItem::where('item_name', $group->item_name)->get() as $item)
                <div class="item-details mt-3">
                    <div>
                        <strong>Status:</strong> {{ $item->status }}<br>
                        <strong>Condition:</strong> {{ $item->item_condition }}<br>
                        <strong>Location:</strong> {{ $item->location }}
                    </div>
                    <div class="barcode-container">
                        <strong>Barcode</strong><br>
                        <span>{{ $item->barcode }}</span>
                    </div>
                </div>
                <div class="actions">
                    <a href="{{ route('owned_items.edit', $item->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('owned_items.show', $item->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action="{{ route('owned_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.collapse').on('shown.bs.collapse', function () {
            $(this).siblings('.collapse-toggle').html('Hide Details <i class="fas fa-chevron-up"></i>');
        }).on('hidden.bs.collapse', function () {
            $(this).siblings('.collapse-toggle').html('View Details <i class="fas fa-chevron-down"></i>');
        });
    });
</script>
</body>
</html>
