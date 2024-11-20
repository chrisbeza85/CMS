<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .btn-toggle {
            display: none;
        }
        .btn-expand, .btn-collapse {
            display: none;
        }
        .btn-expand.show {
            display: inline-block;
        }
        .btn-collapse.show {
            display: inline-block;
        }
    </style>
</head>
@extends('layouts.app')

@section('title', 'Inventory')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container mt-4">
    <h1 class="mb-4">Inventory</h1>

    <a href="{{ route('owned_items.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Inventory
    </a>

<body>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ownedItemsGrouped as $group)
                    <tr>
                        <td>{{ $group->item_name }}</td>
                        <td>{{ $group->quantity }}</td>
                        <td>
                            <!-- Expand Button -->
                            <button class="btn btn-info btn-sm btn-expand" type="button" data-toggle="collapse" data-target="#itemDetails{{ $loop->index }}" aria-expanded="false" aria-controls="itemDetails{{ $loop->index }}">
                                <i class="fas fa-caret-down"></i>
                            </button>
                            <!-- Collapse Button -->
                            <button class="btn btn-secondary btn-sm btn-collapse" type="button" onclick="$('#itemDetails{{ $loop->index }}').collapse('hide')">
                                <i class="fas fa-caret-up"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="collapse" id="itemDetails{{ $loop->index }}" data-target="#itemDetails{{ $loop->index }}" data-toggle="collapse">
                        <td colspan="3">
                            <div class="record-details">
                                @foreach(App\Models\OwnedItem::where('item_name', $group->item_name)->get() as $item)
                                    <div class="record-item d-flex justify-content-between align-items-center p-2 border rounded mb-2">
                                        <div>
                                            <strong>ID:</strong> {{ $item->id }} <br>
                                            <strong>Status:</strong> {{ $item->status }} <br>
                                            <strong>Condition:</strong> {{ $item->item_condition }} <br>
                                            <strong>Location:</strong> {{ $item->location }}
                                        </div>
                                        <div>
                                            <a href="{{ route('owned_items.barcode', $item->id) }}" target="_blank" class="btn btn-link"><i class="fas fa-barcode"></i></a>
                                            <a href="{{ route('owned_items.print', $item->id) }}" class="btn btn-secondary btn-sm" target="_blank"><i class="fas fa-print"></i></a>
                                            <a href="{{ route('owned_items.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('owned_items.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                            <form action="{{ route('owned_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.collapse').on('shown.bs.collapse', function () {
            var targetId = $(this).attr('id');
            $('button[data-target="#' + targetId + '"].btn-expand').hide();
            $('button[data-target="#' + targetId + '"].btn-collapse').show();
        }).on('hidden.bs.collapse', function () {
            var targetId = $(this).attr('id');
            $('button[data-target="#' + targetId + '"].btn-expand').show();
            $('button[data-target="#' + targetId + '"].btn-collapse').hide();
        });

        // Show collapse button initially hidden
        $('.collapse').each(function () {
            var targetId = $(this).attr('id');
            if ($(this).hasClass('show')) {
                $('button[data-target="#' + targetId + '"].btn-collapse').show();
                $('button[data-target="#' + targetId + '"].btn-expand').hide();
            }
        });
    });
</script>

</body>
</html>
