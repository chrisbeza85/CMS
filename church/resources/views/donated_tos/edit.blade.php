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

@section('title', 'Edit DonatedTo')

@section('content')
<div class="container mt-4">
    <h1>Edit Receiver Details</h1>
    <form action="{{ route('donated_tos.update', $donatedTo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $donatedTo->name) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="address">{{ old('address', $donatedTo->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <textarea name="email" class="form-control" id="email">{{ old('email', $donatedTo->email) }}</textarea>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $donatedTo->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('donated_tos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>