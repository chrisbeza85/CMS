<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Barcode</title>
    <style>
       body {
            font-family: Aerial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
       } 

       .barcode-container {
            margin-top: 50px;
       }

       .barcode-container img {
            max-width: 300px;
            margin-bottom: 20px;
       }

       .barcode-details {
            font-size: 18px;
       }
    </style>
</head>
<body>
    <div class="barcode-container">
        <h1>Barcode for {{ $ownedItem->item_name }}</h1>
        <img src="{{ route('owned_items.barcode', $ownedItem->id) }}" alt="Barcode Image" />
        <div class="barcode-details">
            <p>Item Name: {{ $ownedItem->item_name }}</p>
            <p>Barcode Number: {{ $ownedItem->barcode }}</p>
        </div>
    </div>

    <script>
        // auto trigger print dialog when page loads
        window.onload = function() {
            window.print();
        }  
    </script>
</body>
</html>