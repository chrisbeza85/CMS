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

@section('content')
    <h1>Equipment Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>

    @foreach ($categories as $category)
    <div class="category">
        <h3>{{ $category->category_name }} ({{ $category->category_code }})</h3>

        @if ($category->subcategories->isNotEmpty())
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li>
                        {{ $subcategory->subcategory_name }} ({{ $subcategory->subcategory_code }})
                        <!-- Delete Subcategory Button -->
                        <form action="{{ route('categories.subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subcategory?');">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No subcategories available.</p>
        @endif
        <a href="{{ route('categories.create_subcategory', $category->id) }}" class="btn btn-primary">Add Subcategory</a>
    </div>
@endforeach
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>