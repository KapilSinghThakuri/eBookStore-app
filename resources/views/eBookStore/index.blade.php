<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> eBookStore </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- x-csrf tokens -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <!-- Boxicons icons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Homepage css links -->
    <link rel="stylesheet" href="{{ url('eBookStore/css/homepage.css') }}">

    <!-- Favicon -->
    <link href="{{ url('eBookStore/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('eBookStore/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('eBookStore/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid mb-5 mt-1">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="{{ url('/FAQ') }}">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{ url('/help') }}">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="{{ url('/support') }}">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                @include('eBookStore.partials.categories')
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ route('homepage') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Books</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('homepage') }}" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('shopdetail') }}" class="nav-item nav-link" id="shopDetailLink">Shop
                                Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('shoppingcart') }}" class="dropdown-item"
                                        id="shoppingCartLink">Shopping Cart</a>
                                    <a href="{{ route('checkout') }}" class="dropdown-item"
                                        id="checkoutLink">Checkout</a>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                        </div>

                        <div class="navbar-nav ml-auto py-0">
                            @if (Route::has('login'))
                                <div class="hidden d-flex">
                                    @auth
                                        @if ($roleId == 1)
                                            <a href="{{ route('admindashboard') }}" class="nav-item nav-link">Dashboard</a>
                                        @endif
                                        <a href="#" id="profileBtn" class="nav-item nav-link">{{ $userName }}
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="nav-item nav-link {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>

                <div id="header-carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ url('eBookStore/img/Home2.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Read, Lead & Succeed.
                                    </h3>
                                    <a href="#highly-recomended" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ url('eBookStore/img/Home2.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price </h3>
                                    <a href="#highly-recomended" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div id="viewDetail">
            <div id="viewDetailHeading">
                <h2>Book Details</h2>
                <i id="closeDetailModal" class='bx bx-x'></i>
            </div>
            <div id="viewDetailContent">
                <img src="" id="book_image" alt="">
                <div id="bookDetails">
                    <h5>Book Title</h5>
                    <p>Book price</p>
                    <div class="mb-1">
                        <div class="rating text-primary mr-2">
                        </div>
                        <small class="pt-1">(50 Reviews)</small>
                    </div>
                    <h6>Book Descriptions</h6>
                </div>
            </div>
        </div>

        <div id="addToCartModalContent">
            <div id="addToCartModal" class="addToCart">
                <div id="modalHeadingContent">
                    <p id="bookAddedMessage"></p> <i id="closeBtn" class='bx bx-x'></i>
                </div>
                <div id="modalBodyContent">
                    <img src="" alt="">
                    <div id="bookInfo">
                        <p>{{ $userName }} eBookStore</p>
                        <h5></h5>
                        <h6></h6>
                    </div>
                </div>
                <div id="modalFooterContent">
                    <a href="/shoppingCart" id="viewCartBtn">View Cart(<span id="cartBookCount">0</span>)</a>
                    <a href="/checkOut" id="checkOutBtn" class="bg-primary text-white">Check out</a>
                    <a href="#" id="continueShoppingBtn" class="mt-1 text-center">Continue shopping</a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required !!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Please sign in first to access all the features.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary rounded"
                            data-dismiss="modal">Close</button>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded">Sign In</a>
                    </div>
                </div>
            </div>
        </div>

        @include('eBookStore.partials.recommended')

        @include('eBookStore.partials.comingsoon')

        <div class="container-fluid bg-secondary my-5"
            style="background-image: url('{{ asset('eBookStore/img/uniqueCover.jpeg') }}');">
            <div class="row justify-content-md-center py-5 px-xl-5">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class="px-5 mb-3">
                            <span class="px-2"
                                style="color: white; font-size: 2.4 rem; font-weight: 600; letter-spacing: 4px;">Get
                                Membership</span>
                        </h2>
                        <p style="color: whitesmoke;">"Unlock a world of knowledge and adventure – subscribe now to
                            elevate
                            your reading experience with our exclusive collection at the online book store!"
                        </p>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4"
                                placeholder="Email Goes Here">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('eBookStore.partials.religion')
        @include('eBookStore.partials.history-biography')
        @include('eBookStore.partials.kid-teen')

        @include('eBookStore.partials.vendor')

        @include('eBookStore.partials.footer')
    </div>

</body>

</html>
