<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\bidang;
use App\Models\nonasn;
use App\Models\instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NonasnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nonasn = nonasn::all();
        return view('nonasn.index', compact('nonasn'), [
            "title" => "Non ASN",
            "active" => "Non ASN"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nonasn.create', [
            "instansi" => instansi::all(),
            "bidang" => bidang::all(),
            "username" => User::all()->where('role', 'NON ASN'),
            "title" => "Non ASN",
            "active" => "Non ASN"
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
        $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'role' => '',
            'nama' => ['required', 'min:3', 'max:255'],
            'id_instansi' => ['required'],
            'id_bidang' => ['required'],
        ]);
        $validateData = ([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'NON ASN'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        $cek = User::create($validateData);
        $usernew = User::select('*')->where('username', '=', $validateData['username'])->first();
        $validateDataNonASN = ([
            'nama' => $request->nama,
            'user_id' => $usernew->id,
            'id_instansi' => $request->id_instansi,
            'id_bidang' => $request->id_bidang,
        ]);
        nonasn::create($validateDataNonASN);
        return redirect('/nonasn')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_non)
    {
        $data = nonasn::select('*')->where('id_non', $id_non)->get();
        return view('nonasn.edit', compact('data'), [
            "title" => "Non ASN",
            "active" => "Non ASN",
            "instansi" => instansi::all(),
            "bidang" => bidang::all(),
            "user" => User::all()->where('role', 'NON ASN')
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
    public function update(Request $request, $id_non)
    {
        $data = nonasn::where('id_non', $request->id_non)->update([
            'id_instansi' => $request->id_instansi,
            'id_bidang' => $request->id_bidang,
            'nama' => $request->nama,
        ]);
        return redirect('/nonasn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_non)
    {
        $nonasn = nonasn::where('id_non', $id_non)->delete();
        return redirect('/nonasn');
    }
}
