<!-- resources/views/suppliers/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
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
    </style>
</head>

<body>
@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')
<class="container mt-4">
    <footer class="footer2">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-user"></i>&nbsp;Supplier List
            </span>
        </div>

        <div class="d-flex justify-content-start mt-2 mb-2">
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm rounded-circle" title="Add Suplier" style="width: 30px; height: 30px; display: inline-flex; align-items: center; justify-content: center;">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-circle-info"></i>&nbsp;Total Suppliers:
                <span class="badge badge-info"> {{ $suppliers->count() }}</span>
            </span>
        </div>

        <div class="search-container mb-3">
            <input type="text" id="search-input" class="form-control" placeholder="Search Suppliers" onkeyup="searchTable()">
        </div>
    </footer>

    <div id="register" class="form-container">
    <div class="table-wrapper mt-4">
        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Website</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_info }}</td>
                    <td>{{ $supplier->phone_no }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->company_name }}</td>
                    <td>{{ $supplier->website }}</td>
                    <td>
                        <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-eye"></i> View
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fa-solid fa-trash icon-medium"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div>
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
</div>
@endsection


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    // Optional: JavaScript function for searching the table
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-input");
        filter = input.value.toUpperCase();
        table = document.getElementById("example");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = "none";
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
</script>
</body>
</html>

