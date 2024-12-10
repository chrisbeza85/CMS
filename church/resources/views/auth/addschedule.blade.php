<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/addmember.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Add Schedule</title>
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

        /* Notification styling */
        .notification {
            display: none;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            top: 10px;
            right: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <x-validation-errors class="mb-4" />
    <div id="register" class="form-container">
        <form id="scheduleForm" method="POST" autocomplete="on" action="{{ url('/add_schedule') }}">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Schedule</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="date" type="datetime-local" name="date" min="1900-01-02" required="required"
                        class="input" autocomplete="bday">
                    <label for="date" class="placeholders" data-icon="u">Date</label>
                </div>

                <div class="input-group">
                    <input id="theme" name="theme" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="theme" class="placeholder" data-icon="u">Theme</label>
                </div>

                <div class="input-group">
                    <select id="elder_on_duty_1" name="elder_on_duty_1" required="required" class="input"
                        autocomplete="off">
                        <option value="Add an Elder On Duty Here">Select Elder On Duty - 1</option>
                        <option value="None">None</option>
                        <option value="Matakala">Matakala</option>
                        <option value="Christopher">Christopher</option>
                        <option value="Antoinetty">Antoinetty</option>
                        <option value="Joshua">Joshua</option>
                        <option value="Abel">Abel</option>
                        <option value="Moses">Moses</option>
                    </select>
                </div>

                <div class="input-group">
                    <select id="elder_on_duty_2" name="elder_on_duty_2" required="required" class="input"
                        autocomplete="off">
                        <option value="Add An Elder On Duty Here">Select Elder On Duty - 2</option>
                        <option value="None">None</option>
                        <option value="Matakala">Matakala</option>
                        <option value="Christopher">Christopher</option>
                        <option value="Antoinetty">Antoinetty</option>
                        <option value="Joshua">Joshua</option>
                        <option value="Abel">Abel</option>
                        <option value="Moses">Moses</option>
                    </select>
                </div>
            </div>
            <button type="submit" value="Sign up" name="submit" class="submitbtn"><i
                    class="fa-solid fa-calendar"></i>&nbsp;&nbsp;Add Schedule</button>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />
                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Terms of Service') . '</a>',
                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' . __('Privacy Policy') . '</a>',
                ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
            @endif
        </form>
    </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">Copyright © University SDA
                Church 2024</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Computer Science Dept <a
                    href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Computer Systems
                    Engineering</a> from University Of Zambia</span>
        </div>
    </footer>

    <!-- JavaScript for delay and redirection -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('scheduleForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                var form = this;

                // Create a FormData object to handle form submission
                var formData = new FormData(form);

                // Send the form data using fetch
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if (response.ok) {
                        // Show SweetAlert success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Schedule added successfully!',
                            timer: 3000, // Auto-dismiss after 3 seconds
                            showConfirmButton: false
                        }).then(() => {
                            // Redirect after the alert
                            window.history.back();
                        });
                    } else {
                        // Handle errors
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred. Please try again.',
                        });
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred. Please try again.',
                    });
                });
            });
        });
    </script>
      <script src="/images/script.js"></script>
</body>

</html>
