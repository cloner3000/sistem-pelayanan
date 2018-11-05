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
use Image;

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
            $foto = Image::make($req->file('foto_slider'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString());
            $lokasi = "storage/slider/{$nama}.jpg";
            $foto->save(public_path($lokasi));

            $foto1 = Image::make($req->file('foto_slider1'))->fit(600,360)->encode('jpg');
            $nama1 = md5($foto1->__toString());
            $lokasi1 = "storage/slider/{$nama1}.jpg";
            $foto1->save(public_path($lokasi1));

            $data->foto_slider = $nama.".jpg";
            $data->foto_slider1 = $nama1.".jpg";

        }elseif($req->hasFile('foto_slider')){
            $foto = Image::make($req->file('foto_slider'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString());
            $lokasi = "storage/slider/{$nama}.jpg";
            $foto->save(public_path($lokasi));

            $data->foto_slider = $nama.".jpg";

        }elseif($req->hasFile('foto_slider1')){
            $foto = Image::make($req->file('foto_slider1'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString());
            $lokasi = "storage/slider/{$nama}.jpg";
            $foto->save(public_path($lokasi));

            $data->foto_slider1 = $nama.".jpg";
        }

        if ($req->hasFile('foto_tentang')) {
            $foto = Image::make($req->file('foto_tentang'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString());
            $lokasi = "storage/tentang/{$nama}.jpg";
            $foto->save(public_path($lokasi));

            $data->foto_tentang = $nama.".jpg";
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

        $jabatan = array(
            'Kepala Desa','Kepala Urusan perencanaan','Kepala Dusun Malinggut 1',
            'Kepala Urusan Administrasi Umum','Kepala Urusan Keuangan',
            'Kepala dusun Malinggut 2','Sekretaris Desa','Kepala Seksi Pelayanan',
            'Kepala Dusun Malinggut 3','Kepala Seksi Pemerintahan','Kepala Dusun Sukamaju','Kasi Kesejahteraan'
        );

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.struktur.index',compact('datas','jabatan'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.struktur.index',compact('datas','jabatan'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function updateStruktur(Request $req,$id)
    {
        $data = Struktur::findOrFail($id);

        if($req->hasFile('foto')){
            $foto = Image::make($req->file('foto_tentang'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString());
            $lokasi = "storage/struktur/{$nama}.jpg";
            $foto->save(public_path($lokasi));
            
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
