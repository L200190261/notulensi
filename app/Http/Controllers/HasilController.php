<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $hasil = Hasil::all();
        return view('hasil.index', compact('hasil'), [
            "title" => "Hasil",
            "active" => "Hasil"
        ]);
    }

    public function download($id_hasil)
    {
        $data = Hasil::where('id_hasil', '=', $id_hasil)->first();
        return response()->download('storage/' . $data->notulen);
    }
}
