<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sptjm;
use Auth;
use DB;
use PDF;
use Excel;
use App\User;
use App\Pekerjaan;

use App\Ktp;
use App\Skk;
use App\Spp;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
class SptjmController extends Controller
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
        $datas = Sptjm::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sptjm.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sptjm.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        $datas = Sptjm::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Sptjm::whereRaw('status = "acc"')
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
            return view('kades.sptjm.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sptjm.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Sptjm::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Sptjm::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.sptjm',compact('datas'))
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
    public function show($id,$user_id)
    {
        $data = Sptjm::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        $r = $user->roles->first()->name;
        if ($r == 'Kepala Desa') {
            $pdf   = PDF::loadView('pdf.kades.sptjm',compact('data','user'))->setPaper('legal','portrait');
        }elseif (
            $r == 'Sekretaris Desa' || $r == 'Kepala Seksi Pelayanan' || 
            $r == 'Kepala Seksi Pemerintahan' || $r == 'Kepala Seksi Kesejahteraan'
        ){
            $pdf   = PDF::loadView('pdf.perwakilan.sptjm',compact('data','user'))->setPaper('legal','portrait');
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
