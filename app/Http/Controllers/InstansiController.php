<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instansi;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instansi = instansi::all();
        return view('instansi.index', compact('instansi'),[
            "title" => "Instansi",
            "active" => "Instansi"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instansi.create', [
            "title" => "Instansi",
            "active" => "Instansi"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_in' => ['required', 'min:3', 'max:255']
        ]);
        instansi::create($validateData);
        return redirect('/instansi')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_instansi)
    {
        $data = instansi::select('*')->where('id_instansi', $id_instansi)->get();
        return view('instansi.edit', compact('data'),[
            "title" => "Instansi",
            "active" => "Instansi"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = instansi::where('id_instansi', $request->id_instansi)->update([
            'nama_in' => $request->nama_in
        ]);
        return redirect('/instansi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_instansi)
    {
        {
            $ins = instansi::where('id_instansi', $id_instansi)->delete();
            return redirect('/instansi');
        }
    }
}
