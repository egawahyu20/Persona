  <!-- ======= Top Bar ======= -->
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center justify-content-between">

          <div class="logo">
              {{-- <h1 class="text-light"><a href="{{ url('/') }}"><span>Persona</span></a></h1> --}}
              <!-- Uncomment below if you prefer to use an image logo -->
              <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/persona-logo.png') }}" alt="" class="img-fluid"></a>
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li> 
                  <li><a class="getstarted scrollto" href="{{ url('/registrasi') }}">Register</a></li>
                  <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
