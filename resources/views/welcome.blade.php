
@extends('layouts.default');

@section('content')


<style>
    .carousel-item .img-fluid {
  width:100%;
  height:50%;
}

.img-fluid {
    max-width: 100%;
    height: auto;
}

.tengah{
		text-align: center;
		color: black;

	}

     /* Testimonial */

     body {
  background: white;
}

.gtco-testimonials {
  position: relative;
}
@media (max-width: 767px) {
  .gtco-testimonials {
    margin-top: 20px;
  }
}
.gtco-testimonials h2 {
  font-size: 30px;
  text-align: center;
  margin-bottom: 50px;
  color: #FFFFFF;
  text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
  letter-spacing: 2px;
  background-color:black;
  padding:10px 5px;
}
.gtco-testimonials .owl-stage-outer {
  padding: 30px 0;
}
.gtco-testimonials .owl-nav {
  display: none;
}
.gtco-testimonials .owl-dots {
  text-align: center;
}
.gtco-testimonials .owl-dots span {
  position: relative;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  display: block;
  background: #fff;
  border: 2px solid #01b0f8;
  margin: 0 5px;
}
.gtco-testimonials .owl-dots .active {
  box-shadow: none;
}
.gtco-testimonials .owl-dots .active span {
  background: #01b0f8;
  box-shadow: none;
  height: 12px;
  width: 12px;
  margin-bottom: -1px;
}
.gtco-testimonials .card {
  background: #fff;
  box-shadow: 0 8px 30px -7px #c9dff0;
  margin: 0 20px;
  padding: 0 10px;
  border-radius: 20px;
  border: 0;
}
.gtco-testimonials .card .card-img-top {
  max-width: 100px;
  border-radius: 50%;
  margin: 15px auto 0;
  box-shadow: 0 8px 20px -4px #95abbb;
  width: 100px;
  height: 100px;
}
.gtco-testimonials .card h5 {
  color: #01b0f8;
  font-size: 21px;
  line-height: 1.3;
}
.gtco-testimonials .card h5 span {
  font-size: 18px;
  color: #666666;
}
.gtco-testimonials .card p {
  font-size: 18px;
  color: #555;
  padding-bottom: 15px;
}
.gtco-testimonials .active {
  opacity: 0.5;
  transition: all 0.3s;
}
.gtco-testimonials .center {
  opacity: 1;
}
.gtco-testimonials .center h5 {
  font-size: 24px;
}
.gtco-testimonials .center h5 span {
  font-size: 20px;
}
.gtco-testimonials .center .card-img-top {
  max-width: 100%;
  height: 120px;
  width: 120px;
}
.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
  outline: 0;
}


</style>

<div class="starter-template">
    <br>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <picture>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <source srcset="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8aG90ZWx8ZW58MHx8MHx8&w=1000&q=80" media="(min-width: 1400px)">
                            <source srcset="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8aG90ZWx8ZW58MHx8MHx8&w=1000&q=80" media="(min-width: 768px)">
                            <source srcset="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8aG90ZWx8ZW58MHx8MHx8&w=1000&q=80" media="(min-width: 576px)">
                            <img srcset="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8aG90ZWx8ZW58MHx8MHx8&w=1000&q=80" alt="responsive image" class="d-block img-fluid">
                        {{-- <img src="" class="d-block w-100" alt="..."> --}}
                      </div>
                      <div class="carousel-item">
                        <source srcset="https://cdn-image.hipwee.com/wp-content/uploads/2021/01/hipwee-hotel-presidente-4s-4.jpg" media="(min-width: 1400px)">
                            <source srcset="https://cdn-image.hipwee.com/wp-content/uploads/2021/01/hipwee-hotel-presidente-4s-4.jpg" media="(min-width: 768px)">
                            <source srcset="https://cdn-image.hipwee.com/wp-content/uploads/2021/01/hipwee-hotel-presidente-4s-4.jpg" media="(min-width: 576px)">
                            <img srcset="https://cdn-image.hipwee.com/wp-content/uploads/2021/01/hipwee-hotel-presidente-4s-4.jpg" alt="responsive image" class="d-block img-fluid">
                        {{-- <img src="https://bacalagers.com/wp-content/uploads/2021/03/blue-sea-sunset-UXoQ2Z.jpeg" class="d-block w-100" alt="..."> --}}
                      </div>
                      <div class="carousel-item">
                        <source srcset="https://cdn-2.tstatic.net/travel/foto/bank/images/whiz-prime-hotel-darmo-harapan-surabaya.jpg" media="(min-width: 1400px)">
                            <source srcset="https://cdn-2.tstatic.net/travel/foto/bank/images/whiz-prime-hotel-darmo-harapan-surabaya.jpg" media="(min-width: 768px)">
                            <source srcset="https://cdn-2.tstatic.net/travel/foto/bank/images/whiz-prime-hotel-darmo-harapan-surabaya.jpg" media="(min-width: 576px)">
                            <img srcset="https://cdn-2.tstatic.net/travel/foto/bank/images/whiz-prime-hotel-darmo-harapan-surabaya.jpg" alt="responsive image" class="d-block img-fluid">
                        {{-- <img src="https://bacalagers.com/wp-content/uploads/2021/03/blue-sea-sunset-UXoQ2Z.jpeg" class="d-block w-100" alt="..."> --}}
                      </div>
                    </div>
                    </picture>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </button>
                  </div>
                  <main role="main" class="container">
    <br>

    <br>


