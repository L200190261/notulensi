<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = jabatan::all();
        return view('jabatan.index', compact('jabatan'),[
            "title" => "Jabatan",
            "active" => "Jabatan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create', [
            "title" => "Jabatan",
            "active" => "Jabatan"
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
            'nama_jab' => ['required', 'min:3', 'max:255']
        ]);
        jabatan::create($validateData);
        return redirect('/jabatan')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jabatan)
    {
        $data = jabatan::select('*')->where('id_jabatan', $id_jabatan)->get();
        return view('jabatan.edit', compact('data'),[
            "title" => "Jabatan",
            "active" => "Jabatan"
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
        $data = jabatan::where('id_jabatan', $request->id_jabatan)->update([
            'nama_jab' => $request->nama_jab
        ]);
        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jabatan)
    {
        $jab = jabatan::where('id_jabatan', $id_jabatan)->delete();
        return redirect('/jabatan');
    }
}
