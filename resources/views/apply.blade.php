@extends('layouts.default')

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

picture{
    width: 250px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
}

</style>
<div class="starter-template">
    <br>

                  <main role="main" class="container">
    <br>

    <br>

              <form action="/pesan" method="GET">
@csrf
                    <div class="row">
                      <div class="col">
                        <label for="date1">Dari tanggal</label>
                        <input type="date" name="date1" class="form-control" placeholder="Dari tanggal" value="{{ $date1 }}" disabled>
                      </div>
                      <br>
                      <div class="col">
                        <label for="date2">Hingga tanggal</label>
                        <input type="date" name="date2" class="form-control" placeholder="Hingga tanggal" value="{{ $date2 }}" disabled>
                      </div>

                      <div class="col">
                                      <label for="jumlah">Jumlah kamar</label>
                          <input type="number" name="jumlah" class="form-control" placeholder="" value="{{ $jumlah }}" disabled>
                        </div>
                    </div><br>
                    @if(!Auth::user())
                    <a href="/" class="btn btn-warning">Cari tanggal lain?</a>
                    @else
                    <a href="/dashboard" class="btn btn-warning">Cari tanggal lain?</a>
                    @endif

            </form>
            <br><br>

            @if(!Auth::user())

            <div class="cekKamar" style= "padding: 10 10 10 10; border-radius: 1%">


            <p>Kamar tersedia, silahkan <a href="/register">register</a> atau <a href="/login">login</a> untuk memesan : </p>
            <ul>
                @foreach ($data as $kamar)

                    <li>{{ $kamar->tipe }} : {{ $kamar->avail }}</li>

                    @endforeach
                </ul>
                            </div>
                @else
                <h2 style="background-color: lime">Kamar tersedia!</h2>
                <p>Tipe kamar yang tersedia :</p>
                @foreach ($data as $kamar)


                <li>{{ $kamar->tipe }} : {{ $kamar->avail }} kamar (@currency($kamar->harga)/malam)</li>

                @endforeach
                <br>
                    <h1>Pesan</h1>
                    <form action="/apply" method="POST">
                @csrf
                <form>
                    <input type="hidden" id="date1" name="date1" value="{{ $date1 }}">
                    <input type="hidden" id="date2" name="date2" value="{{ $date2 }}">
                    <input type="hidden" id="jumlah" name="jumlah" value="{{ $jumlah }}">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama pemesan</label>
                        <input type="text" name="nama_pemesan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="ef1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="ef1" aria-describedby="emailHelp">

                    </div>
                      <div class="mb-3">
                        <label for="ef2" class="form-label">No. Telp</label>
                        <input type="text" name="phone" class="form-control" id="ef2" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="ef3" class="form-label">Nama tamu</label>
                        <input type="text" name="tamu" class="form-control" id="ef3" aria-describedby="emailHelp">

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Tipe Kamar</label>
                          <select name="kamar" class="form-control" id="exampleFormControlSelect1">
                              @foreach ($data as $da)
                              @if($da->avail < 1)
                              <option hidden value="{{ $da->id }}">{{ $da->tipe }}</option>
                              @else
                              <option value="{{ $da->id }}">{{ $da->tipe }}</option>
                              @endif

                              @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Metode Pembayaran</label>
                        <select name="metode" class="form-control" id="exampleFormControlSelect1">

                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>

                        </select>
                    </div>
                    <br>
                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin melakukan booking?')" class="btn btn-primary">Pesan</button>
                    <a href="/abc" class="btn btn-danger">Kembali</a>

                </div>
            </div>
        </form>

    </form>

        @endif




    </div>


@endsection

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