<div class="cekKamar" style=" padding: 10 10 10 10; border-radius: 1%">

    <h1>Cek ketersediaan kamar</h1>
    <br>
    <form action="/pesan" method="post">
        @csrf
                    <div class="row">
                      <div class="col">
                          <label for="date1">Dari tanggal</label>
                          <input type="date" name="date1" class="form-control" placeholder="Dari tanggal">
                        </div>
                        <br>
                        <div class="col">
                            <label for="date2">Hingga tanggal</label>
                            <input type="date" name="date2" class="form-control" placeholder="Hingga tanggal">
                        </div>

                        <div class="col">
                        <label for="jumlah">Jumlah kamar</label>
                          <input type="number" name="jumlah" class="form-control" placeholder="">
                        </div>
                    </div><br>
                    <button class="btn btn-primary" type="submit">Cari</button>

                </form>
            </div>
            <br>
            <div class="tengah">
                <h1>Tentang Kami</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto tenetur necessitatibus tempore rerum inventore, eaque minus quae nesciunt omnis? Alias iste nobis illum qui iure. Expedita neque fuga sit aut.</p>
            </div>
{{-- Testimoni --}}
<div class="gtco-testimonials">

    <div class="owl-carousel owl-carousel1 owl-theme">
      <div>
        <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1572561300743-2dd367ed0c9a?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=300&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=300" alt="">
          <div class="card-body">
            <h5>Ronne Galle <br />
              <span> Project Manager </span></h5>
            <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
              impedit quo minus id quod maxime placeat ” </p>
          </div>
        </div>
      </div>
      <div>
        <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1588361035994-295e21daa761?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=301" alt="">
          <div class="card-body">
            <h5>Missy Limana<br />
              <span> Engineer </span></h5>
            <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
              impedit quo minus id quod maxime placeat ” </p>
          </div>
        </div>
      </div>
      <div>
        <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1575377222312-dd1a63a51638?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=302&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=302" alt="">
          <div class="card-body">
            <h5>Martha Brown<br />
              <span> Project Manager </span></h5>
            <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
              impedit quo minus id quod maxime placeat ” </p>
          </div>
        </div>
      </div>
      <div>
        <div class="card text-center"><img class="card-img-top" src="https://images.unsplash.com/photo-1549836938-d278c5d46d20?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=50&w=303" alt="">
          <div class="card-body">
            <h5>Hanna Lisem<br />
              <span> Project Manager </span></h5>
            <p class="card-text">“ Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
              impedit quo minus id quod maxime placeat ” </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end testi  --}}

        </div>
    </div>
</div>
@endsection

{{-- <picture>
    <source srcset="https://dummyimage.com/2000x400/007aeb/4196e5" media="(min-width: 1400px)">
    <source srcset="https://dummyimage.com/1400x400/007aeb/4196e5" media="(min-width: 768px)">
    <source srcset="https://dummyimage.com/800x400/007aeb/4196e5" media="(min-width: 576px)">
    <img srcset="https://dummyimage.com/600x400/007aeb/4196e5" alt="responsive image" class="d-block img-fluid">
  </picture> --}}
