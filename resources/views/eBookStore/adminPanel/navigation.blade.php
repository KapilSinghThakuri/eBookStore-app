
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <!-- <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
          <h1 class="offcanvas-title">Dashboard</h1>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <p>Calender </p>
          <p>Books</p>
          <p>Categories</p>
          <button class="btn btn-secondary" type="button">Button</button>
        </div>
      </div> -->
      <div class="container-fluid">
        <button class="btn btn-primary bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand ml-4">
          <h1 class="m-0 display-5 font-weight-semi-bold">
            <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Books
          </h1>
        </div>
        <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a class="nav-link"  href="{{ url('/Home') }}">UserHome</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profileBtn"  href="#">{{ $userName }}</a>
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
          <div id="profilePicture">
              <div id="profile-img"></div>
          </div>
          <div id="profile-info">
              <h5>{{ $userName }}</h5>
          </div>
          <div id="logout-btn">
              @auth
                  <a href="{{ url('/logout') }}">Logout</a>
              @endauth
          </div>
      </div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Include Bootstrap Bundle JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- backendJS Home Javascript -->
<script src="{{ asset('/eBookStore/backendJS/home.js')}}"></script>
