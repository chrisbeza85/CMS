<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Categories</title>
    <link rel="stylesheet" href="{{ asset('css/viewmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <style>
        /* Autofill input styling */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #04AA6D !important;
        }
        .category-header {
            cursor: pointer;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #04AA6D;
            color: #fff;
        }
        .category-body {
            padding: 10px;
            border-left: 2px solid #04AA6D;
            display: none;
            background-color: #e0f2e9; /* Light green background for dropdown */
        }
        .category-body ul {
            list-style-type: none;
            padding-left: 20px;
        }
        .category-body ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #000; /* Black text color for better readability */
        }
    </style>
</head>

<body>
@extends('layouts.app')

@section('title', 'Equipment Categories')

@section('content')
<div class="container mt-4">
    <footer class="footer2">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-folder-open"></i>&nbsp;Equipment Categories
            </span>
        </div>

        <div class="d-flex justify-content-start mt-2 mb-2">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm rounded-circle" title="Add Category" style="width: 30px; height: 30px; display: inline-flex; align-items: center; justify-content: center;">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </footer>

    @foreach ($categories as $category)
    <div class="category mb-3">
        <div class="category-header" onclick="toggleCategory({{ $category->id }})">
            <span>{{ $category->category_name }} ({{ $category->category_code }})</span>
            <i class="fa fa-chevron-down"></i>
        </div>
        
        <div id="category-body-{{ $category->id }}" class="category-body">
            @if ($category->subcategories->isNotEmpty())
                <ul>
                    @foreach ($category->subcategories as $subcategory)
                        <li>
                            <span>{{ $subcategory->subcategory_name }} ({{ $subcategory->subcategory_code }})</span>
                            <div>
                                <a href="{{ route('categories.subcategories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form action="{{ route('categories.subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subcategory?');">
                                        <i class="fa-solid fa-trash icon-medium"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No subcategories available.</p>
            @endif
            <a href="{{ route('categories.create_subcategory', $category->id) }}" class="btn btn-primary btn-sm mt-2">
                <i class="fa-solid fa-plus"></i> Add Subcategory
            </a>
        </div>
    </div>
    @endforeach

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">
                Copyright © University SDA Church 2024
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Computer Science Dept <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia
            </span>
        </div>
    </footer>
</div>
@endsection

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleCategory(id) {
        const categoryBody = document.getElementById(`category-body-${id}`);
        const icon = categoryBody.previousElementSibling.querySelector('.fa-chevron-down');
        
        if (categoryBody.style.display === "none" || categoryBody.style.display === "") {
            categoryBody.style.display = "block";
            icon.classList.remove("fa-chevron-down");
            icon.classList.add("fa-chevron-up");
        } else {
            categoryBody.style.display = "none";
            icon.classList.remove("fa-chevron-up");
            icon.classList.add("fa-chevron-down");
        }
    }
</script>
</body>
</html>
