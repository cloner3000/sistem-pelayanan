<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ktp;
use Auth;
use PDF;
use App\Struktur;
use DB;
class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Ktp::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req)
    {
        $datas = Ktp::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Ktp::whereRaw('status = "acc"')
                  ->select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.indexAcc',compact('datas','export'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.indexAcc',compact('datas','export'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Ktp::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $data = Ktp::whereRaw('YEAR(created_at) ='.$q[0])->whereRaw('MONTH(created_at) ='.$q[1])->get();
        dd($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $ktp =  Ktp::create([
                    'user_id' => Auth::id(),
                    'provinsi' => $request->input('provinsi'),
                    'kabupaten' => $request->input('kabupaten'),
                    'kecamatan' => $request->input('kecamatan'),
                    'desa' => $request->input('desa'),
                    'nama' => $request->input('nama'),
                    'permohonan' => $request->input('permohonan'),
                    'no_kk' => $request->input('no_kk'),
                    'nik' => $request->input('nik'),
                    'alamat' => $request->input('alamat'),
                ]);
        $ktp->save();
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
        $s      = Struktur::where('jabatan','Sekertaris')->first()->nama;
        $data   = Ktp::findOrFail($id);
        $pdf    = PDF::loadView('pdf.ktp', compact('data','s'));
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
        $data = Ktp::findOrFail($id);

        $data->nik              = $request->input('nik');
        $data->nama             = $request->input('nama');
        $data->no_kk            = $request->input('no_kk');
        $data->alamat           = $request->input('alamat');

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
        $hapus = Ktp::findOrFail($id);
        $hapus->delete();
        return back();
    }
}
