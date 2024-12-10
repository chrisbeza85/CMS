<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/addmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <title>Registration</title>
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
        <form method="POST" autocomplete="on" action="{{ url('/add_givings') }}">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Giving</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="fname" name="fname" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="fname" class="placeholder" data-icon="u">First Name</label>
                </div>

                <div class="input-group">
                    <input id="mname" name="mname" type="text" autocomplete="additional-name" class="input" />
                    <label for="mname" class="placeholder" data-icon="u">Middle Name</label>
                </div>

                <div class="input-group">
                    <input id="lname" name="lname" type="text" required autofocus autocomplete="lname" class="input" />
                    <label for="fname" class="placeholder" data-icon="u">Last Name</label>
                </div>

                <div class="input-group">
                    <input id="mobile" name="mobile" type="number" required="required" class="input" autocomplete="tel">
                    <label for="mobile" class="placeholder" data-icon="u">Mobile Money Number</label>
                </div>


                <div class="input-group">
                    <select class="gender-select" name="giving" id="gender" required="required" autocomplete="give">
                        <option value="Select Gender">Select Giving</option>
                        <option value="Offering">Offering</option>
                        <option value="Tithe">Tithe</option>
                        <option value="Other">Other</option>
                    </select>
                </div>



                <div class="input-group">
                    <input id="amount" name="amount" type="number"  class="input" />
                    <label for="amount" class="placeholder" data-icon="e">Amount</label>
                </div>
            </div>

            <div class="input-row">
            <div class="input-group">
                <input id="comment" name="comment" type="text"  class="input" />
                <label for="comment" class="placeholder" data-icon="e">Comment</label>
            </div>
        </div>

            <button type="submit" value="Sign up" name="submit" class="submitbtn"><i class="fa-solid fa-dollar-sign"></i>&nbsp;Give</button>

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
