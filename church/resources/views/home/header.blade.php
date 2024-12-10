<header class="header_section">
    <div class="container3">
        <nav class="navbar navbar-expand-md custom_nav-container">
            <a href="/" class="navbar-brand">
                <img src="images/sda3.png" class="sda_logo8" alt="Dashboard Logo">
            </a>
            <!-- Centered text for xs breakpoint -->
            <span class="xs d-block text-center mx-auto">UNIVERSITY SDA.CHURCH</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Attend Online <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Media <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Who We Are &nbsp;<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">GIVE &nbsp;<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">LOCATIONS&nbsp;<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">WORSHIP &nbsp;<span class="sr-only">(current)</span></a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item active">

                                <a class="nav-link" href="/redirect">Go To Dashboard <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <x-app-layout>
                                    <x-notify::notify />
                                </x-app-layout>
                            </li>
                        @else
                            <li class="nav-item">
                                <i class="fas fa-user-circle fa-2x"><a class="btn btn-primary" id="logincss"
                                        href="{{ url('/redirect') }}">Log In</a></i>
                                <i class="fas fa-user-plus fa-2x"><a class="btn btn-success"
                                        href="{{ route('register') }}">Register</a></i>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>