<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sktm;
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
use App\Skematian;
use App\Sptjm;
class SktmController extends Controller
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
        $datas = Sktm::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sktm.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sktm.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        $datas = Sktm::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Sktm::whereRaw('status = "acc"')
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
            return view('kades.sktm.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sktm.indexAcc',compact('datas','user','export','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Sktm::findOrFail($req->id);

        $data->status = "acc";

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Pengajuan Surat Keterangan Tidak Mampu berhasil di terima');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Pengajuan Surat Keterangan Tidak Mampu gagal di terima');
        }
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Sktm::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.sktm',compact('datas'))
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
        $sktm = Sktm::create([
            'user_id'    => Auth::id(),
            
            'nama'            => $r->input('nama'),
            'nik'             => $r->input('nik'),
            'tempat'          => $r->input('tempat'),
            'tanggal'         => date('Y-m-d',strtotime($r->input('tanggal'))),
            'pekerjaan'       => $r->input('pekerjaan'),
            'jenis_kelamin'   => $r->input('jenis_kelamin'),
            'alamat'          => $r->input('alamat'),
            'kewarganegaraan' => $r->input('kewarganegaraan'),
            'agama'           => $r->input('agama'),
            'keperluan'       => $r->input('keperluan'),
            'n_ayah'          => $r->input('n_ayah'),
            'n_ibu'           => $r->input('n_ibu')
        ]);

        if ($sktm->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Surat Keterangan Tidak Mampu berhasil dibuat');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Surat Keterangan Tidak Mampu gagal dibuat');
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
        $data = Sktm::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        $r = $user->roles->first()->name;
        if ($r == 'Kepala Desa') {
            $pdf   = PDF::loadView('pdf.kades.sktm',compact('data','user'))->setPaper('a4','portrait');
        }elseif (
            $r == 'Sekretaris Desa' || $r == 'Kepala Seksi Pelayanan' || 
            $r == 'Kepala Seksi Pemerintahan' || $r == 'Kepala Seksi Kesejahteraan'
        ){
            $pdf   = PDF::loadView('pdf.perwakilan.sktm',compact('data','user'))->setPaper('a4','portrait');
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
        $data = sktm::findOrFail($id);

            $data->nama            = $r->input('nama');
            $data->nik             = $r->input('nik');
            $data->tempat          = $r->input('tempat');
            $data->tanggal         = date('Y-m-d',strtotime($r->input('tanggal')));
            $data->jenis_kelamin   = $r->input('jenis_kelamin');
            $data->pekerjaan       = $r->input('pekerjaan');
            $data->alamat          = $r->input('alamat');
            $data->kewarganegaraan = $r->input('kewarganegaraan');
            $data->agama           = $r->input('agama');
            $data->keperluan       = $r->input('keperluan');
            $data->n_ayah          = $r->input('n_ayah');
            $data->n_ibu           = $r->input('n_ibu');

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Surat Keterangan Tidak Mampu berhasil di ubah');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Surat Keterangan Tidak Mampu gagal di ubah');
        }
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
        $hapus = Sktm::findOrFail($id);
        if ($hapus->delete()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Surat Keterangan Tidak Mampu berhasil di hapus');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Surat Keterangan Tidak Mampu gagal di hapus');
        }
        return back();
    }
}
