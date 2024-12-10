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
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-user"></i>&nbsp;Church Inventory</span>
        </div>

        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted3 d-block text-center text-sm-left d-sm-inline-block"><i class="fa-solid fa-circle-info"></i>&nbsp;Number Of Equipment:<span class="badge badge-info"> {{ $inventoryCount }}</span></span>
        </div>

        <div class="search-container">
            <input type="text" id="search-input" class="form-control" placeholder="Search Equipment" onkeyup="searchTable()">
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
                                <th class="t4">Title</th>
                                <th class="t4">Description</th>
                                <th class="t4">Price</th>
                                <th class="t4">Quantity</th>
                                <th class="t4">Category</th>
                                <th class="t4">Condition</th>
                                <th class="t4">Serial Number</th>
                                <th class="t4">QR Code</th>
                                <th class="t4">Equipment Image</th>
                                <th class="t4">Purchase Date</th>
                                <th class="t4">Delete</th>
                                <th class="t2">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventory as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->condition }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->qr_code }}</td>
                                <td>
                                    <img src="/inventory/{{ $item->image }}" alt="{{ $item->title }}" style="width: 100px; height: auto;">
                                </td>
                                <td>{{ $item->purchase_date->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a onclick="return confirm('Are You Sure You Want To Delete This Equipment')" class="btn btn-danger" href="{{ url('delete_inventory', $item->id) }}">
                                        <i class="fa-solid fa-trash icon-medium"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('/update_inventory', $item->id) }}">&nbsp;&nbsp;
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

    <script src="/images/script.js"></script>
</body>

</html>
