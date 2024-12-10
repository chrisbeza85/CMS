<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/viewmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>View Church Members</title>
    <style>
        /* Autofill input styling */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            /* Changes background color */
            box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #04AA6D !important;
            /* Changes text color */
        }
    </style>
</head>

<body>
    <footer class="footer2">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-user"></i>&nbsp;Church Members
            </span>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-circle-info"></i>&nbsp;Number Of Members:<span class="badge badge-info">
                    {{ $memberCount }}</span>
            </span>
        </div>

        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search Members"
                onkeyup="searchTable()">
        </div>
    </footer>

    <div id="block_bg" class="block">
        <div id="register" class="form-container">
            <form method="POST" autocomplete="on" action="{{ url('/add_members') }}">
                @csrf

                <div class="table-wrapper">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <thead>
                            <tr>
                                <th class="t1">id</th>
                                <th class="t4">First Name</th>
                                <th class="t4">Middle Name</th>
                                <th class="t4">Last Name</th>
                                <th class="t4">Gender</th>
                                <th class="t4">Address</th>
                                <th class="t4">Marital Status</th>
                                <th class="t4">Birthday</th>
                                <th class="t4">Ministry</th>
                                <th class="t4">Mobile Number</th>
                                <th class="t4">Register As</th>
                                <th class="t4">Date Of Registration</th>
                                <th class="t4">Email Address</th>
                                <th class="t4">Delete</th>
                                <th class="t2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->fname }}</td>
                                    <td>{{ $member->mname }}</td>
                                    <td>{{ $member->lname }}</td>
                                    <td>{{ $member->gender }}</td>
                                    <td>{{ $member->address }}</td>
                                    <td>{{ $member->marital }}</td>
                                    <td>{{ $member->birthday }}</td>
                                    <td>{{ $member->ministry }}</td>
                                    <td>{{ $member->mobile }}</td>
                                    <td>{{ $member->registeras }}</td>
                                    <td>{{ $member->registrationdate }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>
                                        <a onclick="return confirm('Are You Sure You Want To Delete This Member')"
                                            class="btn btn-danger" href="{{ url('delete_members', $member->id) }}">
                                            <i class="fa-solid fa-trash icon-medium"></i>Delete
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/update_member', $member->id) }}">
                                            <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA
                Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems
                    Engineering</a> from University Of Zambia</span>
        </div>
    </footer>

    <script>
        function searchTable() {
            // Get the search input value
            var input = document.getElementById("search-input").value.toLowerCase();
            var table = document.getElementById("example");
            var trs = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (var i = 1; i < trs.length; i++) { // Start from 1 to skip header row
                var tds = trs[i].getElementsByTagName("td");
                var match = false;
                for (var j = 0; j < tds.length; j++) {
                    if (tds[j].innerHTML.toLowerCase().indexOf(input) > -1) {
                        match = true;
                        break;
                    }
                }
                trs[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>

</html>