<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengaduan;
use Auth;
use DB;
use Excel;
use App\User;
use App\Pekerjaan;
use PDF;

use App\Ktp;
use App\Skk;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
class PengaduanController extends Controller
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
        $datas = Pengaduan::where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.pengaduan.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.pengaduan.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*1);
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
        $datas = Pengaduan::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Pengaduan::whereRaw('status = "acc"')
                  ->select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();

        $user = User::whereHas('roles',function($q){
                    $q->where('name','Kepala Desa');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Sekretaris Desa');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Urusan Administrasi Umum');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Urusan Keuangan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Urusan Perencanaan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Pelayanan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Pemerintahan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Seksi Kesejahteraan');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Dusun Malinggut 1');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Dusun Malinggut 2');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Dusun Malinggut 3');
                })->orWhereHas('roles',function($q){
                    $q->where('name','Kepala Dusun Sukamaju');
                })->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.pengaduan.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.pengaduan.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Pengaduan::findOrFail($req->id);

        $data->status = "acc";

        if ($data->save()){
            session()->flash('status','Sukses');
            session()->flash('pesan','Pengaduan berhasil di terima');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Pengaduan gagal di terima');
        }
        return back();
    }
    
    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Pengaduan::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.pengaduan',compact('datas'))
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
    public function store(Request $req)
    {
        $data = Pengaduan::create([
            'user_id' => Auth::id(),
            'nama' => $req->input('nama'),
            'nik' => $req->input('nik'),
            'tanggal_lahir' => date('Y-m-d',strtotime($req->input('tanggal_lahir'))),
            'pekerjaan' => $req->input('pekerjaan'),
            'alamat' => $req->input('alamat'),
            'sasaran' => $req->input('sasaran'),
            'isi' => $req->input('isi'),
            'alternatif' => $req->input('alternatif'),
        ]);

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Data Pengaduan berhasil dibuat');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Data Pengaduan gagal dibuat');
        }
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
      $data = Pengaduan::findOrFail($id);
      return PDF::loadView('pdf.pengaduan',compact('data'))->setPaper('a4','potrait')->stream($data->nama.'.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengaduan::findOrFail($id);
        if ($data->delete()){
            session()->flash('status','Sukses');
            session()->flash('pesan','Pengaduan berhasil di hapus');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Pengaduan gagal di hapus');
        }
        return back();
    }
}
