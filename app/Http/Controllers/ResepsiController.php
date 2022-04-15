<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Resepsi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Encore\Admin\Grid\Filter\Where;

class ResepsiController extends Controller
{
    public function show()
    {
        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->where("id_user", $id)->get()->toArray();

        // dd($datas);

        return view('resepsi', compact('datas'));
    }

    public function resepsionisFunc(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        $shows = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")->where('resepsis.id', $kampret)->get()->toArray();

        $datas = $resepsi::select('*')->orderBy('id', 'desc')->get()->toArray();
        $keyword = $request->search;
        $keyword2 = $request->search_date;

        if ($request->search_date == null) {
            $date = "";
        } else {
            $date = date("Y-m-d", strtotime($request->search_date));
        }
        // $date = new DateTime($keyword2);
        // dd($date);

        $datas = $resepsi::select('*')->orderBy('id', 'desc')->where('tamu', 'like', "%" . $keyword . "%")->where('booked', 'like', "%" . $date . "%")->where('ended', 'like', "%" . $date . "%")->paginate(5);


        return view('resepsionis', compact('datas', 'shows'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function Aksi(Request $request)
    {
        $resepsi = new Resepsi();

        $kampret = $request->id_resepsi;

        $resepsi::where('id', $kampret)->update(['is_checked' => '1']);
        // $resepsi->save();
        return redirect()->route('resepsionis')->with('message', 'Berhasil Cek-in!');
    }

    public function Delete(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        $room = $kamar::find($request->id_kamar);
        $total = $room->avail + $request->avail;
        $biongo = $room->update(['avail' => $total]);

        // $biongo = $kamar::where('id', $id_kamar)->increment('avail', 1);

        $resepsi::where('id', $kampret)->firstorfail()->delete();

        return redirect()->route('resepsionis')->with('message', 'Berhasil Cek-out!');
    }

    public function showreservasi(Request $request)
    {
        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $kampret = $request->id_resepsi;

        $shows = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")->where('resepsis.id', $kampret)->get()->toArray();

        return view('resepsionis', compact('shows'));
    }

    // public function search(Request $request)
    // {
    //     $resepsi = new Resepsi();
    // }
}
