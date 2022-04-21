<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsi;
use Illuminate\Http\Request;
use App\Http\Controllers\TransferController;

class ApplyController extends Controller
{
    public function add(Request $request)
    {

        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $joinan = $kamar::select('avail')->where("id", $request->kamar)->get()->toArray();

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
        $resepsi->save();

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
        dd($summarizer);

        if ($request->metode == "transfer") {

            // dd("hello");
            //parameter ipaymu nama produk (contoh superior)
            //paramater jumlah berapa kali mesan
            //parameter harga berapa harga

            // TransferController::ipaymu($rooms, $jumlah, $summarizer);
            $this->ipaymu($rooms, $jumlah, $summarizer);
            return redirect()->route('transfer');
        } else {
            return redirect()->route('resepsi')->with('message', 'Berhasil melakukan booking kamar! silahkan cetak resepsi ini dan serahkan kepada resepsionis untuk check-in');
        }
        // }
    }
}
