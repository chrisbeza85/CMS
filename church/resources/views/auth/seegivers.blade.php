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
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-user"></i>&nbsp;Givings</span>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-circle-info"></i>&nbsp;Number Of Givings:<span class="badge badge-info"> {{ $givingCount }}</span></span>
        </div>

        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search Members" onkeyup="searchTable()">
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
                                <th class="t4">Givings</th>
                                <th class="t4">Amount</th>
                                <th class="t4">Mobile Number</th>
                                <th class="t4">Comment</th>
                                <th class="t2">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalamount=0; ?>
                            @foreach($givings as $give)
                            <tr>
                                <td>{{ $give->id }}</td>
                                <td>{{ $give->fname }}</td>
                                <td>{{ $give->mname }}</td>
                                <td>{{ $give->lname }}</td>
                                <td>{{ $give->giving }}</td>
                                <td>{{ $give->amount }}</td>
                                <td>{{ $give->mobile }}</td>
                                <td>{{ $give->comment }}</td>
                                <td>
                                    <a onclick="return confirm('Are You Sure You Want To Delete This Member')" class="btn btn-danger" href="{{ url('delete_givers', $give->id) }}"> <i class="fa-solid fa-trash icon-medium"></i>Delete</a>
                                </td>
                            </tr>
                            <?php $totalamount=$totalamount + $give->amount ?>
                            @endforeach

                            {{$totalamount}}
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
