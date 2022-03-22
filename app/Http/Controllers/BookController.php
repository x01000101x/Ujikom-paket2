<?php

namespace App\Http\Controllers;

use App\Models\Resepsi;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function get()
    {
        // $users = Resepsi::join('kamars', 'users.id', '=', 'posts.user_id')
        //     ->get(['users.*', 'posts.descrption']);
    }

    public function kocho()
    {
    }

    public function show(Request $request)
    {
        $auth = Auth::user();

        date_default_timezone_set('Asia/Jakarta');

        $data = DB::table('kamars')->select('id', 'tipe', 'avail')->get();

        $date1 = $request->date1;
        $date2 = $request->date2;
        $jumlah = $request->jumlah;

        $conv_date1 = strtotime($date1);
        $conv_date2 = strtotime($date2);

        $kamar_avail = DB::table('kamars')->sum('avail');

        // dd($conv_date1);
        $konversi = date('Y-m-d');
        // $unixtime = strtotime($konversi);

        // dump($date1);
        // dump($date2);
        // dump($konversi);
        // dd($date2 >= $konversi);
        // dd(date("m/d/Y h:i:s A T", $unixtime));
        // dd($request->date2);
        // dd($date2);

        // dd($date2 < date('Y-m-d', strtotime('+3 month' . $date2)));

        // echo date('m-d-Y', strtotime('+3 month'));

        if ($jumlah && $date1 && $date2) {
            if ($date1 >= $konversi && $date2 >= $konversi) {
                if ($date1 != $date2) {

                    if ($date2 <= date('Y-m-d', strtotime('+3 month' . $date2))) {

                        if ($kamar_avail <= 0) {
                            if (!$auth) {
                                echo "<script>
                            alert('Maaf kamar kosong');
                            window.location.href='/';
                            </script>";
                            } else {
                                echo "<script>
                            alert('Maaf kamar kosong');
                            window.location.href='/abc';
                            </script>";
                            }
                        } else { #
                            return view('apply', compact('date1', 'date2', 'jumlah', 'data'));
                        }
                    } else {
                        if (!$auth) {
                            echo "<script>
                            alert('Mohon jangan melebihi 3 bulan');
                            window.location.href='/';
                            </script>";
                        } else {
                            echo "<script>
                        alert('Mohon jangan melebihi 3 bulan');
                        window.location.href='/abc';
                        </script>";
                        }
                    }
                } else {
                    echo "<script>
                alert('Maaf minimal pesan untuk 1 hari');
                window.location.href='/abc';
                </script>";
                }
            } elseif ($date1 > $date2 && $date2 < $date1) {
                if (!$auth) {
                    echo "<script>
                        alert('Mohon input tanggal yang benar');
                        window.location.href='/';
                        </script>";
                } else {
                    echo "<script>
                    alert('Mohon input tanggal yang benar');
                    window.location.href='/abc';
                    </script>";
                }
            } else {
                if (!$auth) {
                    echo "<script>
                        alert('Maaf kamar kosong');
                        window.location.href='/';
                        </script>";
                } else {
                    echo "<script>
                    alert('Maaf kamar kosong');
                    window.location.href='/abc';
                    </script>";
                }
            }
        } else {
            if (!$auth) {
                echo "<script>
                    alert('Maaf tolong input yang benar');
                    window.location.href='/';
                    </script>";
            } else {
                echo "<script>
                alert('Maaf tolong input yang benar');
                window.location.href='/abc';
                </script>";
            }
        }


        // $begin = new DateTime('2010-05-01');
        // $end = new DateTime('2010-05-10');

        // $interval = DateInterval::createFromDateString('1 day');
        // $period = new DatePeriod($begin, $interval, $end);

        // foreach ($period as $dt) {
        //     echo $dt->format("l Y-m-d H:i:s\n");
        // }


        // foreach (Resepsi::all() as $resep) {
        //     if ($jumlah <= $resep->avail) {
        //         return view('apply', compact('date1', 'date2', 'jumlah'));
        //     } else {
        //         return view('');
        //         // return back()->with('danger', 'Gagal, Kamar tidak tersedia.');
        //     }
        // }
    }
}
