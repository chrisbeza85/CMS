<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
        
<div class="container mt-4" style="max-width: 750px">
    
    <h1>Email</h1>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success  alert-dismissible">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    @if ($message = Session::get('error'))
        <div class="alert alert-danger  alert-dismissible">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    <form method="post" action="{{ route('send.php.mailer.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Recipient Email:</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Email Subject:</label>
            <input type="text" name="subject" class="form-control" />
        </div>
        <div class="form-group">
            <label>Email Body:</label>
            <textarea class="form-control" name="body"></textarea>
        </div>
        <div class="form-group mt-3 mb-3">
            <button type="submit" class="btn btn-success btn-block">Send Email</button>
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
</body>
</html>