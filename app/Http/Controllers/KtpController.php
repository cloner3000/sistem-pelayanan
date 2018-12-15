<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ktp;
use Auth;
use PDF;
use App\Struktur;
use DB;
use Excel;
use App\User;

use App\Skk;
use App\Spp;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
use App\Pekerjaan;
class KtpController extends Controller
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
        
        $datas = Ktp::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        
        $datas = Ktp::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Ktp::whereRaw('status = "acc"')
                  ->select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();

        $user = User::whereHas('roles',function($q){
                    $q->where('name','Kepala Desa');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Sekretaris Desa');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Pelayanan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Pemerintahan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Kesejahteraan');
                })->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.ktp.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.ktp.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        $datas = Ktp::whereRaw('YEAR(created_at) ='.$q[0])->whereRaw('MONTH(created_at) ='.$q[1])->get();
        return Excel::loadView('excel.ktp',compact('datas'))
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
    public function show($id,$user_id)
    {
        $data   = Ktp::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        $r = $user->roles->first()->name;
        if ($r == 'Kepala Desa') {
            $pdf   = PDF::loadView('pdf.kades.ktp',compact('data','user'))->setPaper('a4','portrait');
        }elseif (
            $r == 'Sekretaris Desa' || $r == 'Kepala Seksi Pelayanan' || 
            $r == 'Kepala Seksi Pemerintahan' || $r == 'Kepala Seksi Kesejahteraan'
        ){
            $pdf   = PDF::loadView('pdf.perwakilan.ktp',compact('data','user'))->setPaper('a4','portrait');
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
