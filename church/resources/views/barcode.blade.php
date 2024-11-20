<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode</title>
</head>
<body>
    @if($barcode)
        <img src="data:image/png;base64,{{ $barcode }}" alt="Generated Barcode">
    @else
        <p>Failed to generate barcode.</p>
    @endif
</body>
</html>
