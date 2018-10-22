<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ktp;
use App\Skk;
use App\Spp;
use App\User;
use App\Pengunjung;
use App\Web;
use App\Struktur;

use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
		$ktp     = Ktp::all();
		$skk     = Skk::all();
		$spp     = Spp::all();
		$user    = User::all();
		$mobile  = Pengunjung::where('platform','mobile')->count();
		$tab     = Pengunjung::where('platform','tab')->count();
		$desktop = Pengunjung::where('platform','desktop')->count();
    	
    	$p = Pengunjung::orderByRaw('MONTH(created_at)','asc')
    					->select('created_at')
    					->get()
    					->groupBy(
    						function($val) {
    							return Carbon::parse($val->created_at)->format('m');
    						}
    					)
    					->all();

        if (!empty($p)) {
            $hit =  $p['01']->count().','.$p['02']->count().','.$p['03']->count().','.$p['04']->count().','.
                    $p['05']->count().','.$p['06']->count().','.$p['07']->count().','.$p['08']->count().','.
                    $p['09']->count().','.$p['10']->count().','.$p['11']->count().','.$p['12']->count();
        }else{
            $hit = "0,0,0,0,0,0,0,0,0,0,0,0";
        }

    	$acc  = Ktp::where('status','acc')->count()+Skk::where('status','acc')->count()+Spp::where('status','acc')->count();
    	if (Auth::user()->roles->first()->name == "Kepala Desa") {
    		return view('kades.dashboard',compact('ktp','skk','spp','user','acc','mobile','tab','desktop','hit'));
    	}else{
    		return view('admin.dashboard',compact('ktp','skk','spp','user','acc','mobile','tab','desktop','hit'));
    	}
    }

    public function riwayat(Request $req)
    {
    	$datas = Pengunjung::paginate(10);

    	if (Auth::user()->roles->first()->name == "Kepala Desa") {
    		return view('kades.riwayat',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    	}else{
    		return view('admin.riwayat',compact('datas'))->with('no',($req->input('page',1)-1)*10);
    	}
    }

    public function hapus_riwayat()
    {
    	$data = Pengunjung::truncate();
    	return back();
    }

    public function editWeb()
    {
        $web = Web::firstOrFail(); 
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.web.web',compact('web'));
        }else{
            return view('admin.web.web',compact('web'));
        }
    }

    public function updateWeb(Request $req,$id)
    {
        $data  = Web::findOrFail($id);

        if ($req->hasFile('foto_slider') && $req->hasFile('foto_slider1')) {
            
            $foto               = $req->file('foto_slider');
            $nama               = time().'.'.$foto->getClientOriginalExtension();
            $lokasi             = public_path('/storage/slider');
            $status             = $foto->move($lokasi, $nama);
            
            $foto1              = $req->file('foto_slider1');
            $nama1              = (time()+1).'.'.$foto1->getClientOriginalExtension();
            $lokasi1            = public_path('/storage/slider');
            $status1            = $foto1->move($lokasi1, $nama1);
            
            $data->foto_slider  = $nama;
            $data->foto_slider1 = $nama1;

        }elseif($req->hasFile('foto_slider')){

            $foto              = $req->file('foto_slider');
            $nama              = time().'.'.$foto->getClientOriginalExtension();
            $lokasi            = public_path('/storage/slider');
            $status            = $foto->move($lokasi, $nama);
            
            $data->foto_slider = $nama;

        }elseif($req->hasFile('foto_slider1')){
            $foto1              = $req->file('foto_slider1');
            $nama1              = time().'.'.$foto1->getClientOriginalExtension();
            $lokasi1            = public_path('/storage/slider');
            $status1            = $foto1->move($lokasi1, $nama1);
            
            $data->foto_slider1 = $nama1;
        }

        if ($req->hasFile('foto_tentang')) {
            $foto2              = $req->file('foto_tentang');
            $nama2              = time().'.'.$foto2->getClientOriginalExtension();
            $lokasi2            = public_path('/storage/slider');
            $status2            = $foto2->move($lokasi2, $nama2);
            
            $data->foto_tentang = $nama;
        }

        $data->nama_website      = $req->input('nama_website');
        $data->judul_slider      = $req->input('judul_slider');
        $data->deskripsi_slider  = $req->input('deskripsi_slider');
        $data->judul_slider1     = $req->input('judul_slider1');
        $data->deskripsi_slider1 = $req->input('deskripsi_slider1');

        $data->tentang  = $req->input('tentang');
        $data->tentang1 = $req->input('tentang1');
        $data->visi     = $req->input('visi');
        $data->misi     = $req->input('misi');
        $data->tlp      = $req->input('tlp');
        $data->email    = $req->input('email');
        $data->fb       = $req->input('fb');
        $data->twitter  = $req->input('twitter');
        $data->ig       = $req->input('ig');

        $data->save();
        return back();
    }

    public function indexStruktur(Request $req)
    {
        $datas = Struktur::paginate(12);

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.struktur.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.struktur.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function updateStruktur(Request $req,$id)
    {
        $data = Struktur::findOrFail($id);

        if($req->hasFile('foto')){
            $foto              = $req->file('foto');
            $nama              = time().'.'.$foto->getClientOriginalExtension();
            $lokasi            = public_path('/storage/struktur');
            $status            = $foto->move($lokasi, $nama);
            
            $data->foto        = $nama;
        }

        $data->nama    = $req->input('nama');
        $data->jabatan = $req->input('jabatan');
        $data->fb      = $req->input('fb');
        $data->twitter = $req->input('twitter');

        $data->save();
        return back();
    }
}
