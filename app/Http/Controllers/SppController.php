<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Spp::with('user')->paginate(10);
        return view('admin.spp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = Spp::findOrFail($id);

        $data->nik              = $request->input('nik');
        $data->nama             = $request->input('nama');
        $data->no_kk            = $request->input('no_kk');
        $data->kepala_keluarga  = $request->input('kepala_keluarga');
        $data->alamat_sekarang  = $request->input('alamat_sekarang');
        $data->alamat_tujuan    = $request->input('alamat_tujuan');
        $data->jumlah_pindah    = $request->input('jumlah_pindah');

        $data->save();
        return redirect()->route('spp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
