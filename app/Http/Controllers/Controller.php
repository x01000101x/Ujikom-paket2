<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Resepsi;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getData()
    {
        $auth = Auth::user();

        $datas = Resepsi::select('*')->where('id_user', '=', $auth)->get()->toArray();
        // dd($datas);
        return view('layouts.default', compact('datas'));
    }
}
