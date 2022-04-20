<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function idopin($rooms, $jumlah, $summarizer)
    {
        $produk = [$rooms];
        $quantity = [$jumlah];
        $priceone = [$summarizer];
        $va           = 'Masukan VA'; //get on iPaymu dashboard
        $secret       = 'Masukan API Key'; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; //url
        $method       = 'POST'; //method
        $body['product']    = $produk;
        $body['qty']        = $quantity;
        $body['price']      = $priceone;
        $body['returnUrl']  = route('/resepsi');
        $body['cancelUrl']  = route('/');
        $body['notifyUrl']  = route('/resepsi');
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
