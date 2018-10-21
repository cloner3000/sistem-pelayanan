<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ktp;
use Auth;
use PDF;
use App\Struktur;
class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Ktp::with('user')->where('status','pending')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req)
    {
        $datas = Ktp::with('user')->where('status','acc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Ktp::findOrFail($req->id);

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
