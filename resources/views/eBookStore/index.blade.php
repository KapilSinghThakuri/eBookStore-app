<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> eBookStore </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Boxicons icons link -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Homepage css links -->
    <link rel="stylesheet" href="{{ url('eBookStore/css/homepage.css') }}">

    <!-- Favicon -->
    <link href="{{ url('eBookStore/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('eBookStore/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('eBookStore/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
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
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ url('/Home') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Books</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="/shoppingCart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5 mt-1">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Religion & Spirituality <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach($religionSpirituality as $religionCategory)
                                <a href="#Religion-Spirituality" class="dropdown-item">{{ $religionCategory ->name }}</a>
                            @endforeach
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Business Essentials<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach($businessEssential as $businessCategory)
                                <a href="#business-investing" class="dropdown-item">{{ $businessCategory -> name}}</a>
                                @endforeach
                            </div>
                        </div>
                        @foreach($remainCategories as $remainCategory)
                        <a href="" class="nav-item nav-link">{{ $remainCategory -> name }}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ url('/Home') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Books</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ url('/Home') }}" class="nav-item nav-link active">Home</a>
                            <!-- <a href="shop.html" class="nav-item nav-link">Shop</a> -->
                            <a href="{{ url('/shopDetail') }}" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ url('/shoppingCart') }}" class="dropdown-item">Shopping Cart</a>
                                    <a href="{{ url('/checkOut') }}" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                        </div>

                        <div class="navbar-nav ml-auto py-0">
                            @if (Route::has('login'))
                            <div class="hidden d-flex">
                                @auth
                                    @if( $roleId == 1)
                                    <a href="{{ url('/AdminDashboard') }}" class="nav-item nav-link">AdminHome</a>
                                    @endif
                                    <a href="#" id="profileBtn" class="nav-item nav-link">{{ $userName }} </a>
                                    <a href="{{ url('/logout') }}" class="nav-item nav-link">Logout</a>
                                @else
                                    <a href="{{ url('/login') }}" class="nav-item nav-link">Login</a>
                                    @if (Route::has('register'))
                                    <a href="{{ url('/register') }}" class="nav-item nav-link">Register</a>
                                    @endif
                                @endauth
                            </div>
                            @endif
                        </div>

                    </div>
                </nav>

                <!-- Profile informations modal -->
                <div id="profileModal">
                    <nav>
                        <h5>{{ $userName }}</h5>
                        <i id="cancelBtn" class='bx bx-x'></i>
                    </nav>
                </div>


                <div id="header-carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ url('eBookStore/img/Home2.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Read, Lead & Succeed.</h3>
                                    <a href="#highly-recomended" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ url('eBookStore/img/Home1.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
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
    </div>
    <!-- Navbar End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Kids & Teens</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">History & Biography</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="{{ url('eBookStore/img/') }}" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Technology</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

<!-- addToCart or buyMore books -->
    <div id="addToCartModalContent">
        <div id="addToCartModal" class="addToCart">
            <div id="modalHeadingContent">
                <p>Books Message</p>
                <i id="closeBtn" class='bx bx-x'></i>
            </div>
            <div id="modalBodyContent">
                <img src=""> <!-- Here, Added book image  -->
                <div id="bookInfo">
                    <p>{{ $userName }} eBookStore</p>
                    <h5></h5> <!-- Here, Added book name  -->
                    <h6></h6> <!-- Here, Added book price  -->
                </div>
            </div>
            <div id="modalFooterContent">
                <a href="/shoppingCart" id="viewCartBtn">View Cart</a>
                <a href="#" id="checkOutBtn">Check out</a>
            </div>
        </div>
    </div>

    <!-- Highly Recomended Books -->
    <div class="container-fluid py-4" id="highly-recomended">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Highly Recomended Books</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel d-flex flex-wrap">
                    @foreach($highlyRecommendedBooks as $book)
                    <div class="card product-item border-0 flex-grow-1" style="max-width: 200px; margin: 0 20px;">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset($book->image) }}">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 flex-grow-1 d-flex flex-column">
                            <h6 class="text-truncate mb-3">{{ $book->title }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>Rs.{{ $book->price}}</h6><h6 class="text-muted ml-2"><del>Rs.99.00</del></h6>
                            </div>
                            <div class="flex-grow-1"></div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="#"
                                data-title="{{ $book->title }}"
                                data-price="{{ $book->price }}"
                                data-image="{{ asset($book->image) }}"
                                data-id="{{ $book->id }}"
                                class="addToCartBtn btn btn-sm text-dark p-0">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Highly Recomended Books end -->

    <!--Top 10 Coming Soon -->
    <div class="lovedBooks">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Top 10 Coming Soon Books</span></h2>
        </div>
        @foreach($top10ComingSoonBooks as $book)
        <div class="books"> 
            <a href="#"> <img src="{{ asset($book -> image) }}" alt="book1" height="230px" width="250px"> </a>
            <div class="description"> {{ $book -> description }} </div>
        </div>
        @endforeach()
    </div>
    <!-- End Top 10 Coming Soon -->

    <!-- Products Start (Mystery & Thriller Books)-->
    <div class="container-fluid pt-5" id="">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Mystery & Thriller Books</span></h2>
        </div>
        <div class="row px-3 pb-3">
            @foreach( $mysteryThrillerBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book -> image) }}">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{ $book-> title }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book->price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                            data-title="{{ $book->title }}"
                            data-price="{{ $book->price }}"
                            data-image="{{ asset($book->image) }}"
                            data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach

    <!-- Products Start (Science Fictions & Fantasy Books)-->
            @foreach( $fictionFantasyBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book -> image) }}">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{ $book-> title }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book->price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                        data-title="{{ $book->title }}"
                        data-price="{{ $book->price }}"
                        data-image="{{ asset($book->image) }}"
                        data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
    <!-- Products End (Science Fictions & Fantasy Books)-->

        </div>
    </div>
    <!-- Products End (Mystery & Thriller Books)-->

    <!-- Offer Start -->
     <!-- <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ url('eBookStore/img/offer-1.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Offer End -->

    <!-- Subscribe for membership Start -->
    <div class="container-fluid bg-secondary my-5" style="background-image: url( eBookStore/img/uniqueCover.jpeg );">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="px-5 mb-3">
                        <span class="px-2" style="color: white; font-size: 2.4 rem; font-weight: 600; letter-spacing: 4px;">Get Membership</span>
                    </h2>
                    <p style="color: whitesmoke;">"Unlock a world of knowledge and adventure – subscribe now to elevate
                     your reading experience with our exclusive collection at the online book store!"
                    </p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe for membership End -->


    <!-- Products Start ( Religion & Spirituality Books)-->
    <div class="container-fluid pt-5" id="Religion-Spirituality">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Religion & Spirituality Books</span></h2>
        </div>
        <div class="row px-3 pb-3">
            @foreach( $buddhismBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book -> image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$book->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                            data-title="{{ $book->title }}"
                            data-price="{{ $book->price }}"
                            data-image="{{ asset($book->image) }}"
                            data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($hinduismBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$book->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                        data-title="{{ $book->title }}"
                        data-price="{{ $book->price }}"
                        data-image="{{ asset($book->image) }}"
                        data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($islamBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$book->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                        data-title="{{ $book->title }}"
                        data-price="{{ $book->price }}"
                        data-image="{{ asset($book->image) }}"
                        data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($christianityBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$book->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                            data-title="{{ $book->title }}"
                            data-price="{{ $book->price }}"
                            data-image="{{ asset($book->image) }}"
                            data-id="{{ $book->id }}"
                            class="addToCartBtn btn btn-sm text-dark p-0">
                            <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- Products End ( Religion & Spirituality Books)-->

<!-- Products Start ( History & Biography Books)-->
    <div class="container-fluid pt-5" id="History-Biography">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">History & Biography Books</span></h2>
        </div>
        <div class="row px-3 pb-3">
            @foreach($historyBiographyBooks as $book)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($book->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$book->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $book -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                        data-title="{{ $book->title }}"
                        data-price="{{ $book->price }}"
                        data-image="{{ asset($book->image) }}"
                        data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- Products End ( History & Biography Books)-->

<!-- Products Start ( Kid's & Teens Books)-->
    <div class="container-fluid pt-5" id="Kids-Teens">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Kid's & Teens Books</span></h2>
        </div>
        <div class="row px-3 pb-3">
            @foreach($childrenBooks as $childreanBook)
            <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4" style="max-width: 200px;">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset($childreanBook->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-1">
                        <h6 class="text-truncate mb-2">{{$childreanBook->title}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rs.{{ $childreanBook -> price }}</h6><h6 class="text-muted ml-2"><del>Rs.123.00</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href=""
                        data-title="{{ $childreanBook->title }}"
                        data-price="{{ $childreanBook->price }}"
                        data-image="{{ asset($childreanBook->image) }}"
                        data-id="{{ $book->id }}"
                        class="addToCartBtn btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<!-- Products End ( Kid's & Teens Books)-->

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-2.jpg " alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-3.jpg " alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-5.jpg " alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="/eBookStore/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="/Home" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Books</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Gaindakot, Nawalparasi, Nepal</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@eBookStore.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+977 9864575047</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Informations</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/aboutUs"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-dark mb-2" href="/refundPolicy"><i class="fa fa-angle-right mr-2"></i>Return and Refund Policy</a>
                            <a class="text-dark mb-2" href="/termCondition"><i class="fa fa-angle-right mr-2"></i>Terms and Condition</a>
                            <a class="text-dark mb-2" href="/privacyPolicy"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="/Home"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="/shopDetail"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="/shoppingCart"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="/checkOut"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="/contact"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">Copyright
                    &copy; 2024. <a class="text-dark font-weight-semi-bold" href="#">eBookStore.com</a> All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="eBookStore/lib/easing/easing.min.js"></script>
    <script src="eBookStore/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="eBookStore/mail/jqBootstrapValidation.min.js"></script>
    <script src="eBookStore/mail/contact.js"></script>

    <!-- Main Javascript -->
    <script src="eBookStore/js/main.js"></script>


</body>
</html>