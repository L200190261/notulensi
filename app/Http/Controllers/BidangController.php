<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bidang;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidang = bidang::all();
        return view('bidang.index', compact('bidang'),[
            "title" => "Bidang",
            "active" => "Bidang"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bidang.create', [
            "title" => "Bidang",
            "active" => "Bidang"
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
            'nama_bid' => ['required', 'min:3', 'max:255']
        ]);
        bidang::create($validateData);
        return redirect('/bidang')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_bidang)
    {
        $data = bidang::select('*')->where('id_bidang', $id_bidang)->get();
        return view('bidang.edit', compact('data'),[
            "title" => "Bidang",
            "active" => "Bidang"
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
    public function update(Request $request, $id_bidang)
    {
        $data = bidang::where('id_bidang', $request->id_bidang)->update([
            'nama_bid' => $request->nama_bid
        ]);
        return redirect('/bidang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bidang)
    {
        $bid = bidang::where('id_bidang', $id_bidang)->delete();
        return redirect('/bidang');
    }
}
