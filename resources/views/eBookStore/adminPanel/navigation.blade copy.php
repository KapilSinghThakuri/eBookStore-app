
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light">
      <div class="offcanvas offcanvas-start" id="demo">
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
      </div>
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
    </nav> -->


  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
      <!-- Toggle button for offcanvas -->
      <button id="offcanvasToggleButton" class="btn btn-primary bg-white" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Brand -->
      <div class="navbar-brand ml-4">
        <h1 class="m-0 display-5 font-weight-semi-bold">
          <span class="text-primary font-weight-bold px-3 mr-1" style="border: 1px solid #EDF1FF; background-color: white;">E</span>Books
        </h1>
      </div>

      <!-- Right-aligned nav items -->
      <ul class="navbar-nav ml-auto">
        @if (Route::has('login'))
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/Home') }}">UserHome</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profileBtn" href="#">{{ $userName }}</a>
            </li>
          @else
          @endauth
        @endif
      </ul>
    </div>
  </nav>

<div class="offcanvas offcanvas-start" id="demo" style="width: 24vw;">
  <div class="offcanvas-header">
    <h2 class="offcanvas-title border-bottom">Admin Panel</h2>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div class="mb-3">
      <a href="{{ url('/AdminDashboard')}}" class="btn btn-outline-primary rounded">Dashboard</a>
    </div>
    <div class="mb-3">
      <a href="{{ url('/AdminDashboard/Category/Create')}}" class="btn btn-outline-info rounded">Add Category</a>
    </div>
    <div class="mb-3">
      <a href="#" data-bs-toggle="modal" data-bs-target="#addBookModal" class="btn btn-outline-info rounded mr-2">Add Book</a>
    </div>
    <div class="mb-3">
      <a href="#" class="btn btn-outline-success rounded">Emails</a>
    </div>
    <p>Market Status</p>
    <p>Events</p>
    <p>News</p>
    <p>Chats</p>
    <p>Users</p>
  </div>
</div>


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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var offcanvas = new bootstrap.Offcanvas(document.getElementById('demo'), { backdrop: false });

    // Toggle offcanvas sidebar when the button is clicked
    document.getElementById('offcanvasToggleButton').addEventListener('click', function () {
      offcanvas.toggle();
    });
  });
</script>
