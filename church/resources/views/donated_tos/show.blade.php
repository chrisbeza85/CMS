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

@section('title', 'DonatedTo Details')

@section('content')
<div class="container mt-4">
    <h1>Receiver Details</h1>
    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $donatedTo->name }}</dd>

        <dt class="col-sm-3">Address</dt>
        <dd class="col-sm-9">{{ $donatedTo->address }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">{{ $donatedTo->email }}</dd>

        <dt class="col-sm-3">Phone</dt>
        <dd class="col-sm-9">{{ $donatedTo->phone }}</dd>
    </dl>

    <a href="{{ route('donated_tos.edit', $donatedTo->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('donated_tos.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
