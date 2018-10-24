<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skk;
use Auth;
use PDF;
class SkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Skk::with('user')->where('status','pending')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.skk.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skk.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

     public function indexAcc(Request $req)
    {
        $datas = Skk::with('user')->where('status','acc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.skk.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.skk.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Skk::findOrFail($req->id);

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
        $skk = Skk::create([
                'user_id'              => $request->input('user_id'),
                'kabupaten'            => $request->input('kabupaten'),
                'kecamatan'            => $request->input('kecamatan'),
                'desa'                 => $request->input('desa'),
                'nama_kepala_keluarga' => $request->input('nama_kepala_keluarga'),
                'no_kk'                => $request->input('no_kk'),
                'status'               => $request->input('status'),
                
                'b_nama'               => $request->input('b_nama'),
                'b_jenis_kelamin'      => $request->input('b_jenis_kelamin'),
                'b_tempat'             => $request->input('b_tempat'),
                'b_tanggal'            => $request->input('b_tanggal'),
                'b_jenis_kelahiran'    => $request->input('b_jenis_kelahiran'),
                'b_kelahiran_ke'       => $request->input('b_kelahiran_ke'),
                'b_berat'              => $request->input('b_berat'),
                'b_panjang'            => $request->input('b_panjang'),
                
                'i_nik'                => $request->input('i_nik'),
                'i_nama'               => $request->input('i_nama'),
                'i_tanggal_lahir'      => $request->input('i_tanggal_lahir'),
                'i_pekerjaan'          => $request->input('i_pekerjaan'),
                'i_alamat'             => $request->input('i_alamat'),
                'i_kewarganegaraan'    => $request->input('i_kewarganegaraan'),
                'i_kebangsaan'         => $request->input('i_kebangsaan'),
                'i_tanggal_perkawinan' => $request->input('i_tanggal_perkawinan'),
                
                'a_nik'                => $request->input('a_nik'),
                'a_nama'               => $request->input('a_nama'),
                'a_tanggal_lahir'      => $request->input('a_tanggal_lahir'),
                'a_pekerjaan'          => $request->input('a_pekerjaan'),
                'a_alamat'             => $request->input('a_alamat'),
                'a_kewarganegaraan'    => $request->input('a_kewarganegaraan'),
                'a_kebangsaan'         => $request->input('a_kebangsaan'),
                'a_tanggal_perkawinan' => $request->input('a_tanggal_perkawinan'),
                
                'p_nik'                => $request->input('p_nik'),
                'p_nama'               => $request->input('p_nama'),
                'p_umur'               => $request->input('p_umur'),
                'p_jenis_kelamin'      => $request->input('p_jenis_kelamin'),
                'p_pekerjaan'          => $request->input('p_pekerjaan'),
                'p_alamat'             => $request->input('p_alamat'),
                
                's1_nik'               => $request->input('s1_nik'),
                's1_nama'              => $request->input('s1_nama'),
                's1_umur'              => $request->input('s1_umur'),
                's1_pekerjaan'         => $request->input('s1_pekerjaan'),
                's1_alamat'            => $request->input('s1_alamat'),
                
                's2_nik'               => $request->input('s2_nik'),
                's2_nama'              => $request->input('s2_nama'),
                's2_umur'              => $request->input('s2_umur'),
                's2_pekerjaan'         => $request->input('s2_pekerjaan'),
                's2_alamat'            => $request->input('s2_alamat'),
        ]);
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
        $data->b_tanggal         = date('Y-m-d',strtotime($request->input('tanggal')));
        $data->b_jenis_kelahiran = $req->input('b_jenis_kelahiran');
        $data->b_kelahiran_ke    = $req->input('b_kelahiran_ke');
        $data->b_berat           = $req->input('b_berat');
        $data->b_panjang         = $req->input('b_panjang');

        $data->i_nik                = $req->input('i_nik');
        $data->i_nama               = $req->input('i_nama');
        $data->i_tanggal_lahir      = date('Y-m-d',strtotime($request->input('i_tanggal_lahir')));
        $data->i_pekerjaan          = $req->input('i_pekerjaan');
        $data->i_alamat             = $req->input('i_alamat');
        $data->i_kewarganegaraan    = $req->input('i_kewarganegaraan');
        $data->i_kebangsaan         = $req->input('i_kebangsaan');
        $data->i_tanggal_perkawinan = date('Y-m-d',strtotime($request->input('i_tanggal_perkawinan')));
        
        $data->a_nik                = $req->input('a_nik');
        $data->a_nama               = $req->input('a_nama');
        $data->a_tanggal_lahir      = date('Y-m-d',strtotime($request->input('a_tanggal_lahir')));
        $data->a_pekerjaan          = $req->input('a_pekerjaan');
        $data->a_alamat             = $req->input('a_alamat');
        $data->a_kewarganegaraan    = $req->input('a_kewarganegaraan');
        $data->a_kebangsaan         = $req->input('a_kebangsaan');
        $data->a_tanggal_perkawinan = date('Y-m-d',strtotime($request->input('a_tanggal_perkawinan')));
        
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
