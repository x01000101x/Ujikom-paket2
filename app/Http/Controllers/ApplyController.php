<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsi;
use Illuminate\Http\Request;
use App\Http\Controllers\TransferController;

//CREATE
class ApplyController extends Controller
{
    public function add(Request $request)
    {

        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $joinan = $kamar::select('avail')->where("id", $request->kamar)->get()->toArray();

        // $resepsi->id = $request->id;
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

        // dd($joinan[0]['avail']);

        // if ($joinan[0]['avail'] - $request->jumlah < 0) {
        //     print_r("Maaf kamar hanya tersedia = " . $joinan[0]['avail']);
        //     return redirect('/abc');
        // } else {
        $minus = $joinan[0]['avail'] - $request->jumlah;
        $kamar->where("id", $request->kamar)->update(['avail' => $minus]);

        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->where("id_user", $id)->get()->toArray();
        // $resepsi->save();
        $resepsi->save();

        foreach ($datas as $data) {

            $ou = $data['booked'];
            $bou = $data['ended'];

            $from = date_create(date($ou));
            $to = date_create($bou);
            $diff = date_diff($from, $to);

            $sum = $diff->format('%R%a');
            // dd($datas);
            $idku = $data['id'] + 1;
            $summarizer = $data['harga'] * $data['avail'];
        }

        $rooms = $resepsi->nama;
        // $jumlah = $request->jumlah;
        // dd($idku);
        // dd($summarizer);

        if ($request->metode == "transfer") {

            // dd("hello");
            //parameter ipaymu nama produk (contoh superior)
            //paramater jumlah berapa kali mesan
            //parameter harga berapa harga

            // TransferController::ipaymu($rooms, $jumlah, $summarizer);
            $url = $this->ipaymu($rooms, $summarizer, $sum, $idku);
            return redirect($url);
        } else {
            return redirect()->route('resepsi')->with('message', 'Berhasil melakukan booking kamar! silahkan cetak resepsi ini dan serahkan kepada resepsionis untuk check-in');
        }
        // }

    }

    // public function monki()
    // {
    //     return redirect('/resepsi');
    // }

    public function ipaymu($rooms, $summarizer, $sum, $idku)
    {

        $produk = [$rooms];
        $quantity = [$sum];
        $priceone = [$summarizer];
        // $idku = [$idku];
        $va           = '0000005280044559'; //get on iPaymu dashboard
        $secret       = 'SANDBOX147E6A77-C26A-4742-8A2D-67595CD57CA3-20220420220537'; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; //url
        $method       = 'POST'; //method
        // $body['idku'] = $idku;
        $body['product']    = $produk;
        $body['qty']        = $quantity;
        $body['price']      = $priceone;
        $body['returnUrl']  = route('check_pembayaran', ['idku' => $idku]);
        $body['cancelUrl']  = url('/');
        $body['notifyUrl']  = route('check_pembayaran', ['idku' => $idku]);
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
                return $url;
            } else {
                var_dump($ret);
            }
        }
    }
}
