
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

@section('title', 'Edit Donor')

@section('content')
<div class="container mt-4">
    <h1>Edit Donor Details</h1>
    <form action="{{ route('donors.update', $donor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $donor->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $donor->email) }}">
        </div>
        <div class="form-group">
            <label for="phone_no">Phone</label>
            <input type="text" name="phone_no" class="form-control" id="phone_no" value="{{ old('phone_no', $donor->phone_no) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('donors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
