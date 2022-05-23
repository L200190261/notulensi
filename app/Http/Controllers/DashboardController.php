<?php

namespace App\Http\Controllers;

use App\Models\asn;
use App\Models\bidang;
use App\Models\Hasil;
use App\Models\instansi;
use App\Models\jabatan;
use App\Models\nonasn;
use App\Models\Notulen;
use App\Models\Rapat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $status = auth()->user()->role;

        if ($status == 'Administrator') {
            $pengguna = User::count();
            $asn = asn::count();
            $nonasn = nonasn::count();
            $rapat = Rapat::count();
            $notulen = Notulen::count();
            $hasil = Hasil::count();
            $bidang = bidang::count();
            $jabatan = jabatan::count();
            $instansi = instansi::count();
            return view('dashboard.index', [
                "title" => "Dashboard",
                "active" => "Dashboard",
                "pengguna" => $pengguna,
                "asn" => $asn,
                "nonasn" => $nonasn,
                "rapat" => $rapat,
                "notulen" => $notulen,
                "hasil" => $hasil,
                "bidang" => $bidang,
                "jabatan" => $jabatan,
                "instansi" => $instansi,
            ]);
        }

        if ($status == 'ASN') {
            $id_user = auth()->user()->id;
            $pengguna = asn::where('user_id', '=', $id_user)->first();
            $rapat = Rapat::select('*')->where('id_asn', 'LIKE', '%' . $pengguna->nama . '%')->where('tanggal', '>=', Carbon::yesterday())->get();
            $rapat2 = Rapat::select('*')->where('id_asn', 'LIKE', '%' . $pengguna->nama . '%')->get();
            $arr = [];
            for ($x = 0; $x <= count($rapat2) - 1; $x++) {
                $arr[] = Hasil::select('*')->where('id_rapat', '=', $rapat2[$x]->id_rapat)->get();
            }
            //$rapat = Rapat::where('id_asn', 'LIKE', '%Deden%')->where('tanggal', '<=', Carbon::now())->get();
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'rapat' => $rapat,
                'hasil' => $arr,
                'asn' => $pengguna
            ]);
        }

        if ($status == 'NON ASN') {
            $id_user = auth()->user()->id;
            $pengguna = nonasn::where('user_id', '=', $id_user)->first();
            $rapat = Rapat::select('*')->where('id_non', 'LIKE', '%' . $pengguna->nama . '%')->where('tanggal', '>=', Carbon::yesterday())->get();
            $rapat2 = Rapat::select('*')->where('id_non', 'LIKE', '%' . $pengguna->nama . '%')->get();
            $arr = [];
            for ($x = 0; $x <= count($rapat2) - 1; $x++) {
                $arr[] = Hasil::select('*')->where('id_rapat', '=', $rapat2[$x]->id_rapat)->get();
            }
            //$rapat = Rapat::where('id_asn', 'LIKE', '%Deden%')->where('tanggal', '<=', Carbon::now())->get();
            return view('dashboard.index', [
                'title' => 'Dashboard',
                'active' => 'Dashboard',
                'rapat' => $rapat,
                'hasil' => $arr,
                'nonasn' => $pengguna
            ]);
        }
    }
}
