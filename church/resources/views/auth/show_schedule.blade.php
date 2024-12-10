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
        <div class="d-sm-flex justify-content-start justify-content-sm-between align-items-center">
            <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                <i class="fa-solid fa-calendar"></i>&nbsp;Schedule Details
            </span>
            <p class="details mb-0 ms-3">
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($item->date)->format('F j, Y') }}
            </p>
        </div>
    </footer>


    <div id="block_bg" class="block">
        <div id="register" class="form-container">
            <form method="POST" autocomplete="on" action="{{ url('/add_members') }}">
                <div class="card">
                    <div class="card-body">
                        <h2 class="details">Id: {{ $item->id }}</h2>
                        <p class="details"><strong>Date:</strong> {{ $item->date }}</p>
                        <p class="details"><strong>Theme:</strong> {{ $item->theme }}</p>
                        <p class="details"><strong>Elder On Duty - 1:</strong> {{ $item->elder_on_duty_1 }}</p>
                        <p class="details"><strong>Elder On Duty - 2:</strong> {{ $item->elder_on_duty_2 }}</p>
                        <a class="btn btn-primary" href="{{ url('/update_member', $item->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ url('/weekly_schedule') }}">Back to List</a>
                    </div>
                </div>
                <footer class="footer3">
                    <div class="d-sm-flex justify-content-start justify-content-sm-between align-items-center">
                        <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                            <i class="fa-solid fa-calendar-days"></i>&nbsp;Event Details
                        </span>
                    </div>
                </footer>
                <div class="card4">
                    <div class="card-body">
                    <h2 class="details">Id: {{ $item->id }}</h2>
                        <p class="details"><strong>Name:</strong> {{ $item->name }}</p>
                        <p class="details"><strong>Details:</strong> {{ $item->details }}</p>
                        <p class="details"><strong>Countdown Hours:</strong> {{ $item->countdown_hours }}</p>
                        <p class="details"><strong>Countdown Minutes:</strong> {{ $item->countdown_minutes }}</p>
                        <p class="details"><strong>Countdown Seconds:</strong> {{ $item->countdown_seconds }}</p>
                        <p class="details"><strong>Added By:</strong> {{ $item->added_by }}</p>
                        <a class="btn btn-primary" href="{{ url('/update_member', $item->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ url('/insert_event') }}">Add Event</a>
                    </div>
                </div>

                <footer class="footer3">
                    <div class="d-sm-flex justify-content-start justify-content-sm-between align-items-center">
                        <span class="text-muted4 d-block text-center text-sm-left d-sm-inline-block">
                            <i class="fa-solid fa-clock"></i>&nbsp;Timer
                        </span>
                    </div>
                </footer>
                <div class="card4">
                    <div class="card-body">
                        <!-- Countdown Timer -->
                        <div id="countdown" class="countdown">
                            Time Remaining: <span id="timer">00:00:00</span>
                        </div>

                        <a class="btn btn-secondary" href="{{ url('/insert_event') }}">Full Screen</a>
                    </div>
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
    </div>

    <script src="/images/script.js"></script>
</body>

</html>