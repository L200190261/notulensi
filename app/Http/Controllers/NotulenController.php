<?php

namespace App\Http\Controllers;

use App\Models\asn;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Rapat;
use App\Models\nonasn;
use App\Models\Notulen;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class NotulenController extends Controller
{
    public function index()
    {
        $notulen = Notulen::select('*')->where('user_id', '=', auth()->user()->id)->get();
        $user = User::all();
        return view('notulen.index', compact('notulen'), [
            "title" => "Notulensi",
            "active" => "Notulensi",
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = auth()->user()->role;
        if ($status == 'ASN') {
            $id_user = auth()->user()->id;
            $pengguna = asn::where('user_id', '=', $id_user)->first();
            $rapat = Rapat::select('*')->where('id_asn', 'LIKE', '%' . $pengguna->nama . '%')->get();
            //$rapat = Rapat::where('id_asn', 'LIKE', '%Deden%')->where('tanggal', '<=', Carbon::now())->get();
            return view('notulen.create', [
                "rapat" => $rapat,
                "username" => User::all(), //->where('role', 'NON ASN')
                "title" => "Notulensi",
                "active" => "Notulensi"
            ]);
        }
        if ($status == 'NON ASN') {
            $id_user = auth()->user()->id;
            $pengguna = nonasn::where('user_id', '=', $id_user)->first();
            $rapat = Rapat::select('*')->where('id_non', 'LIKE', '%' . $pengguna->nama . '%')->get();
            //$rapat = Rapat::where('id_asn', 'LIKE', '%Deden%')->where('tanggal', '<=', Carbon::now())->get();
            return view('notulen.create', [
                "rapat" => $rapat,
                "username" => User::all(), //->where('role', 'NON ASN')
                "title" => "Notulensi",
                "active" => "Notulensi"
            ]);
        }
        if ($status == 'Administrator') {
            return view('notulen.create', [
                "rapat" => Rapat::all(),
                "username" => User::all(), //->where('role', 'NON ASN')
                "title" => "Notulensi",
                "active" => "Notulensi"
            ]);
        }
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
            'user_id' => ['required'],
            'id_rapat' => ['required'],
            'tempat' => '',
            'hari' => '',
            'tanggal' => '',
            'jam' => '',
            'keterangan' => '',
            'isi' => ['required'],
            'status' => ['required'],
            'file' => ['required']
        ]);

        if ($request->file('file')) {
            $validateData['file'] = $request->file('file')->store('file-notulensi');
        }

        $data = Rapat::select('*')->where('id_rapat', $request->id_rapat)->first();
        $validateData['tempat'] = $data->tempat;
        $validateData['hari'] = $data->hari;
        $validateData['tanggal'] = $data->tanggal;
        $validateData['jam'] = $data->jam;
        $validateData['keterangan'] = $data->keterangan;

        if ($request->status == 'Publish') {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHtml($validateData['isi']);
            $path = storage_path('app/public/file-hasil');
            $fileName = $validateData['keterangan'] . date('dmYhis') . '.' . 'pdf';
            $pdf->save($path . '/' . $fileName);
            $path2 = 'file-hasil/' . $fileName;
            notulen::create($validateData);
            $data2 = Notulen::select('*')->where('file', '=', $validateData['file'])->first();
            $hasil1 = [
                'id_rapat' => $validateData['id_rapat'],
                'id_notulen' => $data2->id_notulen,
                'notulen' => $path2
            ];
            hasil::create($hasil1);
        } else {
            notulen::create($validateData);
            return redirect('/notulensi')->with('success', 'pengguna baru berhasil ditambahkan!');
        }

        return redirect('/notulensi')->with('success', 'pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_notulensi)
    {
        $data = notulen::select('*')->where('id_notulen', $id_notulensi)->get();
        return view('notulen.edit', compact('data'), [
            "title" => "Notulensi",
            "active" => "Notulensi",
            "rapat" => Rapat::all(),
            "user" => User::all()   //->where('role', 'NON ASN')
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
    public function update(Request $request, $id_notulensi)
    {
        // if ($request->file('file')) {
        //     // if ($request->oldFile) {
        //     //     Storage::delete($request->oldFile);
        //     // }
        //     $validateData = $request->file('file')->store('file-notulensi');
        // } else {
        //     $validateData = $request->file;
        // }

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $file = $request->file('file')->store('file-notulensi');
            $data = notulen::where('id_notulen', $id_notulensi)->update([
                'id_rapat' => $request->id_rapat,
                'isi' => $request->isi,
                'status' => $request->status,
                'file' => $file
            ]);
            return redirect('/notulensi');
        } else {
            $data = notulen::where('id_notulen', $id_notulensi)->update([
                'id_rapat' => $request->id_rapat,
                'isi' => $request->isi,
                'status' => $request->status,
                'file' => $request->oldFile
            ]);
            return redirect('/notulensi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_notulensi, Notulen $notulen)
    {
        $notulen = notulen::where('id_notulen', $id_notulensi)->first();
        if ($notulen->file) {
            Storage::delete($notulen->file);
        }
        $delete = notulen::where('id_notulen', $id_notulensi)->delete();
        return redirect('/notulensi');
    }
}
