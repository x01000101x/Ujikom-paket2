@extends('layouts.default')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resepsi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    body{
    color: #ffff;
    margin-top:20px;
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 60%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #fc5356;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #ffff;
}


</style>

</head>
<body>
    <section class="section about-section gray-bg" id="about">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        @foreach ($datas as $data)
        <div class="container">
            <div style="background-color: black" class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Resepsi #{{ $data['id'] }}</h3>
                            <h6 class="theme-color lead">A/n {{ $data['nama'] }}</h6>
                            <p></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Tamu</label>
                                        <p>{{ $data['tamu'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Tipe</label>
                                        <p>{{ $data['tipe'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Kamar</label>
                                        <p>{{ $data['avail'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Booking</label>
                                        <p>{{ $data['created_at'] }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>{{ $data['email'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>No. Telp</label>
                                        <p>{{ $data['notelp'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Dari</label>
                                        <p>{{ $data['booked'] }}</p>
                                    </div>
                                    <div class="media">
                                        <label>Hingga</label>
                                        <p>{{ $data['ended'] }}</p>
                                    </div>
                                    <div class="media">

                                    </div>
                                    <div class="media">

                                    </div> <div class="media">

                                    </div>


                                </div>
                                <b>
                                    <?php
                                    $ou = $data['booked'];
                                    $bou = $data['ended'];

                                    $from = date_create(date($ou));
                                    $to = date_create($bou);
                                    $diff = date_diff($to, $from);

                                    $sum= $diff->format('%R%a'); ?>

                                        <h4 style="background-color: white; color : black;">&nbsp; Total : @currency(($data['harga'] * $data['avail']) * (-$sum))</h4>

                                </b>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="{{ url('images/hotel-hebat.png') }}" title="" alt="">
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

            <br>
            <div class="container p-0">
                <form action="/unduh" method="get">
                    <button class="btn btn-primary" type="submit" name="unduh">DOWNLOAD RESEPSI</button>
                </form>
                <div>
            </section>




</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection
