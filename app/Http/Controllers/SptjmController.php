<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sptjm;

class SptjmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $req)
    {
        $datas = Sptjm::with('user')->where('status','pending')->paginate(10);
        return view('admin.sptjm.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    public function indexAcc(Request $req)
    {
        $datas = Sptjm::with('user')->where('status','acc')->paginate(10);
        return view('admin.sptjm.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    public function acc(Request $req)
    {
        $data = Sptjm::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return redirect()->route('sptjm.acc');
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
        $data = Sptjm::findOrFail($id);

        $data->nama       = $request->input('nama');
        $data->nik        = $request->input('nik');
        $data->tempat     = $request->input('tempat');
        $data->tanggal    = $request->input('tanggal');
        $data->pekerjaan  = $request->input('pekerjaan');
        $data->alamat     = $request->input('alamat');
        
        $data->nama1      = $request->input('nama1');
        $data->nik1       = $request->input('nik1');
        $data->tempat1    = $request->input('tempat1');
        $data->tanggal1   = $request->input('tanggal1');
        $data->pekerjaan1 = $request->input('pekerjaan1');
        $data->alamat1    = $request->input('alamat1');
        
        $data->nama2      = $request->input('nama2');
        $data->nik2       = $request->input('nik2');
        $data->tempat2    = $request->input('tempat2');
        $data->tanggal2   = $request->input('tanggal2');
        $data->pekerjaan2 = $request->input('pekerjaan2');
        $data->alamat2    = $request->input('alamat2');
        
        $data->s1_nama    = $request->input('s1_nama');
        $data->s1_nik     = $request->input('s1_nik');
        
        $data->s1_nama    = $request->input('s1_nama');
        $data->s1_nik     = $request->input('s1_nik');

        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Sptjm::findOrFail($id);
        $hapus->delete();
        return back();
    }
}
