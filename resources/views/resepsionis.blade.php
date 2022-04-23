
@extends('layouts.default')

@section('content')

<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>

<div class="starter-template">
    <br>

                  <main role="main" class="container">
    <br>

    <br>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="cekKamar" style= "padding: 10 10 10 10; border-radius: 1%">



    {{-- TESTING HERE --}}
@foreach ($datas as $data)

    {{-- {{dd($data) }} --}}


@endforeach


    <h1>Cek In Tamu</h1>
    <br>
    {{-- search --}}
    <div style="float: right">
    <form class="form" method="get" action="resepsionis">
        <div style="float: right" class="form-group w-20 mb-3">
            <label for="search" class="d-block mr-2">Pencarian</label>
            <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </form>

    </div>
<div style="float: left">

    <form class="form" method="get" action="resepsionis">
        <div class="form-group w-20 mb-3">
            <label for="search" class="d-block mr-2">Pencarian</label>
            <input type="date" name="search_date" class="form-control w-75 d-inline" id="search" placeholder="Masukkan tanggal">
            <button type="submit" class="btn btn-primary mb-1">Cari</button>
        </div>
    </form>
    <a style="float: left" href="resepsionis" type="submit" class="btn btn-warning mb-1">Refresh</a>
</div>
    {{-- end search --}}
    <br><br>
    <div class="table-responsive table-hover">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Tamu</th>
                  <th scope="col">Tanggal Cek-in (Y-M-D)</th>
                  <th scope="col">Tanggal Cek-out (Y-M-D)</th>
                  <th scope="col">Aksi</th>

                </tr>
              </thead>
              <tbody>

                @php
                    $i = 1;
                @endphp

@foreach ( $datas as $data)
@if($data['is_checked'] == '1')
<tr class="table-success">
    @else
    <tr>
        @endif
        <th scope="row">
            {{ $i; }}
        </th>
        <td>{{ $data['tamu'] }}</td>
        <td>{{ $data['booked'] }}</td>
                      <td>{{ $data['ended'] }}</td>
                      <td>
                          <form style ='float: left; padding: 5px;' action="resepsiAksi" method="POST">
                            @csrf
                            <input type="text" name="id_resepsi" value="{{ $data['resepid'] }}" hidden>
                            {{-- <input type="text" name="id_user" value="{{ $data['id_user'] }}" hidden>
                            <input type="text" name="booked" value="{{ $data['booked'] }}" hidden>
                            <input type="text" name="ended" value="{{ $data['ended'] }}" hidden>
                            <input type="text" name="nama" value="{{ $data['nama'] }}" hidden>
                            <input type="text" name="email" value="{{ $data['email'] }}" hidden>
                            <input type="text" name="tamu" value="{{ $data['tamu'] }}" hidden>
                            <input type="text" name="notelp" value="{{ $data['notelp'] }}" hidden>--}}


                            <button class="btn btn-primary" onclick="return confirm('Apakah anda ingin checkin tamu = {{ $data['tamu'] }}?')" name="cekin" type="submit">Cek-in</button>
                            </form>

                            <form style ='float: left; padding: 5px;' action="resepsiDelete" method="POST">
                                @csrf
                                {{-- {{ ($data['id']) }} --}}
                                <input type="text" name="id_resepsi" value="{{ $data['resepid'] }}" hidden>
                                <input type="text" name="avail" value="{{ $data['avail'] }}" hidden>
                                <input type="number" name="id_kamar" value="{{ $data['id_kamar'] }}" hidden>

                                <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin checkout tamu = {{ $data['tamu'] }} ?')" name="cekout" type="submit">Cek-out</button>
                                <!-- Button trigger modal -->
                            </form>
                            <form style ='float: left; padding: 5px;' action="resepsi" method="GET">
                                @csrf
                                {{-- {{ ($data['id']) }} --}}
                                <input type="text" name="id_resepsi" value="{{ $data['id'] }}" hidden>

                                <?php
                                $ou = $data['booked'];
                                $bou = $data['ended'];

                                $from = date_create(date($ou));
                                $to = date_create($bou);
                                $diff = date_diff($to, $from);

                                $sum= $diff->format('%R%a');

                                ?>

                                <button type="button" id="detail" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                                data-id="{{ $data['resepid'] }}"
                                data-nama="{{ $data['nama'] }}"
                                data-ended="{{ $data['ended'] }}"
                                data-tipe="{{ $data['tipe'] }}"
                                data-notelp="{{ $data['notelp'] }}"
                                data-email="{{ $data['email'] }}"
                                data-tamu="{{ $data['tamu'] }}"
                                data-tersedia="{{ $data['tersedia'] }}"
                                data-harga="@currency($data['harga'] * (-$sum))"
                                data-booked="{{ $data['booked'] }}">
                                    Lihat
                                </button>
                            </form>



                        </td>
                        @php
                            $i += 1;
                            @endphp

                    </tr>
                    @endforeach
              </tbody>
            </table>

            *Jumlah Reservasi : {{ $datas->total() }} <br/>

            {{ $datas->links() }}
      </div>

        </div>
    </div>
