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
        return view('kades.web.web',compact('web'));
    }

    public function updateWeb(Request $req,$id)
    {
        $data  = Web::firstOrFail($id);
        
        $data->nama_website      = $req->input('nama_website');
        $data->judul_slider      = $req->input('judul_slider');
        $data->deskripsi_slider  = $req->input('deskripsi_slider');
        $data->foto_slider       = "h";
        $data->judul_slider1     = $req->input('judul_slider1');
        $data->deskripsi_slider1 = $req->input('deskripsi_slider1');
        $data->foto_slider1      = "h";
        $data->judul_slider2     = $req->input('judul_slider2');
        $data->deskripsi_slider2 = $req->input('deskripsi_slider2');
        $data->foto_slider2      = "h";
        $data->judul_slider3     = $req->input('judul_slider3');
        $data->deskripsi_slider3 = $req->input('deskripsi_slider3');
        $data->foto_slider3      = "h";
        $data->tentang           = $req->input('tentang');
        $data->visi_misi         = $req->input('visi_misi');
        $data->tlp               = $req->input('tlp');
        $data->email             = $req->input('email');
        $data->fb                = $req->input('fb');
        $data->twitter           = $req->input('twitter');
        $data->ig                = $req->input('ig');

        $data->save();
        return back();
    }
}
