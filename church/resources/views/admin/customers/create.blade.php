<!-- resources/views/customers/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Add Customer" />
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Add Customer</title>
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
            <h2 class="form-title">Add Customer</h2>

            <form action="{{ route('customers.store') }}" method="POST" autocomplete="on">
                @csrf

                <div class="input-row">
                    <div class="input-group">
                        <input id="name" name="name" type="text" class="input" required autofocus autocomplete="name" />
                        <label for="name" class="placeholder">Customer Name</label>
                    </div>

                    <div class="input-group">
                        <input id="contact_info" name="contact_info" type="text" class="input" required autocomplete="contact_info" />
                        <label for="contact_info" class="placeholder">Contact Info</label>
                    </div>

                    <div class="input-group">
                        <input id="phone_no" name="phone_no" type="text" class="input" required autocomplete="phone_no" />
                        <label for="phone_no" class="placeholder">Phone Number</label>
                    </div>

                    <div class="input-group">
                        <input id="address" name="address" type="text" class="input" required autocomplete="address" />
                        <label for="address" class="placeholder">Address</label>
                    </div>

                    <div class="input-group">
                        <input id="email" name="email" type="email" class="input" required autocomplete="email" />
                        <label for="email" class="placeholder">Email</label>
                    </div>
                </div>

                <!-- Center the buttons in a container -->
                <div class="button-container">
                    <button type="submit" class="submitbtn btn-primary"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add Customer</button>
                    <a href="{{ route('admin.show_customers') }}" class="submitbtn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
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
