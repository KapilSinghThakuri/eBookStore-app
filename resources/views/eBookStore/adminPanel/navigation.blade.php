
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <div class="navbar-brand mx-auto"> <h1 style="margin-left: 250px;"> Admin Dashboard </h1> </div>
        <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ url('/Home') }}">UserHome</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profileBtn" style="color: white;" href="#">{{ $userName }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="color: white;" href="{{ url('/logout') }}">Logout</a>
              </li>

              @else
            @endauth
        @endif
        </ul>
      </div>
    </nav>

  <!-- Profile informations modal -->
      <div id="profileModal" style="margin-top: 10px;">
          <nav>
              <h5>{{ $userName }}</h5>
              <i id="cancelBtn" class='bx bx-x'></i>
          </nav>
      </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- backendJS Home Javascript -->
    <script src="{{ asset('/eBookStore/backendJS/home.js')}}"></script>
