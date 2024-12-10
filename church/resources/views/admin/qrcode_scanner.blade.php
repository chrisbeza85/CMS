<!-- resources/views/qrcode_scanner.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="QR Code Scanner - Church Inventory">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>QR Code Scanner</title>
    <style>
        #scanner-wrapper {
            width: 300px;
            height: 300px;
            margin: 0 auto; /* Center horizontally */
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        #scanner-container {
            width: 100%;
            height: 100%;
        }

        #instructions {
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3 text-center">Scan QR Code</h2>
    <div id="scanner-wrapper">
        <div id="scanner-container"></div>
    </div>
    <p id="instructions" class="mt-3">Point your camera at a QR code to scan</p>
    <p id="scan-result" class="text-center mt-4"></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const scannerContainer = document.getElementById('scanner-container');
        const scanResult = document.getElementById('scan-result');
        const scanner = new Html5Qrcode("scanner-container");

        function handleScanSuccess(decodedText, decodedResult) {
            // Display scanned result
            scanResult.innerHTML = `<strong>Scanned Result:</strong> ${decodedText}`;
            
            // Redirect to the search route with the scanned QR code
            window.location.href = `/owned-items/search?barcode=${encodeURIComponent(decodedText)}`;
        }

        function handleScanFailure(error) {
            // Log errors if necessary
            console.warn(`QR Code scanning failed: ${error}`);
        }

        // Start QR Code scanning
        scanner.start(
            { facingMode: "environment" }, // Use rear camera
            { fps: 10, qrbox: { width: 150, height: 150 } }, // Box size 150x150px
            handleScanSuccess,
            handleScanFailure
        ).catch(err => {
            console.error(`Unable to start QR Code scanner: ${err}`);
        });
    });
</script>
@endsection
</body>

</html>
