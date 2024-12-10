<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css1')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        @include('admin.update_member')
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script1')
        <!-- End custom js for this page -->
</body>

</html>