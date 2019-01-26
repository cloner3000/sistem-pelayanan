<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Role;
use App\User;

use Auth;
use Hash;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;

class UserController extends Controller
{

    public function gantiPas(Request $request)
    {
        $id     = decrypt($request->input('id'));
        $user   = User::find($id);

        if (!(Hash::check($request->get('pasLama'), Auth::user()->password))) {
            
            session()->flash('status','Gagal');
            session()->flash('pesan','Password lama salah');
            return back();
        }else{
            if ($request->input('pasBaru') == $request->input('pasBaruCek') ) {
                
                $user->name = $request->input('nama');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('pasBaru'));

                if ($user->save()) {
                    
                    session()->flash('status','Sukses');
                    session()->flash('pesan','Password berhasil diubah');
                    return back();     
                }

            }else{
                
                session()->flash('status','Gagal');
                session()->flash('pesan','Password baru tidak sama');
                return back();
            }
        }
    }

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
        
        $datas = User::with('roles')->whereHas('roles',function($q){
            $q->where('name','!=','Kepala Desa');
        })->paginate(10);
        
        $datasK= User::paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.user.indexUser',compact('datasK','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{       
            return view('admin.user.indexUser',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $user = User::findOrFail(Auth::user()->id);
        $role = Role::all();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.user.tambahUser',compact('role','user','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }else{
            return view('admin.user.tambahUser',compact('role','user','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
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
        $user = User::create([
          'name'     => $request->input('name'),
          'email'    => $request->input('email'),
          'password' => bcrypt($request->input('password')),
        ]);
        
        $user->roles()->attach(Role::where('id', $request->input('role'))->first());

        if ($user) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Akun Berhasil di simpan');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Akun Berhasil di simpan');
        }

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
        $data = User::findOrFail($id);
        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = $data->password;
        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Akun Berhasil di ubah');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Akun Berhasil di ubah');
        }
        $data->roles()->attach($data->roles->first());

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
        $data = User::findOrFail($id);
        $data->roles()->detach();
        if ($data->delete()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Akun Berhasil di hapus');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Akun Berhasil di hapus');
        }
        return back();
    }
}
