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

@section('title', 'Donated To')

@section('content')
<div class="container mt-4">
    <h1>Donated To</h1>
    <a href="{{ route('donated_tos.create') }}" class="btn btn-primary mb-3">Add Receiver</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donatedTos as $donatedTo)
                <tr>
                    <td>{{ $donatedTo->id }}</td>
                    <td>{{ $donatedTo->name }}</td>
                    <td>{{ $donatedTo->address }}</td>
                    <td>{{ $donatedTo->email }}</td>
                    <td>{{ $donatedTo->phone }}</td>
                    <td>
                        <a href="{{ route('donated_tos.show', $donatedTo->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('donated_tos.edit', $donatedTo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('donated_tos.destroy', $donatedTo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>