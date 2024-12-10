<!-- resources/views/donors/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Donor Details - Church Inventory">
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Donor Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgba(173, 216, 230, 0.3), rgba(255, 99, 71, 0.3), rgba(255, 255, 255, 0.5));
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        .details-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .header-section .logo img {
            max-width: 60px;
        }

        .header-section .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .details-row {
            margin-top: 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .details-item {
            background: #fafafa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
        }

        .details-item dt {
            font-weight: bold;
            color: #555;
        }

        .details-item dd {
            margin: 0;
            color: #777;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .details-btn {
            display: inline-block;
            margin: 5px;
            padding: 12px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .details-btn:hover {
            background-color: #0056b3;
        }

        .details-btn.btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .details-btn.btn-warning:hover {
            background-color: #e0a800;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            color: #aaa;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="details-container">
        <div class="header-section">
            <div class="logo">
                <img src="/images/sda.png" alt="Logo">
            </div>
            <div class="form-title">Donor Details</div>
        </div>

        <div class="details-row">
            <div class="details-item">
                <dt>Name</dt>
                <dd>{{ $donor->name }}</dd>
            </div>
            <div class="details-item">
                <dt>Email</dt>
                <dd>{{ $donor->email }}</dd>
            </div>
            <div class="details-item">
                <dt>Phone</dt>
                <dd>{{ $donor->phone_no }}</dd>
            </div>
        </div>

        <div class="button-container">
            <a href="{{ route('donors.edit', $donor->id) }}" class="details-btn btn-warning">
                <i class="fa fa-edit"></i>&nbsp; Edit
            </a>
            <a href="{{ route('admin.show_donors') }}" class="details-btn btn-primary">
                <i class="fa fa-arrow-left"></i>&nbsp; Back to List
            </a>
        </div>
    </div>

    <footer>
        <span>&copy; University SDA Church 2024</span><br>
        <span>Computer Science Dept - <a href="https://www.unza.zm" target="_blank">University Of Zambia</a></span>
    </footer>
</body>

</html>
