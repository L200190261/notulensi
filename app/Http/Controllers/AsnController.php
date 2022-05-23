<?php

namespace App\Http\Controllers;

use App\Models\asn;
use App\Models\User;
use App\Models\bidang;
use App\Models\jabatan;
use App\Models\instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asn = asn::all();
        return view('asn.index', compact('asn'), [
            "title" => "ASN",
            "active" => "ASN"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('asn.create', [
            "jabatan" => jabatan::all(),
            "instansi" => instansi::all(),
            "bidang" => bidang::all(),
            "username" => User::all()->where('role', 'ASN'),
            "title" => "ASN",
            "active" => "ASN"
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
            'nip' => ['min:3', 'max:255'],
            'id_jabatan' => '',
            'id_instansi' => ['required'],
            'id_bidang' => ['required'],
        ]);
        $validateData = ([
            'username' => $request->username,
            'password' => $request->password,
            'role' => 'ASN'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        $cek = User::create($validateData);
        $usernew = User::select('*')->where('username', '=', $validateData['username'])->first();
        $validateDataASN = ([
            'nama' => $request->nama,
            'user_id' => $usernew->id,
            'nip' => $request->nip,
            'id_jabatan' => $request->id_jabatan,
            'id_instansi' => $request->id_instansi,
            'id_bidang' => $request->id_bidang,
        ]);
        asn::create($validateDataASN);
        return redirect('/asn')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_asn)
    {
        $data = asn::select('*')->where('id_asn', $id_asn)->get();
        return view('asn.edit', compact('data'), [
            "title" => "ASN",
            "active" => "ASN",
            "jabatan" => jabatan::all(),
            "instansi" => instansi::all(),
            "bidang" => bidang::all(),
            "user" => User::all()->where('role', 'ASN')
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
    public function update(Request $request, $id_asn)
    {

        $data = asn::where('id_asn', $request->id_asn)->update([
            'id_instansi' => $request->id_instansi,
            'id_bidang' => $request->id_bidang,
            'nama' => $request->nama,
            'id_jabatan' => $request->id_jabatan,
            'nip' => $request->nip,
        ]);
        return redirect('/asn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_asn)
    {
        $asn = asn::where('id_asn', $id_asn)->delete();
        return redirect('/asn');
    }
}
