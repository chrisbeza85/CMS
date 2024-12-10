<!-- resources/views/owned_items/not_found.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Item Not Found - Church Inventory">
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Item Not Found</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            text-align: center;
        }

        .btn-container {
            margin-top: 20px;
        }

        .submitbtn {
            text-decoration: none;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-danger">Item Not Found</h2>
        <p>The scanned item was not found in the inventory. Please try again or check the barcode.</p>
        
        <div class="btn-container">
            <a href="{{ route('admin.show_barcode') }}" class="submitbtn btn-primary">
                <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back to Barcode Scan
            </a>
            <a href="{{ route('admin.show_qrcode') }}" class="submitbtn btn-primary">
                <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back to QR Scan
            </a>
        </div>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">
                &copy; University SDA Church 2024
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Computer Science Dept - <a href="https://www.unza.zm" target="_blank">University Of Zambia</a>
            </span>
        </div>
    </footer>

    <script src="/images/script.js"></script>
</body>

</html>
