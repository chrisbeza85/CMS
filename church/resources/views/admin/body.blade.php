<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/viewmember.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css'); ?>" type="text/css">
    <title>Dashboard</title>
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

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img src="admin/assets/images/bible4.jpg" class="gradient-corona-img img-fluid"
                                        alt="">
                                </div>
                                <div class="col-5 col-sm-7 col-xl-8 p-0">
                                    <div id="verse-of-the-day"></div>
                                </div>

                                <script>
                                    function myVotdCallback(data) {
                                        var votdContainer = document.getElementById('verse-of-the-day');
                                        if (votdContainer) {
                                            votdContainer.innerHTML = data.votd.text + ' - ' + data.votd.reference;
                                        }
                                    }
                                </script>

                                <script src="https://www.biblegateway.com/votd/get/?format=json&version=NIV&callback=myVotdCallback"></script>

                                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                    <span>
                                        <a href="https://www.biblegateway.com/"
                                            target="_blank"
                                            class="btn btn-outline-light btn-rounded get-started-btn">Bible Verse Of The Day</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card1">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="span2"><br />
                                            <i class="fa-solid fa-users fa-3x"></i><br />
                                        </div>
                                        <div class="d-flex align-items-center align-self-start">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a class="nav-link" href="{{ url('see_members') }}">
                                                <span class="mdi mdi-arrow-right icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Member Details</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="span2"><br />
                                            <i class="fa-solid fa-user-plus fa-3x"></i><br />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a class="nav-link" href="{{ url('view_members') }}">
                                                <span class="mdi mdi-arrow-right icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Add Members</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="span2"><br />
                                            <i class="fa fa-calendar fa-3x"></i><br />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <span class="mdi mdi-arrow-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Upcoming Birthdays</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="span2"><br />
                                            <i class="fa fa-money-check-alt fa-3x"></i><br />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <a class="nav-link" href="{{ url('see_givings') }}">
                                                <span class="mdi mdi-arrow-right icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Givings</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="myChart" class="member-chart"></canvas>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Member Chart</h6>
                            </div>
                        </div>
                    </div>



                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myUsers" class="member-chart1"></canvas>
                                </div>
                                <div class="footer1">
                                    <h6 class="text-muted2 font-weight-normal">User Chart</h6>
                                </div>
                            </div>
                        </div>




                    <div class="col-md-7 grid-margin stretch-card d-flex justify-content-center align-items-center">
                        <div class="card text-left">
                            <!-- Embedded Bible. https://biblia.com/plugins/embeddedbible -->
                            <biblia:bible layout="normal" resource="leb" width="auto" height="393"
                                startingReference="Ge1.1"></biblia:bible>
                            <!-- If you’re including multiple Biblia widgets, you only need this script tag once -->
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Holy Bible</h6>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        University
                        SDA Church 2024</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept
                        <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer
                            Systems Engineering</a> from University Of Zambia</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myChart');

            // Check if memberCount is defined and a number
            const memberCount = {{ $memberCount }};
            const membersCount = {{ $membersCount }};
            const visitorCount = {{ $visitorCount }};
            const femaleCount = {{ $femaleCount }};
            const maleCount = {{ $maleCount }};
            const singlesCount = {{ $singlesCount }};
            const marriedCount = {{ $marriedCount }};
            const divorcedCount = {{ $divorcedCount }};
            if (typeof memberCount !== 'undefined' && !isNaN(memberCount) &&
                typeof visitorCount !== 'undefined' && !isNaN(visitorCount) &&
                typeof femaleCount !== 'undefined' && !isNaN(femaleCount) &&
                typeof maleCount !== 'undefined' && !isNaN(maleCount) &&
                typeof singlesCount !== 'undefined' && !isNaN(singlesCount) &&
                typeof marriedCount !== 'undefined' && !isNaN(marriedCount) &&
                typeof divorcedCount !== 'undefined' && !isNaN(divorcedCount) &&
                typeof membersCount !== 'undefined' && !isNaN(membersCount)) {
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Total Members', 'Visitors', 'Members', 'Females', 'Males', 'Singles',
                            'Married', 'Divorced'
                        ],
                        datasets: [{
                            label: '# of Registered',
                            data: [memberCount, visitorCount, membersCount, femaleCount, maleCount,
                                singlesCount, marriedCount, divorcedCount
                            ],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255,99,132,1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                console.error('Error: memberCount is undefined or not a number.');
            }
        });
    </script>

    <!-- If you’re including multiple Biblia widgets, you only need this script tag once -->
    <script src="//biblia.com/api/logos.biblia.js"></script>
    <script>
        logos.biblia.init();
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myUsers');

        // Check if userCount is defined and a number
        const userCount = {{ $userCount }};
        const femalesCount = {{ $femalesCount }};
        const malesCount = {{ $malesCount }};
        if (typeof femalesCount !== 'undefined' && !isNaN(femalesCount) &&
            typeof malesCount !== 'undefined' && !isNaN(malesCount) &&
            typeof userCount !== 'undefined' && !isNaN(userCount)) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Users', 'Females', 'Males',
                    ],
                    datasets: [{
                        label: 'Number Of Users',
                        data: [userCount, femalesCount, malesCount,
                        ],
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } else {
            console.error('Error: userCount is undefined or not a number.');
        }
    });
</script>

</body>

</html>
