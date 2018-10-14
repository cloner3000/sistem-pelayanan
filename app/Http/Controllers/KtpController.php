<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ktp;
class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Ktp::with('user')->where('status','pending')->paginate(10);
        return view('admin.ktp.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    public function indexAcc(Request $req)
    {
        $datas = Ktp::with('user')->where('status','acc')->paginate(10);
        return view('admin.ktp.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    public function acc(Request $req)
    {
        $data = Ktp::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return redirect()->route('ktp.acc');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return redirect()->route('ktp.acc');
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
        return redirect()->route('ktp.index');
    }
}
