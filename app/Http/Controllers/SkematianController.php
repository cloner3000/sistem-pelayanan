<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skematian;
use Auth;
use PDF;
use App\User;
use DB;
use Excel;
use App\Pekerjaan;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Sktm;
use App\Sptjm;
class SkematianController extends Controller
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
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $ps = Pekerjaan::all();
        $datas = Skematian::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.skematian.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skematian.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $ps = Pekerjaan::all();
        $datas = Skematian::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Skematian::whereRaw('status = "acc"')
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
            return view('kades.skematian.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skematian.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Skematian::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Skematian::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.skematian',compact('datas'))
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
        $data = Skematian::create([
            'user_id'         => Auth::id(),
            'nama'            => $request->input('nama'),
            'nik'             => $request->input('nik'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'tanggal_lahir'   => date('Y-m-d',strtotime($request->input('tanggal_lahir'))),
            'agama'           => $request->input('agama'),
            'alamat'          => $request->input('alamat'),
            'waktu'           => date('Y-m-d',strtotime($request->input('waktu'))),
            'tempat'          => $request->input('tempat'),
            'penyebab'        => $request->input('penyebab'),
            'p_nik'           => $request->input('p_nik'),
            'p_nama'          => $request->input('p_nama'),
            'p_tanggal'       => date('Y-m-d',strtotime($request->input('p_tanggal'))),
            'p_tempat'        => $request->input('p_tempat'),
            'p_pekerjaan'     => $request->input('p_pekerjaan'),
            'p_alamat'        => $request->input('p_alamat'),
            'p_pekerjaan'     => $request->input('p_pekerjaan'),
            'p_hubungan'      => $request->input('p_hubungan'),
        ]);

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Surat Kematian berhasil dibuat');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Surat Kematian gagal dibuat');
        }
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
        $data = Skematian::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        $r = $user->roles->first()->name;

        if ($r == 'Kepala Desa') {
            $pdf   = PDF::loadView('pdf.kades.kematian',compact('data','user'))->setPaper('a4','portrait');
        }elseif (
            $r == 'Sekretaris Desa' || $r == 'Kepala Seksi Pelayanan' || 
            $r == 'Kepala Seksi Pemerintahan' || $r == 'Kepala Seksi Kesejahteraan'
        ){
            $pdf   = PDF::loadView('pdf.perwakilan.kematian',compact('data','user'))->setPaper('a4','portrait');
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
        $data= Skematian::findOrFail($id);
        $data->nama            = $request->input('nama');
        $data->nik             = $request->input('nik');
        $data->jenis_kelamin   = $request->input('jenis_kelamin');
        $data->tanggal_lahir   = date('Y-m-d',strtotime($request->input('tanggal_lahir')));
        $data->agama           = $request->input('agama');
        $data->alamat          = $request->input('alamat');

        $data->waktu           = date('Y-m-d',strtotime($request->input('waktu')));
        $data->tempat          = $request->input('tempat');
        $data->penyebab        = $request->input('penyebab');

        $data->p_nik           = $request->input('p_nik');
        $data->p_nama          = $request->input('p_nama');
        $data->p_tanggal       = date('Y-m-d',strtotime($request->input('p_tanggal')));
        $data->p_tempat        = $request->input('p_tempat');
        $data->p_pekerjaan     = $request->input('p_pekerjaan');
        $data->p_alamat        = $request->input('p_alamat');
        $data->p_pekerjaan     = $request->input('p_pekerjaan');
        $data->p_hubungan      = $request->input('p_hubungan');

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
        $data = Skematian::findOrFail($id);
        $data->delete();
        return back();
    }
}
