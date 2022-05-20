<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resepsi;
use App\Models\Kamar;
use App\Models\Resepsi_log;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function download()
    {
        $id = auth()->id();

        $resepsi = new Resepsi();
        $kamar = new Kamar();

        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->where("id_user", $id)->get()->toArray();

        $pdf = PDF::loadView('unduh', compact('datas'));

        return $pdf->download('reservasi-hotel-hebat.pdf');
    }

    public function download_log()
    {
        $log = new Resepsi_log();
        $kamar = new Kamar();


        $datas = $kamar::join('resepsis', "kamars.id", "resepsis.id_kamar")
            ->get()->toArray();

        $pdf = PDF::loadView('report', compact('datas'));

        return $pdf->download('report-' . date('F') . '-' . date('d'));
    }
}
