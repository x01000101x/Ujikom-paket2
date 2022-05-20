<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Encore\Admin\Grid\Filter\Where;

class ResepsiController extends Controller
{

    //  READ

    public function show()
    {
        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->where("id_user", $id)->get()->toArray();


        return view('resepsi', compact('datas'));
    }

    public function resepsionisFunc(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        // $shows = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")->get()->first();

        $datas = $resepsi::select('*')->orderBy('id', 'desc')->get()->toArray();
        $keyword = $request->search;
        $keyword2 = $request->search_date;

        // dd($keyword2);

        if ($request->search_date == null) {
            $date = "";
        } else {
            $date = date("Y-m-d", strtotime($request->search_date));

            // dd($date);
        }
        // $date = new DateTime($keyword2);
        // dd($date);

        $datas = $resepsi::join('kamars', 'kamars.id', 'resepsis.id_kamar')->select('resepsis.id as resepid', 'kamars.id as kamarid', 'resepsis.avail as tersedia', 'resepsis.*', 'kamars.*')->orderBy('resepsis.is_checked', 'asc')->where('resepsis.tamu', 'like', "%" . $keyword . "%")->orWhere('resepsis.id', 'like', "%" . $keyword . "%")->where('resepsis.booked', 'like', "%" . $date . "%")->where('resepsis.ended', 'like', "%" . $date . "%")->paginate(5);


        return view('resepsionis', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchDate(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        // $shows = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")->get()->first();

        $datas = $resepsi::select('*')->orderBy('id', 'desc')->get()->toArray();
        $keyword = $request->search;
        $keyword2 = $request->search_date;

        // dd($keyword2);

        if ($request->search_date == null) {
            $date = "";
        } else {
            $date = date("Y-m-d", strtotime($request->search_date));

            // dd($date);
        }
        // $date = new DateTime($keyword2);
        // dd($date);

        $datas = $resepsi::join('kamars', 'kamars.id', 'resepsis.id_kamar')->select('resepsis.id as resepid', 'kamars.id as kamarid', 'resepsis.avail as tersedia', 'resepsis.*', 'kamars.*')->orderBy('resepsis.is_checked', 'asc')->where('resepsis.booked', 'like', "%" . $date . "%")->orWhere('resepsis.ended', 'like', "%" . $date . "%")->paginate(5);


        return view('resepsionis', compact('datas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    //UPDATE
    public function Aksi(Request $request)
    {
        $resepsi = new Resepsi();

        $kampret = $request->id_resepsi;

        $resepsi::where('id', $kampret)->update(['is_checked' => '1']);
        // $resepsi->save();
        return redirect()->route('resepsionis')->with('message', 'Berhasil Cek-in!');
    }

    //DELETE
    public function Delete(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        $room = $kamar::find($request->id_kamar);
        // var_dump($room->avail);
        // dd($request->avail);

        $total = $room->avail + $request->avail;
        $biongo = $room->update(['avail' => $total]);

        // $biongo = $kamar::where('id', $id_kamar)->increment('avail', 1);

        $resepsi::where('id', $kampret)->firstorfail()->delete();

        return redirect()->route('resepsionis')->with('message', 'Berhasil Cek-out!');
    }

    //READ
    public function showreservasi(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        $shows = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")->where('resepsis.id', $kampret)->get()->toArray();

        return view('resepsionis', compact('shows'));
    }

    public function check_payment($idku)
    {
        // dd($idku);
        // dd($idku);

        $resepsi = new Resepsi();

        if ($_GET['status'] == "successful") {
            $resepsi::where('id', $idku)
                ->update(['is_paid' => 1]);
            return redirect()->route('resepsi')->with('message', 'Berhasil Melakukan pembayaran!');
        } else {
            echo "Belum lunas";
            return redirect()->route('resepsi')->with('message', 'Silahkan lunasi pembayaran!');
        };
    }

    // public function search(Request $request)
    // {
    //     $resepsi = new Resepsi();
    // }
}
