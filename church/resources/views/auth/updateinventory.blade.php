<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/addmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>Update Equipment</title>
    <style>
        /* Autofill input styling */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px white inset !important;
            /* Changes background color */
            box-shadow: 0 0 0 30px white inset !important;
            -webkit-text-fill-color: #04AA6D !important;
            /* Changes text color */
        }
    </style>
</head>

<body>
    <x-validation-errors class="mb-4" />
    <div id="register" class="form-container">
        <form method="POST" autocomplete="on" action="{{ url('/update_equipment', $inventory->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Update Equipment</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="title" name="title" value="{{$inventory->title}}" type="text" required autofocus autocomplete="title" class="input" />
                    <label for="title" class="placeholder" data-icon="u">Equipment Title</label>
                </div>


                <div class="input-group">
                    <input id="description" name="description" value="{{$inventory->description}}" type="text" autocomplete="description" class="input" />
                    <label for="description" class="placeholder" data-icon="u">Equipment Description</label>
                </div>

                <div class="input-group">
                    <input id="price" name="price" value="{{$inventory->price}}" type="text" required="required" class="input" autocomplete="price">
                    <label for="price" class="placeholder" data-icon="u">Equipment Price</label>
                </div>

                <div class="input-group">
                    <input id="quantity" name="quantity" value="{{$inventory->quantity}}" type="number" required autocomplete="quantity" class="input" />
                    <label for="quantity" class="placeholder" data-icon="e">Equipment Quantity</label>
                </div>

                <div class="input-group">
                    <input id="category" name="category" value="{{$inventory->category}}" type="text" required autocomplete="category" class="input" />
                    <label for="category" class="placeholder" data-icon="e">Equipment Category</label>
                </div>

                <div class="input-group">
                    <input id="serial_number" name="serial_number" value="{{$inventory->serial_number}}" type="number" required autocomplete="serial_number" class="input" />
                    <label for="serial_number" class="placeholder" data-icon="e"> Equipment Serial Number</label>
                </div>

                <div class="input-group">
                    <input id="qr_code" name="qr_code" value="{{$inventory->qr_code}}" type="number" required autocomplete="qrcode" class="input" />
                    <label for="qr_code" class="placeholder" data-icon="e">Equipment QR Code</label>
                </div>


                <div class="input-group">
                    <input id="purchase_date" value="{{$inventory->purchase_date}}" type="datetime-local" step="1" name="purchase_date" min="1900-01-02" required="required" class="input" autocomplete="pdate">
                    <label for="purchase_date" class="placeholders" data-icon="u">Equipment Purchase Date</label>
                </div>

                <div class="input-group">
                    <input id="condition" name="condition" value="{{$inventory->condition}}" type="text" required autocomplete="condition" class="input" />
                    <label for="condition" class="placeholder" data-icon="e">Equipment Condition</label>
                </div>
            </div>

            <div class="input-row">
            <div class="input-group">
                <label for="image" class="placeholders" data-icon="u">Current Equipment Image Here</label>
                <div class="image-input">
                    <img height="auto" width="100px" src="/inventory/{{ $inventory->image }}" alt="Equipment Image">
                </div>
            </div>


            <div class="input-group">
                <input id="image" name="image" type="file" class="input" />
                <label for="image" class="placeholders" data-icon="u">Change Equipment Image Here</label>
            </div>
            </div>


            <button type="submit" value="Sign up" name="submit" class="submitbtn"><i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Update Equipment</button>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ms-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif
    </div>
    </form>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems Engineering</a> from University Of Zambia</span>
        </div>
    </footer>
    </div>
    </div>

    <script src="/images/script.js"></script>
</body>

</html>
