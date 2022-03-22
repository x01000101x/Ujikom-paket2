<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resepsi;
use App\Models\Kamar;
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

        return $pdf->download('resepsi-hotel-hebat.pdf');
    }
}
