<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Logs</title>
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

@section('title', 'Audit Report')

@section('content')
<div class="container mt-4">
    <footer class="footer2">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-file-alt"></i>&nbsp;Report Logs
            </span>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-circle-info"></i>&nbsp;Total Logs:
                <span class="badge badge-info">{{ $audits->count() }}</span>
            </span>
        </div>

        <div class="search-container mb-3">
            <input type="text" id="search-input" class="form-control" placeholder="Search Report Logs" onkeyup="searchTable()">
        </div>
    </footer>

    <div id="register" class="form-container">
        <div class="table-wrapper mt-4">
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="audit-table">
                <thead>
                    <tr>
                        <th>Model ID</th>
                        <th>Event</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audits as $audit)
                    <tr>
                        <td>{{ $audit->auditable_id }}</td>
                        <td>{{ ucfirst($audit->event) }}</td>
                        <td>{{ $audit->user ? $audit->user->name : 'System' }}</td>
                        <td>{{ $audit->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('reports.show', $audit->id) }}" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search-input");
        filter = input.value.toUpperCase();
        table = document.getElementById("audit-table");
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
