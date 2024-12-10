<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Edit Donor" />
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Edit Donor</title>
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
        <h2 class="form-title">Edit Donor Details</h2>

        <form action="{{ route('donors.update', $donor->id) }}" method="POST" autocomplete="on">
            @csrf
            @method('PUT')

            <div class="input-row">
                <div class="input-group">
                    <input id="name" name="name" type="text" class="input" value="{{ old('name', $donor->name) }}" required autocomplete="name" />
                    <label for="name" class="placeholder">Donor Name</label>
                </div>

                <div class="input-group">
                    <input id="email" name="email" type="email" class="input" value="{{ old('email', $donor->email) }}" autocomplete="email" />
                    <label for="email" class="placeholder">Email</label>
                </div>

                <div class="input-group">
                    <input id="phone_no" name="phone_no" type="text" class="input" value="{{ old('phone_no', $donor->phone_no) }}" autocomplete="phone_no" />
                    <label for="phone_no" class="placeholder">Phone Number</label>
                </div>
            </div>

            <!-- Center the buttons in a container -->
            <div class="button-container">
                <button type="submit" class="submitbtn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
                <a href="{{ route('admin.show_donors') }}" class="submitbtn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
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
