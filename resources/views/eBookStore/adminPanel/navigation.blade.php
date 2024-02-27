<!-- navigation.blade.php -->
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
</body>