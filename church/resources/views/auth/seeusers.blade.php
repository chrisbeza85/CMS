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
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-user"></i>&nbsp;Church Users</span>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-circle-info"></i>&nbsp;Number Of Users:<span class="badge badge-info"> {{ $userCount }}</span></span>
        </div>

        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search Users" onkeyup="searchTable()">
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
                                <th class="t4">Names</th>
                                <th class="t4">Email Address</th>
                                <th class="t4">Mobile Phone</th>
                                <th class="t4">Gender</th>
                                <th class="t4">Birthday</th>
                                <th class="t4">Residence Address</th>
                                <th class="t4">Delete</th>
                                <th class="t2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->birthday}}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <a onclick="return confirm('Are You Sure You Want To Delete This Member')" class="btn btn-danger" href="{{ url('delete_users', $user->id) }}"> <i class="fa-solid fa-trash icon-medium"></i>Delete</a>
                                </td>

                                <td>
                                    <a class="btn btn-success" href="{{ url('/update_user', $user->id) }}">&nbsp;&nbsp;
                                        <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit &nbsp;&nbsp;
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        </form>
    </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia</span>
        </div>
    </footer>
    </div>

</body>

</html>
