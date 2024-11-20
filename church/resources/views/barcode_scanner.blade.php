<!-- resources/views/barcode_scanner.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-3">Barcode Scanner Interface</h2>
    <p class="mb-4">Waiting to scan...</p>
    <div class="input-group mb-3">
        <input 
            type="text" 
            id="barcode-search" 
            class="form-control" 
            placeholder="Scan barcode or enter manually..." 
            autofocus 
            autocomplete="off"
            aria-label="Search Barcode"
        >
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const barcodeSearch = document.getElementById('barcode-search');
        let timeout = null;

        // Auto-focus the input for scanning
        barcodeSearch.focus();

        // Listen for input to handle scanning
        barcodeSearch.addEventListener('input', () => {
            // Clear any existing timeout to delay action
            clearTimeout(timeout);

            // Set a timeout to wait before triggering the search
            timeout = setTimeout(() => {
                const barcode = barcodeSearch.value.trim();

                if (barcode) {
                    // Redirect to the search route with the scanned or entered barcode
                    window.location.href = `/owned-items/search?barcode=${encodeURIComponent(barcode)}`;

                    // Clear the input and refocus for the next scan
                    barcodeSearch.value = '';
                    barcodeSearch.focus();
                }
            }, 500); // Delay of 500ms allows for manual input before searching
        });

        // Refocus input if it loses focus
        barcodeSearch.addEventListener('blur', () => {
            setTimeout(() => barcodeSearch.focus(), 10);
        });
    });
</script>
@endsection
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>