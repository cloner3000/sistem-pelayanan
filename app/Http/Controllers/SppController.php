<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
use Auth;
use PDF;
use DB;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Spp::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.spp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.spp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req)
    {
        $datas = Spp::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Spp::select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.spp.indexAcc',compact('datas','export'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.spp.indexAcc',compact('datas','export'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Spp::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $spp = Spp::create([
                    'user_id' => Auth::id(),
                    'nik' => $request->input('nik'),
                    'nama' => $request->input('nama'),
                    'no_kk' => $request->input('no_kk'),
                    'kepala_keluarga' => $request->input('kepala_keluarga'),
                    'alamat_sekarang' => $request->input('alamat_sekarang'),
                    'alamat_tujuan' => $request->input('alamat_tujuan'),
                    'jumlah_pindah' => $request->input('jumlah_pindah'),
                ]);
        
        $spp->save();
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
        $data = Spp::findOrFail($id);
        $pdf = PDF::loadView('pdf.spp',compact('data'));
        return $pdf->stream($data->nama.".pdf");
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
        $hapus = Spp::findOrFail($id);
        $hapus->delete();
        return back();
    }
}
