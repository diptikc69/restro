<!-- Navbar & Hero Start -->
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <!-- Navbar Brand -->
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            </a>
            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>
            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Our Menus</a>
                    </li>
                </ul>
                <!-- Login and Register Buttons -->
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                            <x-app-layout>

                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary me-2" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <!-- Hero Content -->
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Restoran is one of the most well-known and widely used restaurant reservation platforms. It allows users to search for view menus,categories, and make reservations online. We are open 7 days a week for lunch and dinner embodying the essence of Contiental,Indian and Oriental cuisine. </p>
                    <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="images/video.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Navbar & Hero End -->
