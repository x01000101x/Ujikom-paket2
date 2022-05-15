<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css
    ">

    <title>Hotel Hebat</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/"> --}}

    <!-- Bootstrap core CSS -->
    {{-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="starter-template.css" rel="stylesheet"> --}}

<style>
    body{
        /* background-image: url('https://thumbs.gfycat.com/RawMiserableArachnid-size_restricted.gif');
        background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; */
  background-color: #111111;
    }

    /* .starter-template{
        background-color:   ;
    } */
    p, h1, h2,h3, h4,h5 ,h6, label
        {
            color: #DCDCDC;
        }
</style>
</head>

  <body>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#">Hotel Hebat</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>



    <div id="myDIV" class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @if(Auth::user() and Auth::user()->roles == "resepsionis")
            <li class="nav-item {{ request()->routeIs('resepsionis') ? 'active' : ''}}">
                <a class="nav-link" href="/resepsionis">Reservasionis</a>
            </li>
            @endif
          <li class="nav-item {{ request()->Is('/') || request()->routeIs('abc') || request()->routeIs('pesan') ? 'active' : ''}}">
            @if(Auth::user() && Auth::user()->roles == "user")
            <a class="nav-link" href="/abc">Home</a>
            @elseif(!Auth::user())
            <a class="nav-link" href="/">Home</a>
            @endif
        </li>
        <li class="nav-item {{ request()->routeIs('fasilitas') ? 'active' : ''}}">
            <a class="nav-link" href="/fasilitas">Fasilitas</a>
        </li>
        <li class="nav-item {{ request()->routeIs('kamar') ? 'active' : ''}}">
            <a class="nav-link" href="/kamar">Kamar</a>
        </li>

        @if(Auth::user() && Auth::user()->roles == "user")
          <li class="nav-item {{ request()->routeIs('resepsi') ? 'active' : ''}}">
              <a class="nav-link" href="/resepsi">Resepsi</a>
            </li>
            @endif

            {{--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> --}}
        </ul>

        @if(!Auth::user())
        <ul class="navbar-nav" style="margin-right: 100px">

            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                @if (Route::has('register'))
                <a style="color: white" href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </ul>
        @else

        <ul class="navbar-nav" style="margin-right: 100px">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name; }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item" href="#">Log out</button>
                    </form>
                </div>
            </li>
        </ul>
        @endif
    </div>
</nav>


@yield('content')

</main><!-- /.container -->
<br><br>
<footer style="background-color: grey" class="footer">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2022 Copyright:
        <a href="#"> DAMANIK CORP</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->

<script>

//    // Get the container element
// var btnContainer = document.getElementById("myDIV");

// // Get all buttons with class="btn" inside the container
// var btns = btnContainer.getElementsByClassName("agua");

// // Loop through the buttons and add the active class to the current/clicked button
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("active");

//     // If there's no active class
//     if (current.length > 0) {
//       current[0].className = current[0].className.replace(" active", "");
//     }

//     // Add the active class to the current/clicked button
//     this.className += " active";
//   });
// }$('.brand-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
})
// </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

{{-- our partner --}}
<script>
    $('.brand-carousel').owlCarousel({
  loop:true,
  margin:10,
  autoplay:true,
  responsive:{
    0:{
      items:1
    },
    600:{
      items:3
    },
    1000:{
      items:5
    }
  }
})
</script>

{{-- testimoni --}}
<script>
    (function () {
    "use strict";

    var carousels = function () {
      $(".owl-carousel1").owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        responsiveClass: true,
        nav: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          680: {
            items: 2,
            nav: false,
            loop: false
          },
          1000: {
            items: 3,
            nav: true
          }
        }
      });
    };

    (function ($) {
      carousels();
    })(jQuery);
  })();



</script>
  </body>
</html>
