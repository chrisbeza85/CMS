<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('home.sidebar')
        <!-- partial -->
        @include('home.header1')
        <!-- partial -->
        @include('home.memberregister')
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('home.script')
        <!-- End custom js for this page -->
</body>

</html>
