        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="Church Manager" />
            <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
            <link rel="stylesheet" href="<?php echo asset('css/addmember.css') ?>" type="text/css">
            <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
            <title>Employee</title>
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
                <form method="POST" autocomplete="on" action="{{ url('/create_employee') }}">
                    @csrf

                    <div class="logo">
                        <img src="/images/sda.png" class="sda_logo">
                    </div>
                    <h2 class="form-title">Employee</h2>

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
                            <label for="mobile" class="placeholder" data-icon="u">Mobile Number</label>
                        </div>

                        <div class="input-group">
                            <input id="pay" name="pay" type="number" required="required" class="input" autocomplete="tel">
                            <label for="pay" class="placeholder" data-icon="u">Pay</label>
                        </div>

                        <div class="input-group">
                            <select id="ministry" name="ministry" required="required" class="input" autocomplete="off">
                                <option value="Add a Ministry Here">Select Ministry</option>
                                <option value="None">None</option>
                                <option value="Choir">Choir</option>
                                <option value="Ushering">Usher</option>
                                <option value="Elder">Elder</option>
                                <option value="Technical">Technical</option>
                                <option value="Pastor">Pastor</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <select id="status" name="status" required="required" class="input" autocomplete="off">
                                <option value="Status">Status</option>
                                <option value="Active">Active</option>
                                <option value="Unactive">Unactive</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <input id="address" name="address" type="text" required autocomplete="address" class="input" />
                            <label for="address" class="placeholder" data-icon="e">Home Address</label>
                        </div>


                        <div class="input-group">
                            <input id="occupation" name="occupation" type="text" required autocomplete="occupation" class="input" />
                            <label for="occupation" class="placeholder" data-icon="e">Occupation</label>
                        </div>



                        <div class="input-group">
                            <select class="gender-select" name="gender" id="gender" required="required" autocomplete="sex">
                                <option value="Select Gender">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>


                        <div class="input-group">
                            <input id="birthday" type="date" name="birthday" min="1900-01-02" required="required" class="input" autocomplete="bday">
                            <label for="birthday" class="placeholders" data-icon="u">Date Of Birth</label>
                        </div>



                        <div class="input-group">
                            <input id="email" name="email" type="email" required autocomplete="email" class="input" />
                            <label for="email" class="placeholder" data-icon="e">Email Address</label>
                        </div>

                        <div class="input-group">
                            <select id="marital" name="marital" required="required" class="input" autocomplete="off">
                                <option value="Marital Status">Marital Status</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <input id="registrationdate" type="datetime-local" name="registrationdate" min="1900-01-02" required="required" class="input" autocomplete="bday">
                            <label for="registrationdate" class="placeholders" data-icon="u">Date Of Registration</label>
                        </div>
                    </div>

                    <button type="submit" value="Sign up" name="submit" class="submitbtn"><i class="fa-solid fa-user-plus"></i>&nbsp;Add Employee</button>

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