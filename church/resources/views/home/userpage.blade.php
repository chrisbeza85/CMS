<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/sda3.png" type="">
   <title>SDA Home Page</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />
   <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
   @notifyCss
</head>

<body>

   <div class="hero_area">
      <!-- header section strats -->
      @include('home.header')
      <!-- end header section -->
      <!-- slider section -->
      @include('home.slider')
      <!-- end slider section -->
   </div>
   <!-- containers section -->
   @include('home.containers')
   <!-- end containers section -->
   <!-- prayersection -->
   @include('home.prayer')
   <!-- end prayer section -->
   @include('home.welcome')
   <!-- songs section -->
   @include('home.songs')
   <!-- end songs section -->
   <!-- footer start -->
   @include('home.footer')
   <!-- footer end -->

   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>

   <x-notify::notify />
   @notifyJs
</body>

</html>