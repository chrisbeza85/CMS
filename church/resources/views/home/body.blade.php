<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/viewmember.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css'); ?>" type="text/css">
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
                                            <i class="fa-solid fa-calendar fa-3x"></i><br />
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
                                <h6 class="text-muted2 font-weight-normal">Upcoming Events</h6>
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
                                            <a class="nav-link" href="{{ url('member_registration') }}">
                                                <span class="mdi mdi-arrow-right icon-item"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer1">
                                <h6 class="text-muted2 font-weight-normal">Member Registration</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="span2"><br />
                                            <i class="fas fa-praying-hands" style='font-size:48px;color:#e4af00;)'></i><br />
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
                                <h6 class="text-muted2 font-weight-normal">Prayer Requests</h6>
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
                                <h6 class="text-muted2 font-weight-normal">Givings Chart</h6>
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




                    <div class="col-md-6 grid-margin stretch-card d-flex justify-content-center align-items-center">
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

    <!-- If you’re including multiple Biblia widgets, you only need this script tag once -->
    <script src="//biblia.com/api/logos.biblia.js"></script>
    <script>
        logos.biblia.init();
    </script>

<script>
    const ctx = document.getElementById('myChart');
       // Check if userCount is defined and a number
            new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
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
  </script>
</body>

</html>
