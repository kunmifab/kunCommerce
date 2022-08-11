<!DOCTYPE html>
<html>

<head>

    <title>@yield('title')</title>
  <!-- Stylesheet -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Data Table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.css" />
  <link rel="shortcut icon" href="{{asset('images/logo.PNG')}}">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!--add this to have this styles on all pages-->
  <link rel="stylesheet" href="font-awesome.min.css">
  @yield('css')
  <!--for adding additional styles-->
</head>

<body class="bg-dark">

  <!-- Navbar Area Start -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark @if(auth()->check()) bg-primary @else bg-secondary @endif">
      <a class="navbar-brand" href="#"><img src="{{asset('images/logo.PNG')}}" width="100px" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
           <span class="navbar-toggler-icon"></span>
       </button>
      <div class="container collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active mr-3">
            <a class="nav-link" href="{{url('/')}}"><i class="fas"></i>Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item mr-3">
            <a class="nav-link" href="{{route('category.index')}}">Categories</a>
          </li>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product.index')}}">Products</a>
          </li>
          @if (auth()->check())
          @if (auth()->user()->role->id == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{route('currency.index')}}">Currency</a>
          </li>
          @endif
          @endif

          @if (!auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{route('seller.login')}}">Market</a>
          </li>
          @endif

          <li class="nav-item mr-3">
            <a class="nav-link" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"></i> Cart
                @if (Cart::getContent()->count() > 0)
            <span style="background-color: rgb(19, 97, 49)">{{Cart::getContent()->count()}}</span>
            @endif
        </a>
          </li>



        </ul>

        <ul class="navbar-nav">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}"><i class="fas fa-user-plus"></i> Signup</a>
          </li>
          @endguest @auth
          @if (auth()->user()->role->id != 2)
          <li class="nav-item nav-link">Wallet: <span class="bg-dark p-2 text-success">₦{{number_format(auth()->user()->wallet->amount)}}</span></li>
          @endif


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
              {{Auth::user()->firstname}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('dashboard')}}"><i class="far fa-id-badge"></i></i> Profile</a>
              <a class="dropdown-item" href="{{route('transactions')}}"><i class="fas fa-envelope-open-text"></i> Transactions</a>
              @if (auth()->user()->role->id == 1)
              <a class="dropdown-item" href="{{route('escrow')}}"><i class="fas fa-envelope-open-text"></i> Escrow Account</a>
              @endif

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
          @endauth
        </ul>
      </div>
    </nav>
  </header>
  <!-- Navbar Area End -->

  <div class="container bg-white mt-5 mb-5" style="box-shadow:  6px -3px 10px #efeff1, -6px 6px 10px #ffffff;">
      @yield('content')
  </div>

  <!--for adding your content-->

  <!-- Add Footer Area Start -->
  <footer class="footer @if(auth()->check()) bg-primary @else bg-secondary @endif text-white">

    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                KunCommerce
              </h6>
              <p>We are a leading E-commerce website in Nigeria where you can get a lovely range of products. We can guaranee that you will never be disappointed!</p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Categories of Products</h6>
            @foreach ($categories->slice(0, 4) as $category)
              <p>
                <a class="text-white" href="{{route('category.show', ['slug' => $category->slug])}}">{{$category->name}}</a>
              </p>
            @endforeach

            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">
                Some Products
              </h6>
              @foreach ($products->slice(0, 4) as $product)
              <p>
                <a class="text-white" href="{{route('product.show', ['slug'=> $product->slug])}}">{{$product->name}}</a>
              </p>
              @endforeach

            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fas fa-home mr-3"></i> Ilorin, Kwara State, Nigeria</p>
              <p><i class="fas fa-envelope mr-3"></i> kuncommerce@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +234 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="my-3">

        <!-- Section: Copyright -->
        <section class="p-3 pt-0">
          <div class="row d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-7 col-lg-8 text-center text-md-start">
              <!-- Copyright -->
              <div class="p-3">
                <script>document.write(new Date().getFullYear())</script> © KunCommerce
              </div>
              <div>
                    Designed & Developed by Kunmi
                </div>
              <!-- Copyright -->
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
              <!-- Facebook -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 href="https://facebook.com"
                 ><i class="fab fa-facebook-f"></i
                ></a>

              <!-- Twitter -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 href="https://twitter.com"
                 ><i class="fab fa-twitter"></i
                ></a>

              <!-- Google -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 href="https://google.com"
                 ><i class="fab fa-google"></i
                ></a>

              <!-- Instagram -->
              <a
                 class="btn btn-outline-light btn-floating m-1"
                 class="text-white"
                 role="button"
                 href="https://instagram.com"
                 ><i class="fab fa-instagram"></i
                ></a>
            </div>
            <!-- Grid column -->
          </div>
        </section>
        <!-- Section: Copyright -->
      </div>
  </footer>
  <!-- Add Footer Area End -->

  <!-- **** All JS Files here ***** -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>

  <!--add this to have this scripts on all pages-->
  @yield('scripts')
  <!--for adding additional scripts-->

</body>

</html>
