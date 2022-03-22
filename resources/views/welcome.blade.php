
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
            <h1>Tentang Kami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto tenetur necessitatibus tempore rerum inventore, eaque minus quae nesciunt omnis? Alias iste nobis illum qui iure. Expedita neque fuga sit aut.</p>

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
