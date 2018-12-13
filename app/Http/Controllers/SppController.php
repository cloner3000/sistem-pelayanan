<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spp;
use Auth;
use PDF;
use DB;
use Excel;
use App\User;
use App\Pekerjaan;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSpp       = Spp::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $ps = Pekerjaan::all();
        $datas = Spp::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.spp.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.spp.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req)
    {
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSpp       = Spp::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $datas = Spp::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Spp::whereRaw('status = "acc"')
                  ->select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();
        $user = User::whereHas('roles',function($q){
                    $q->where('role_id',3);
                })->orWhereHas('roles',function($q){
                    $q->where('role_id',2);
                })->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.spp.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.spp.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Spp::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Spp::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.spp',compact('datas'))
                        ->setTitle("Laporan Bulanan")
                        ->sheet(bulan($q[1]).'-'.$q[0])
                        ->export('xls');
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
        $user = User::with('roles')->findOrFail($user_id);
        if ($user->roles->first()->id == 3) {
            $pdf   = PDF::loadView('pdf.kades.spp',compact('data','user'))->setPaper('a4','portrait');
        }elseif ($user->roles->first()->id == 2){
            $pdf   = PDF::loadView('pdf.perwakilan.spp',compact('data','user'))->setPaper('a4','portrait');
        }else{
            return abort(404);
        }
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
