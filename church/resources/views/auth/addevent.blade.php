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
</head>

<body>
    <x-validation-errors class="mb-4" />

    <!-- Countdown Timer -->
    <div id="countdown" class="countdown">
                            Time Remaining: <span id="timer">00:00:00</span>
                        </div>
    
    <div id="register" class="form-container">
        <form id="scheduleForm" method="POST" autocomplete="on" action="{{ url('/add_event') }}">
            @csrf

            <div class="logo">
                <img src="/images/sda.png" class="sda_logo">
            </div>
            <h2 class="form-title">Event</h2>

            <div class="input-row">
                <div class="input-group">
                    <input id="name" name="name" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="name" class="placeholder" data-icon="u">Name</label>
                </div>

                <div class="input-group">
                    <input id="details" name="details" type="text" required autofocus autocomplete="name" class="input" />
                    <label for="details" class="placeholder" data-icon="u">Details</label>
                </div>

                <div class="input-group">
                    <input id="countdown_hours" name="countdown_hours" type="number" min="0" class="input"
                         required />
                    <label for="countdown_hours" class="placeholder">Hours</label>
                </div>
                <div class="input-group">
                    <input id="countdown_minutes" name="countdown_minutes" type="number" min="0" class="input"
                        required />
                    <label for="countdown_minutes" class="placeholder">Minutes</label>
                </div>
                <div class="input-group">
                    <input id="countdown_seconds" name="countdown_seconds" type="number" min="0" class="input"
                         required />
                    <label for="countdown_seconds" class="placeholder">Seconds</label>
                </div>


                <div class="input-group">
                    <select id="added_by" name="added_by" required="required" class="input" autocomplete="off">
                        <option value="Event Added By">Select Who Added The Event</option>
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

            <button type="submit" value="Start Countdown" name="submit" class="submitbtn"><i
                    class="fa-solid fa-calendar"></i>&nbsp;&nbsp;Add Event</button>

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
                            text: 'Event added successfully!',
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

            // Countdown Timer Script
            function updateCountdown(endTime) {
                const timerElement = document.getElementById('timer');
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0) {
                    timerElement.innerHTML = "EXPIRED";
                    clearInterval(countdownInterval);
                    return;
                }

                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timerElement.innerHTML = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }

            // Function to start the countdown based on form inputs
            function startCountdown() {
                const hours = parseInt(document.getElementById('countdown_hours').value) || 0;
                const minutes = parseInt(document.getElementById('countdown_minutes').value) || 0;
                const seconds = parseInt(document.getElementById('countdown_seconds').value) || 0;

                // Calculate total duration in milliseconds
                const totalMilliseconds = (hours * 60 * 60 * 1000) +
                    (minutes * 60 * 1000) +
                    (seconds * 1000);

                // Set the countdown end time
                const countDownDate = new Date().getTime() + totalMilliseconds;

                // Update the countdown every second
                return setInterval(function () {
                    updateCountdown(countDownDate);
                }, 1000);
            }

            // Initialize the countdown timer
            let countdownInterval;

            // Event listener for starting the countdown
            document.getElementById('scheduleForm').addEventListener('submit', function () {
                if (countdownInterval) {
                    clearInterval(countdownInterval); // Clear any existing countdown
                }
                countdownInterval = startCountdown();
            });
        });
    </script>
    <script src="/images/script.js"></script>
</body>

</html>