<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/viewmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>View Equipment</title>
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
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block"><i
                    class="fa-solid fa-calendar"></i>&nbsp;Schedules</span>
        </div>
        <p class="buttonlayout">
            <a class="btn btn-success mx-2" href="/time_management"><i class="fas fa-sitemap"></i> Time
                Management</a> <a class="btn btn-success mx-2" href="{{ url('/insert_schedule') }}"><i
                    class="fa fa-plus"></i> Add Schedule</a> <a class="btn btn-success mx-2"
                href="/unisda-24/web/weekly-schedule/weekly-bulletins"><i class="fas fa-newspaper"></i> Bulletins</a>
        </p>
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
                                <th class="t4">Date</th>
                                <th class="t4">Theme</th>
                                <th class="t4">Elder On Duty - 1</th>
                                <th class="t4">Elder On Duty - 2</th>
                                <th class="t4">Delete</th>
                                <th class="t4">View</th>
                                <th class="t2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->theme }}</td>
                                    <td>{{ $item->elder_on_duty_1 }}</td>
                                    <td>{{ $item->elder_on_duty_2 }}</td>
                                    <td>
                                        <a onclick="return confirm('Are You Sure You Want To Delete This Member')"
                                            class="btn btn-danger" href="{{ url('delete_members', $item->id) }}">
                                            <i class="fa-solid fa-trash icon-medium"></i>Delete
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-success1" href="{{ url('/view_schedule', $item->id) }}">
                                        <i class="fa-solid fa-eye"></i>View
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-success" href="{{ url('/update_member', $item->id) }}">
                                            <i class="fa-solid fa-pen-to-square icon-medium"></i> Edit
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
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA
                Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems
                    Engineering</a> from University Of Zambia</span>
        </div>
    </footer>
    </div>

    <script src="/images/script.js"></script>
</body>

</html>