<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skk;
use Auth;
use PDF;
use DB;
use Excel;
use App\User;
use App\Pekerjaan;

use App\Ktp;
use App\Spp;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
class SkkController extends Controller
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
        $datas = Skk::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.skk.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skk.index',compact('datas','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        $datas = Skk::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Skk::whereRaw('status = "acc"')
                  ->select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();
        
        $user = User::whereHas('roles',function($q){
                    $q->where('role_id',3);
                })->orWhereHas('roles',function($q){
                    $q->where('role_id',2);
                })->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.skk.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skk.indexAcc',compact('datas','export','user','ps','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSpp','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Skk::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    public function csv(Request $r)
    {
        $q = explode('-', $r->input('export'));
        $datas = Skk::whereRaw('YEAR(created_at) ='.$q[1])->whereRaw('MONTH(created_at) ='.$q[0])->get();
        return Excel::loadView('excel.skk',compact('datas'))
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
        $skk = Skk::create([
                    'user_id'              => Auth::id(),
                    'kabupaten'            => $r->input('kabupaten'),
                    'kecamatan'            => $r->input('kecamatan'),
                    'desa'                 => $r->input('desa'),
                    'nama_kepala_keluarga' => $r->input('nama_kepala_keluarga'),
                    'no_kk'                => $r->input('no_kk'),
                    'b_nama'               => $r->input('b_nama'),
                    'b_jenis_kelamin'      => $r->input('b_jenis_kelamin'),
                    'b_tempat'             => $r->input('b_tempat'),
                    'b_tanggal'            => date('Y-m-d',strtotime($r->input('b_tanggal'))),
                    'b_jenis_kelahiran'    => $r->input('b_jenis_kelahiran'),
                    'b_kelahiran_ke'       => $r->input('b_kelahiran_ke'),
                    'b_berat'              => $r->input('b_berat'),
                    'b_panjang'            => $r->input('b_panjang'),
                    'i_nik'                => $r->input('i_nik'),
                    'i_nama'               => $r->input('i_nama'),
                    'i_tanggal_lahir'      => date('Y-m-d',strtotime($r->input('i_tanggal_lahir'))),
                    'i_pekerjaan'          => $r->input('i_pekerjaan'),
                    'i_alamat'             => $r->input('i_alamat'),
                    'i_kewarganegaraan'    => $r->input('i_kewarganegaraan'),
                    'i_kebangsaan'         => $r->input('i_kebangsaan'),
                    'i_tanggal_perkawinan' => date('Y-m-d',strtotime($r->input('i_tanggal_perkawinan'))),
                    'a_nik'                => $r->input('a_nik'),
                    'a_nama'               => $r->input('a_nama'),
                    'a_tanggal_lahir'      => date('Y-m-d',strtotime($r->input('a_tanggal_lahir'))),
                    'a_pekerjaan'          => $r->input('a_pekerjaan'),
                    'a_alamat'             => $r->input('a_alamat'),
                    'a_kewarganegaraan'    => $r->input('a_kewarganegaraan'),
                    'a_kebangsaan'         => $r->input('a_kebangsaan'),
                    'a_tanggal_perkawinan' => date('Y-m-d',strtotime($r->input('a_tanggal_perkawinan'))),
                    'p_nik'                => $r->input('p_nik'),
                    'p_nama'               => $r->input('p_nama'),
                    'p_umur'               => $r->input('p_umur'),
                    'p_jenis_kelamin'      => $r->input('p_jenis_kelamin'),
                    'p_pekerjaan'          => $r->input('p_pekerjaan'),
                    'p_alamat'             => $r->input('p_alamat'),
                    's1_nik'               => $r->input('s1_nik'),
                    's1_nama'              => $r->input('s1_nama'),
                    's1_umur'              => $r->input('s1_umur'),
                    's1_pekerjaan'         => $r->input('s1_pekerjaan'),
                    's1_alamat'            => $r->input('s1_alamat'),
                    's2_nik'               => $r->input('s2_nik'),
                    's2_nama'              => $r->input('s2_nama'),
                    's2_umur'              => $r->input('s2_umur'),
                    's2_pekerjaan'         => $r->input('s2_pekerjaan'),
                    's2_alamat'            => $r->input('s2_alamat'),
                ]);
        
        $skk->save();
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
        $data = Skk::findOrFail($id);
        $pdf = PDF::loadView('pdf.skk',compact('data'))->setPaper('legal');
        return $pdf->stream($data->nama.".pdf");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = Skk::findOrFail($id);

        $data->b_nama            = $req->input('b_nama');
        $data->b_jenis_kelamin   = $req->input('b_jenis_kelamin');
        $data->b_tempat          = $req->input('b_tempat');
        $data->b_tanggal         = date('Y-m-d',strtotime($req->input('tanggal')));
        $data->b_jenis_kelahiran = $req->input('b_jenis_kelahiran');
        $data->b_kelahiran_ke    = $req->input('b_kelahiran_ke');
        $data->b_berat           = $req->input('b_berat');
        $data->b_panjang         = $req->input('b_panjang');

        $data->i_nik                = $req->input('i_nik');
        $data->i_nama               = $req->input('i_nama');
        $data->i_tanggal_lahir      = date('Y-m-d',strtotime($req->input('i_tanggal_lahir')));
        $data->i_pekerjaan          = $req->input('i_pekerjaan');
        $data->i_alamat             = $req->input('i_alamat');
        $data->i_kewarganegaraan    = $req->input('i_kewarganegaraan');
        $data->i_kebangsaan         = $req->input('i_kebangsaan');
        $data->i_tanggal_perkawinan = date('Y-m-d',strtotime($req->input('i_tanggal_perkawinan')));
        
        $data->a_nik                = $req->input('a_nik');
        $data->a_nama               = $req->input('a_nama');
        $data->a_tanggal_lahir      = date('Y-m-d',strtotime($req->input('a_tanggal_lahir')));
        $data->a_pekerjaan          = $req->input('a_pekerjaan');
        $data->a_alamat             = $req->input('a_alamat');
        $data->a_kewarganegaraan    = $req->input('a_kewarganegaraan');
        $data->a_kebangsaan         = $req->input('a_kebangsaan');
        $data->a_tanggal_perkawinan = date('Y-m-d',strtotime($req->input('a_tanggal_perkawinan')));
        
        $data->p_nik                = $req->input('p_nik');
        $data->p_nama               = $req->input('p_nama');
        $data->p_umur               = $req->input('p_umur');
        $data->p_jenis_kelamin      = $req->input('p_jenis_kelamin');
        $data->p_pekerjaan          = $req->input('p_pekerjaan');
        $data->p_alamat             = $req->input('p_alamat');
        
        $data->s1_nik               = $req->input('s1_nik');
        $data->s1_nama              = $req->input('s1_nama');
        $data->s1_umur              = $req->input('s1_umur');
        $data->s1_pekerjaan         = $req->input('s1_pekerjaan');
        $data->s1_alamat            = $req->input('s1_alamat');
        
        $data->s2_nik               = $req->input('s2_nik');
        $data->s2_nama              = $req->input('s2_nama');
        $data->s2_umur              = $req->input('s2_umur');
        $data->s2_pekerjaan         = $req->input('s2_pekerjaan');
        $data->s2_alamat            = $req->input('s2_alamat');

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
        $hapus = Skk::findOrFail($id);
        $hapus->delete();
        return back();
    }
}
