<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skk;
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
        return view('admin.skk.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

     public function indexAcc(Request $req)
    {
        $datas = Skk::with('user')->where('status','acc')->paginate(10);
        return view('admin.skk.indexAcc',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    }

    public function acc(Request $req)
    {
        $data = Skk::findOrFail($req->id);

        $data->status = "acc";

        $data->save();
        return redirect()->route('skk.acc');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
