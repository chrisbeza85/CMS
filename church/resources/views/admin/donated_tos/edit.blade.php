<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Edit DonatedTo">
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Edit Receiver</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

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
        <h2 class="form-title">Edit Receiver Details</h2>

        <form action="{{ route('donated_tos.update', $donatedTo->id) }}" method="POST" autocomplete="on">
            @csrf
            @method('PUT')

            <div class="input-row">
                <div class="input-group">
                    <input id="name" name="name" type="text" class="input" value="{{ old('name', $donatedTo->name) }}" required />
                    <label for="name" class="placeholder">Receiver Name</label>
                </div>

                <div class="input-group">
                    <input id="address" name="address" type="text" class="input" value="{{ old('address', $donatedTo->address) }}" required />
                    <label for="address" class="placeholder">Address</label>
                </div>

                <div class="input-group">
                    <input id="email" name="email" type="text" class="input" value="{{ old('email', $donatedTo->email) }}" required />
                    <label for="email" class="placeholder">Email</label>
                </div>

                <div class="input-group">
                    <input id="phone" name="phone" type="text" class="input" value="{{ old('phone', $donatedTo->phone) }}" />
                    <label for="phone" class="placeholder">Phone</label>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="submitbtn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
                <a href="{{ route('admin.show_recipients') }}" class="submitbtn btn-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Cancel</a>
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
