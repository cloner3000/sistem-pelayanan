<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sk;
use App\User;
use Carbon\Carbon;
use PDF;
use DB;
use Excel;
use App\Pekerjaan;

use App\Ktp;
use App\Skk;
use App\Spp;
use App\Pengaduan;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
class SkController extends Controller
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
        $datas = Sk::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sk.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sk.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        
        $ps = Pekerjaan::all();
        $datas = Sk::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Sk::whereRaw('status = "acc"')
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
            return view('kades.sk.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sk.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Sk::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Sk::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.sk',compact('datas'))
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
    public function store(Request $r)
    {
        $sk = Sk::create([
            'user_id'    => Auth::id(),
            
            'nama'            => $r->input('nama'),
            'nik'             => $r->input('nik'),
            'jenis_kelamin'   => $r->input('jenis_kelamin'),
            'tempat'          => $r->input('tempat'),
            'tanggal'         => date('Y-m-d',strtotime($r->input('tanggal'))),
            'pekerjaan'       => $r->input('pekerjaan'),
            'alamat'          => $r->input('alamat'),
            'kewarganegaraan' => $r->input('kewarganegaraan'),
            'agama'           => $r->input('agama'),
            'keperluan'       => $r->input('keperluan'),
            'keterangan'      => $r->input('keterangan')
        ]);

        $sk->save();
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
        $data = Sk::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        $r = $user->roles->first()->name;
        if ($r == 'Kepala Desa') {
            $pdf   = PDF::loadView('pdf.kades.sk',compact('data','user'))->setPaper('a4','portrait');
        }elseif (
            $r == 'Sekretaris Desa' || $r == 'Kepala Seksi Pelayanan' || 
            $r == 'Kepala Seksi Pemerintahan' || $r == 'Kepala Seksi Kesejahteraan'
        ){
            $pdf   = PDF::loadView('pdf.perwakilan.sk',compact('data','user'))->setPaper('a4','portrait');
        }else{
            return abort(404);
        }
        return $pdf->stream($data->nama.'.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $data = Sk::findOrFail($id);

            $data->nama            = $r->input('nama');
            $data->nik             = $r->input('nik');
            $data->jenis_kelamin   = $r->input('jenis_kelamin');
            $data->tempat          = $r->input('tempat');
            $data->tanggal         = date('Y-m-d',strtotime($r->input('tanggal')));
            $data->pekerjaan       = $r->input('pekerjaan');
            $data->alamat          = $r->input('alamat');
            $data->kewarganegaraan = $r->input('kewarganegaraan');
            $data->agama           = $r->input('agama');
            $data->keperluan       = $r->input('keperluan');
            $data->keterangan      = $r->input('keterangan');

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
        $data = Sk::findOrFail($id);
        $data->delete();
        return back();
    }
}
