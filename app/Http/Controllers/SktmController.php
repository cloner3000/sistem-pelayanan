<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sktm;
use Auth;
use PDF;
use App\User;
use DB;
class SktmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Sktm::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sktm.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sktm.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function indexAcc(Request $req){
        $datas = Sktm::with('user')->where('status','acc')->orderBy('created_at','desc')->paginate(10);
        $export = Sktm::select(DB::raw('count(id) as `data`'),DB::raw("MONTH(created_at) as month,YEAR(created_at) as year"))
                  ->groupby('month','year')->orderBy('year','desc')->orderBy('month','desc')->get();
        $user = User::whereHas('roles',function($q){
                    $q->where('role_id',3);
                })->orWhereHas('roles',function($q){
                    $q->where('role_id',2);
                })->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.sktm.indexAcc',compact('datas','user','export'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.sktm.indexAcc',compact('datas','user','export'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function acc(Request $req)
    {
        $data = Sktm::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $sptjm = Sktm::create([
            'user_id'    => Auth::id(),
            
            'nama'            => $r->input('nama'),
            'nik'             => $r->input('nik'),
            'tempat'          => $r->input('tempat'),
            'tanggal'         => date('Y-m-d',strtotime($r->input('tanggal'))),
            'pekerjaan'       => $r->input('pekerjaan'),
            'alamat'          => $r->input('alamat'),
            'kewarganegaraan' => $r->input('kewarganegaraan'),
            'agama'           => $r->input('agama'),
            'keperluan'       => $r->input('keperluan'),
            'n_ayah'          => $r->input('n_ayah'),
            'n_ibu'           => $r->input('n_ibu')
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
        $data = Sktm::findOrFail($id);
        $user = User::with('roles')->findOrFail($user_id);
        if ($user->roles->first()->id == 3) {
            $pdf   = PDF::loadView('pdf.kades.sktm',compact('data','user'))->setPaper('a4','portrait');
        }elseif ($user->roles->first()->id == 2){
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
            $data->pekerjaan       = $r->input('pekerjaan');
            $data->alamat          = $r->input('alamat');
            $data->kewarganegaraan = $r->input('kewarganegaraan');
            $data->agama           = $r->input('agama');
            $data->keperluan       = $r->input('keperluan');
            $data->n_ayah          = $r->input('n_ayah');
            $data->n_ibu           = $r->input('n_ibu');

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
        $hapus = Sktm::findOrFail($id);
        $hapus->delete();
        return back();
    }
}