</div>


<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>
<br>
<br>
<br>
<br>

<!-- Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservasi #<span id="id"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body table-responsive">
                <b>
                    <h5>A/n <span id="nama"></span></h5>
                    </b>
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Tamu</th>
                            <td>
                                <span id="tamu"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>Dari
                            </th>

                                <td>
                                    <span id="booked"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Hingga
                                </th>

                                    <td>
                                        <span id="ended"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email
                                    </th>

                                        <td>
                                            <span id="email"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>No. Telp
                                        </th>

                                            <td>
                                                <span id="notelp"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kamar
                                            </th>

                                                <td>
                                                    <span id="tersedia"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tipe
                                                </th>

                                                    <td>
                                                        <span id="tipe"></span>
                                                    </td>
                                                </tr>
                                            <tr class="table-warning">
                                                <th>Total
                                                </th>

                                                    <td>
                                                        <span id="harga"></span>
                                                    </td>
                                                </tr>


                    </tbody>
                </table>

            </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <form style ='float: left;' action="resepsiDelete" method="POST">
                @csrf
                <input type="text" name="id_resepsi" value="{{ $data['resepid'] }}" hidden>
                <input type="text" name="avail" value="{{ $data['avail'] }}" hidden>
                                <input type="number" name="id_kamar" value="{{ $data['id_kamar'] }}" hidden>

            <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin checkin tamu = {{ $data['tamu'] }}?')" name="cekin" type="submit">Cek-out</button>
            </form>
            <form style ='float: right; padding: 5px;' action="resepsiAksi" method="POST">
                @csrf
                <input type="text" name="id_resepsi" value="{{ $data['resepid'] }}" hidden>
            <button class="btn btn-success" onclick="return confirm('Apakah anda ingin checkout tamu = {{ $data['tamu'] }} ?')" name="cekout" type="submit">Cek-in</button>

            </form>

        </div>
    </div>
</div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#detail', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tamu = $(this).data('tamu');
            var tipe = $(this).data('tipe');
            var kamar = $(this).data('kamar');
            var email = $(this).data('email');
            var notelp = $(this).data('notelp');
            var booked = $(this).data('booked');
            var ended = $(this).data('ended');
            var tersedia = $(this).data('tersedia');
            var harga = $(this).data('harga');


            $('#id').text(id);
            $('#nama').text(nama);
            $('#booked').text(booked);
            $('#ended').text(ended);
            $('#tamu').text(tamu);
            $('#tipe').text(tipe);
            $('#kamar').text(kamar);
            $('#email').text(email);
            $('#notelp').text(notelp);
            $('#tersedia').text(tersedia);
            $('#harga').text(harga);

         })
    });
</script>



