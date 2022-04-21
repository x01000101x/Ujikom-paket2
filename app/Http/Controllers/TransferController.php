<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Resepsi;

class TransferController extends Controller
{
    public function ipaymu(Request $request)
    {
        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $resepsi->id_user = $id;
        $resepsi->booked = $request->date1;
        $resepsi->ended = $request->date2;
        $resepsi->avail = $request->jumlah;
        $resepsi->nama = $request->nama_pemesan;
        $resepsi->email = $request->email;
        $resepsi->notelp = $request->phone;
        $resepsi->tamu = $request->tamu;
        $resepsi->id_kamar = $request->kamar;
        $resepsi->method = $request->metode;


        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->where("id_user", $id)->get()->toArray();

        foreach ($datas as $data) {

            $ou = $data['booked'];
            $bou = $data['ended'];

            $from = date_create(date($ou));
            $to = date_create($bou);
            $diff = date_diff($to, $from);

            $sum = $diff->format('%R%a');

            $summarizer = $data['harga'] * (-$sum);
        }

        $rooms = $resepsi->nama;
        $jumlah = $request->jumlah;
        // dd($summarizer);

        $produk = [$rooms];
        $quantity = [$jumlah];
        $priceone = [$summarizer];
        $va           = '0000005280044559'; //get on iPaymu dashboard
        $secret       = 'SANDBOX147E6A77-C26A-4742-8A2D-67595CD57CA3-20220420220537'; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; //url
        $method       = 'POST'; //method
        $body['product']    = $produk;
        $body['qty']        = $quantity;
        $body['price']      = $priceone;
        $body['returnUrl']  = redirect('/resepsi');
        $body['cancelUrl']  = redirect('/');
        $body['notifyUrl']  = redirect('/resepsi');
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
        $signature    = hash_hmac('sha256', $stringToSign, $secret);
        $timestamp    = Date('YmdHis');
        $ch = curl_init($url);
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'va: ' . $va,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp
        );

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_POST, count($body));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $err = curl_error($ch);
        $ret = curl_exec($ch);
        curl_close($ch);
        if ($err) {
            var_dump($err);
        } else {
            $ret = json_decode($ret);
            if ($ret->Status == 200) {
                $sessionId  = $ret->Data->SessionID;
                $url        =  $ret->Data->Url;
                redirect($url);
            } else {
                var_dump($ret);
            }
        }
    }
}
