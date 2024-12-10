{{-- resources/views/inventory/print.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory List</title>
    <style>
        /* Print-specific styles */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div>
        <h2>Inventory List</h2>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Serial Number</th>
                    <th>Barcode</th>
                    <th>Item Value</th>
                    <th>Item Condition</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Date Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->actual_serial_no }}</td>
                        <td>{{ $item->barcode }}</td>
                        <td>{{ $item->item_value }}</td>
                        <td>{{ $item->item_condition }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            window.print(); // Automatically triggers the print dialog when the page is loaded
        };
    </script>
</body>
</html>
