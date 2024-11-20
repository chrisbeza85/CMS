<!-- resources/views/suppliers/show.blade.php -->
<!-- resources/views/suppliers/create.blade.php -->
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

@section('title', 'View Supplier')

@section('content')
<div class="container mt-4">
<h1>Supplier Details</h1>
    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $supplier->name }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">{{ $supplier->email }}</dd>

        <dt class="col-sm-3">Phone</dt>
        <dd class="col-sm-9">{{ $supplier->phone_no }}</dd>

        <dt class="col-sm-3">Address</dt>
        <dd class="col-sm-9">{{ $supplier->address }}</dd>

        <dt class="col-sm-3">Company Name</dt>
        <dd class="col-sm-9">{{ $supplier->company_name }}</dd>

        <dt class="col-sm-3">Website</dt>
        <dd class="col-sm-9">{{ $supplier->website }}</dd>
    </dl>
    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back To List</a>
</div>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
