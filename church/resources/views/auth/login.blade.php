<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager" />
    <meta name="keywords" content="Church, Manager, Member registration, Donation, Tithe Manager" />
    <link rel="stylesheet" href="<?php echo asset('css/login.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/fontawesome-free-6.5.2-web/css/all.min.css') ?>" type="text/css">
    <!----Name of page---->

    <title>Login Page</title>
    <title>Login</title>
</head>

<body>

<x-validation-errors class="mb-4" />

    @session('status')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
    </div>
    @endsession

    <!--Login form-->
    <div class="input-group">
        <form method="POST" autocomplete="on" action="{{ route('login') }}">
            @csrf

            <div class="logo">
                <a class="navbar-brand brand-logo-mini" href="/"><img src="/images/sda.png" class="sda_logo"></a>

                <h2 class="login_word_on_form">Login</h2>
                <div class="input-group">
                    <input id="email" name="email" :value="old('email')" type="email" required autofocus autocomplete="username" class="input">
                    <label for="email" class="placeholder" value="{{ __('Email') }}" data-icon="e">Email Address</label>
                    <div class="input-group">
                        <input id="password" name="password" required autocomplete="current-password" type="password" class="input_1">
                        <label for="password" data-icon="p" value="{{ __('Password') }}" class="placeholder_1">Password</label>
                        <button type="submit" name="login" class="submitbtn" value="submit">&nbsp;&nbsp;<i class="fa-solid fa-right-to-bracket"></i>&nbsp;{{ __('Log in') }}&nbsp;</button>
                        <div class="keep_login">
                                <p class="keeplogin">
                                    <input type="checkbox" class="checkbox-input" name="remember_me" id="remember" value="loginkeeping" />
                                    <label for="remember_me" class="checkbox-label">{{ __('Remember me') }}</label>
                                </p>

                            </div>

                        <div class="rmember">
                                <p class="member">Not a member yet?</p>
                            </div>

                            <div class="signbtn">
                                <a href="{{ route('register') }}" class="to_register">
                                    <button type="button" class="signupbtn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-user-plus"></i>&nbsp;Signup</button>
                                </a>
                            </div>
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                            <a class="forgotpass" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif




                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#signin').tooltip('show');
                                    $('#signin').tooltip('hide');
                                });
                            </script>
        </form>
    </div>
    <script src="/images/script.js"></script>
</body>

</html>
