<nav class="navbar navbar-expand-lg navbar-light bg-white d-flex justify-content-between" id="navbar">
  <div class="nav-row d-lg-flex w-100">
     <div class="d-flex justify-content-between">
       <div class="d-flex mobile-flex">
       <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="toggler-icon top-bar"></span>
          <span class="toggler-icon middle-bar"></span>
          <span class="toggler-icon bottom-bar"></span>
       </button>
        <div id="logo" class="mx-4">
            <img src="{{ asset('images/logos/admin.png')}}" alt="" class="logo">
        </div>
        <h3 class="mt-2 logo-title font-weight-bolder ">A-Mobile</h3>
       </div>
       <div id="navbar-right-mobile">
        <a class="" href="#contact"><i class="fas fa-search"></i></a>
        <a class="" href="#about"><i class="fas fa-shopping-cart"></i></a>
        <a class="" href="#contact"><i class="fas fa-user"></i></a>
      </div>
       
     </div>
     
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="ml-1 text-center" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
           <a class="ml-1 text-center" href="{{ url('/products') }}">Product</a>
        </li>
        <li class="nav-item">
           <a class="ml-1 text-center" href="{{ url('/news') }}">News</a>
        </li>
        <li class="nav-item">
           <a class="ml-1 text-center" href="{{ url('/contact') }}">Contact</a>
        </li>
        
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
      </ul>
      <div id="navbar-right">
        <a class="ml-1" href="#contact"><i class="fas fa-search"></i></a>
        <a class="ml-1" href="#about"><i class="fas fa-shopping-cart"></i></a>
        <a class="ml-1" href="#contact"><i class="fas fa-user"></i></a>
      </div>
    </div>
  </div>
</nav>

 