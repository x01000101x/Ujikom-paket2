
@extends('layouts.default')

@section('content')

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
                            <input type="text" name="id_resepsi" value="{{ $data['id'] }}" hidden>
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
                                <input type="text" name="id_resepsi" value="{{ $data['id'] }}" hidden>
                                <input type="text" name="avail" value="{{ $data['avail'] }}" hidden>
                                <input type="number" name="id_kamar" value="{{ $data['id_kamar'] }}" hidden>

                                <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin checkout tamu = {{ $data['tamu'] }} ?')" name="cekout" type="submit">Cek-out</button>
                                <!-- Button trigger modal -->
                            </form>

                            <form style ='float: right; padding: 5px;' action="resepsi" method="GET">
                                @csrf
                                <input type="text" name="id_resepsi" value="{{ $data['id'] }}" hidden>

                                <button type="button" name="hutu" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$data->id}}">
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
@foreach ($datas as $data)

<div name="hutu" class="modal fade" id="exampleModal-{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

    {{ $data['id'] }}

            @foreach ($shows as $show)
            <p>
                {{ $show['id'] }}
            </p>
            <p>
                {{ $show['booked'] }}
            </p>
            <p>
                {{ $show['ended'] }}
            </p>
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    @endforeach
</div>
</div>

@endsection




