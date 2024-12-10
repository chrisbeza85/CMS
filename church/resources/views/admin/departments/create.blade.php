<!-- resources/views/departments/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Add Department" />
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Add Department</title>
    <style>
        /* Center form container */
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        /* Center the button container */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Button styles */
        .submitbtn {
            text-decoration: none;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="logo">
            <img src="/images/sda.png" class="sda_logo">
        </div>
        <h2 class="form-title">Add Department</h2>

        <form action="{{ route('departments.store') }}" method="POST" autocomplete="on">
            @csrf

            <div class="input-row">
                <div class="input-group">
                    <input id="dept_name" name="dept_name" type="text" class="input" required autofocus autocomplete="dept_name" />
                    <label for="dept_name" class="placeholder">Department Name</label>
                </div>

                <div class="input-group">
                    <input id="dept_code" name="dept_code" type="text" class="input" required autocomplete="dept_code" />
                    <label for="dept_code" class="placeholder">Department Code</label>
                </div>
            </div>

            <!-- Center the buttons in a container -->
            <div class="button-container">
                <button type="submit" class="submitbtn btn-success"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                <a href="{{ route('admin.show_departments') }}" class="submitbtn btn-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
            </div>
        </form>
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
