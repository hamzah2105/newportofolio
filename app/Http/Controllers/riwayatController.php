<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class riwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = riwayat::orderBy('info1', 'asc')->get();
        // dd($data);
        return view("dashboard.riwayat.index")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.riwayat.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);

        $request->validate(
            [
                'info1' => 'required',
                'info2' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'tgl_mulai.required' => 'Tanggal Mulai wajib diiisi',
                'info1.required' => 'Posisi wajib diisi',
                'info2.required' => 'Nama Perusahaan wajib diisi',
            ]
        );
        $data = [
            'info1' => $request->info1,
            'info2' => $request->info2,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        riwayat::create($data);

        return redirect()->route('riwayat.index')->with('success', 'berhasil menambahlan data riwayat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->first();
        return view('dashboard.riwayat.edit')->with('data', $data);
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

        $request->validate(
            [
                'info1' => 'required',
                'info2' => 'required',
                'tgl_mulai' => 'required',
            ],
            [
                'tgl_mulai.required' => 'Tanggal Mulai wajib diiisi',
                'info1.required' => 'Posisi wajib diisi',
                'info2.required' => 'Nama Perusahaan wajib diisi',
            ]
        );
        $data = [
            'info1' => $request->info1,
            'info2' => $request->info2,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        riwayat::where('id', $id)->update($data);

        return redirect()->route('riwayat.index')->with('success', 'berhasil mengubah data riwayat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    
    {
        $data = riwayat::where('id', $id)->delete();
        return redirect()->route('riwayat.index')->with('success','berhasil melakukan hapus data');
    }
}
