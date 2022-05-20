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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"> --}}





    <title>Hotel Hebat</title>

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/"> --}}

    <!-- Bootstrap core CSS -->
    {{-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="starter-template.css" rel="stylesheet"> --}}

<style>

.footer-dark {
  padding:50px 0;
  color:#f0f9ff;
  background-color:#282d32;
}

.footer-dark h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-dark ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-dark ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.6;
}

.footer-dark ul a:hover {
  opacity:0.8;
}

@media (max-width:767px) {
  .footer-dark .item:not(.social) {
    text-align:center;
    padding-bottom:20px;
  }
}

.footer-dark .item.text {
  margin-bottom:36px;
}

@media (max-width:767px) {
  .footer-dark .item.text {
    margin-bottom:0;
  }
}

.footer-dark .item.text p {
  opacity:0.6;
  margin-bottom:0;
}

.footer-dark .item.social {
  text-align:center;
}

@media (max-width:991px) {
  .footer-dark .item.social {
    text-align:center;
    margin-top:20px;
  }
}

.footer-dark .item.social > a {
  font-size:20px;
  width:36px;
  height:36px;
  line-height:36px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  box-shadow:0 0 0 1px rgba(255,255,255,0.4);
  margin:0 8px;
  color:#fff;
  opacity:0.75;
}

.footer-dark .item.social > a:hover {
  opacity:0.9;
}

.footer-dark .copyright {
  text-align:center;
  padding-top:24px;
  opacity:0.3;
  font-size:13px;
  margin-bottom:0;
}

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
    p, h1, h2,h3, h4,h5 ,h6, label, li
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
                <a class="nav-link" href="/resepsionis">Resepsionis</a>
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
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-md-3 item">
                    <h3 style="color: white">Our Company</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto fugiat neque laboriosam quaerat eveniet aspernatur. Ratione dolore expedita, doloribus mollitia, odit dolorem sit aperiam esse, sapiente repellendus quasi illum aliquam.

                    </p>


                  </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Email : hotel@gmail.com</a></li>
                            <li><a href="#">Telp. : +62 862-8827-039</a></li>
                            <li><a href="#">Lokasi : Pakuan Hill</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                      <h3>OUR LOCATION </h3>
                      <div class="media" style="height: auto; max-width: 100%;>
                                      <div class="mapouter">
                                          <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=pakuan%20hill%20cluster%20livistona&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                          {{-- <a href="https://123movies-to.org">123 movies</a> --}}
                                          <br>
                                          <style>.mapouter{position:relative;text-align:left;height:300px;width:600px;}</style>
                                          <a href="https://www.embedgooglemap.net">google maps widget html</a>
                                          <style>.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:600px;}</style>
                                          </div>
                                          </div>
                      </div>	<!-- End Of /.media -->
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">DAMANIK CORP © 2022</p>
            </div>
        </footer>

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

{{-- <script>
    $(document).ready( function () {
    $('#tableku').DataTable();
} );
</script> --}}

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
