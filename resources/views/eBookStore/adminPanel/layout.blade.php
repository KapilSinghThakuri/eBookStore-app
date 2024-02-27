<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> eBookStore </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <div class="navbar-brand mx-auto"> <h1 style="margin-left: 250px;"> Admin Dashboard </h1> </div>
        <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ url('/logout') }}">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ url('/Home') }}">Home</a>
              </li>
                @else
            @endauth
        @endif
        </ul>
      </div>
    </nav>