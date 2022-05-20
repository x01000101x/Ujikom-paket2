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
    <div class="container">
                <div style="background-color: black" class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Report Data Pengunjung Yang sudah check-out</h3>
                            {{-- <h6 class="theme-color lead">A/n {{ $data['nama'] }}</h6> --}}
                            <table border="10px white">
                                <thead>
                                    <tr>
                                        <th>Tamu</th>
                                        <th>Total Kamar</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                       <?php
                                       $ou = $data['booked'];
                                       $bou = $data['ended'];

                                       $from = date_create(date($ou));
                                       $to = date_create($bou);
                                       $diff = date_diff($to, $from);

                                       $sum= $diff->format('%R%a');
                                       $summerizer = ($data['harga'] * $data['avail']) * (-$sum);
                                       ?>
                                     <td>{{ $data['tamu'] }}</td>
                                     <td>{{ $data['avail'] }}</td>
                                     <td>Total : @currency($summerizer)</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <div class="row about-list">
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
                                        <label>Pembayaran</label>
                                        <p>{{ $data['method'] }} /
                                            @if($data['is_paid'] == 0)
                                               {{ "BELUM LUNAS"}}
                                            @else
                                            {{
                                                "LUNAS"
                                             }}
                                             @endif
                                            </p>
                                    </div> --}}

                                    <div class="media">

                                    </div>
                                </div>
                                <b>





                                        {{-- <h4 style="background-color: white; color : black;">&nbsp; Total : @currency($summerizer)</h4> --}}


                                </b>
                                <br>
                            </div>
                        </div>
                    </div>

                        <div class="about-avatar">
<h1 style="color: red; background-color: white">~HOTEL HEBAT APPROVED~</h1>
                        </div>


                </div>

            </div>
        </section>






