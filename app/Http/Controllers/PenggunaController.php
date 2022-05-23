<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('pengguna.index', [
        //     'pengguna' => User::all(),
        //     "title" => "Pengguna",
        //     "active" => "Pengguna"
        // ]);
        $pengguna = User::where('role', '=', 'Administrator')->get();
        return view('pengguna.index', compact('pengguna'), [
            "title" => "Pengguna",
            "active" => "Pengguna"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create', [
            "title" => "Pengguna",
            "active" => "Pengguna"
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
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'role' => 'Administrator'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        $cek = User::create($validateData);
        return redirect('/pengguna');

        // $add = new User;  
        // $add->username = $request->username;
        // $add->password = $request->password;
        // $add->role = $request->role;
        // $add->save();
        // return redirect("/pengguna");
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        $data = User::select('*')->where('id', $id_user)->get();
        return view('pengguna.edit', compact('data'), [
            "title" => "Pengguna",
            "active" => "Pengguna"
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        // User::where('id_user',$id)->update([
        //     'username' => 'required',
        //     'password' => 'required',
        //     'role' => 'required',
        // ]);
        // $data = User::find($id)->where('id_user', $id);
        // $data->username = $request->username;
        // $data->password = $request->password;
        // $data->role = $request->role;
        // $data->update();
        $data = User::where('id', $request->id_user)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        // User::destroy($pengguna->id_user);
        // return redirect('/pengguna')->with('success', 'pengguna baru berhasil ditambahkan!');
        $pengguna = User::where('id', $id_user)->delete();
        return redirect('/pengguna');
    }
}
