<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="nav-row container-fluid">
    <div class="d-flex align-items-center">
      <button class="navbar-toggler  collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
      </button>
      <div class="navbar-brand p-0">
          <a href="/" class="nav-logo">
            <img src="{{ asset('images/logos/logo.png')}}" alt="" class="w-100 h-100">
          </a>
          <a href="/" class="nav-title">A-Mobile</a>
      </div>
    </div>
    <div class="nav-right-mobile">
        <a class="nav-item" href="#contact"><i class="fas fa-search"></i></a>
        <a class="nav-item" href="#about"><i class="fas fa-shopping-cart"></i></a>
        <div class="nav-item dropdown d-flex justify-content-end">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="fas fa-user"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::check())
              <li><a class="dropdown-item" href="/home">My Account</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            @else
              <li><a class="dropdown-item" href="#">Register</a></li>
              <li><a class="dropdown-item" href="{{ route('login')}}">Login</a></li>
            @endif
          </ul>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item px-5">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item px-5">
            <a class="nav-link" href="{{ route('products')}}">Product</a>
          </li>
          <li class="nav-item px-5">
            <a class="nav-link" href="{{ url('/news')}}">News</a>
          </li>
          <li class="nav-item px-5">
            <a class="nav-link" href="{{ url('/contact')}}">Contact</a>
          </li>
          
        </ul>
        <div class="nav-right">
          <a class="nav-item" href="#contact"><i class="fas fa-search"></i></a>
          <a class="nav-item" href="#about"><i class="fas fa-shopping-cart"></i></a>
          <div class="nav-item dropdown d-flex justify-content-end">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if (Auth::check())
              <li><a class="dropdown-item" href="/home">My Account</a></li>
              <li>
              <div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
              </li>
              @else
              <li><a class="dropdown-item" href="{{ route('register')}}">Register</a></li>
              <li><a class="dropdown-item" href="{{ route('login')}}">Login</a></li>
              @endif
            </ul>
          </div>
        </div>
    </div>
  </div>
</nav>

 