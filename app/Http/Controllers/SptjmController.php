<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sptjm;
use Auth;
use PDF;
class SptjmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $req)
    {
        $datas = Sptjm::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sptjm.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sptjm.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req)
    {
        $datas = Sptjm::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sptjm.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sptjm.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Sptjm::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
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
    public function store(Request $r)
    {
        $sptjm = Sptjm::create([
            'user_id'    => Auth::id(),
            
            'nama'       => $r->input('nama'),
            'nik'        => $r->input('nik'),
            'tempat'     => $r->input('tempat'),
            'tanggal'    => date('Y-m-d',strtotime($r->input('tanggal'))),
            'pekerjaan'  => $r->input('pekerjaan'),
            'alamat'     => $r->input('alamat'),
            
            'nama1'      => $r->input('nama1'),
            'nik1'       => $r->input('nik1'),
            'tempat1'    => $r->input('tempat1'),
            'tanggal1'   => date('Y-m-d',strtotime($r->input('tanggal1'))),
            'pekerjaan1' => $r->input('pekerjaan1'),
            'alamat1'    => $r->input('alamat1'),
            
            'nama2'      => $r->input('nama2'),
            'nik2'       => $r->input('nik2'),
            'tempat2'    => $r->input('tempat2'),
            'tanggal2'   => date('Y-m-d',strtotime($r->input('tanggal2'))),
            'pekerjaan2' => $r->input('pekerjaan2'),
            'alamat2'    => $r->input('alamat2'),

            's1_nama'    => $r->input('s1_nama'),
            's1_nik'     => $r->input('s1_nik'),
            's2_nama'    => $r->input('s2_nama'),
            's2_nik'     => $r->input('s2_nik')
        ]);

        $sptjm->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sptjm::findOrFail($id);
        $pdf   = PDF::loadView('pdf.sptjm',compact('data'))->setPaper('legal','portrait');
        return $pdf->stream($data->nama.'.pdf');
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
        $data->tanggal    = date('Y-m-d',strtotime($request->input('tanggal')));
        $data->pekerjaan  = $request->input('pekerjaan');
        $data->alamat     = $request->input('alamat');
        
        $data->nama1      = $request->input('nama1');
        $data->nik1       = $request->input('nik1');
        $data->tempat1    = $request->input('tempat1');
        $data->tanggal1   = date('Y-m-d',strtotime($request->input('tanggal1')));
        $data->pekerjaan1 = $request->input('pekerjaan1');
        $data->alamat1    = $request->input('alamat1');
        
        $data->nama2      = $request->input('nama2');
        $data->nik2       = $request->input('nik2');
        $data->tempat2    = $request->input('tempat2');
        $data->tanggal2   = date('Y-m-d',strtotime($request->input('tanggal2')));
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
