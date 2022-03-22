<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;


class KamarController extends Controller
{
    public function index()
    {
        $Kamar = new Kamar();

        $datas = $Kamar::select('*')->get()->toArray();

        return view('kamar', compact('datas'));
    }
}
