<?php

namespace App\Http\Controllers;

use App\Models\Resepsi;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AnyController extends Controller
{
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('landing');
    }

    public function getData()
    {
        $auth = Auth::user();

        $datas = Resepsi::select('*')->where('id_user', '=', $auth)->get()->toArray();
        // dd($datas);
        return view('layouts.default', compact('datas'));
    }
}
