<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Pekerjaan;
class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Pekerjaan::orderBy('created_at','desc')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.profesi.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.profesi.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Pekerjaan::insert([
            'nama' => $request->input('nama'),
            'slug' => slugify($request->input('nama')),
        ]);
        return back();
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
        $data = Pekerjaan::findOrFail($id);
        $data->nama = $request->input('nama');
        $data->slug = slugify($request->input('nama'));
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
        $data = Pekerjaan::findOrFail($id);
        $data->delete();
        return back();
    }
}
