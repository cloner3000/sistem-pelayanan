<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;

use App\User;
use App\Pengunjung;
use App\Web;
use App\Struktur;

use Carbon\Carbon;
use Auth;
use Image;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
		$user    = User::all();
        
		$mobile  = Pengunjung::where('platform','mobile')->count();
		$tab     = Pengunjung::where('platform','tab')->count();
		$desktop = Pengunjung::where('platform','desktop')->count();

        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();
    	
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
            // $hit =  $p['01']->count().','.$p['02']->count().','.$p['03']->count().','.$p['04']->count().','.
            //         $p['05']->count().','.$p['06']->count().','.$p['07']->count().','.$p['08']->count().','.
            //         $p['09']->count().','.$p['10']->count().','.$p['11']->count().','.$p['12']->count();
            foreach ($p as $key => $value) {
                $hit =  $p[$key]->count().',';
            }
            if (substr($hit, -1, 1) == ','){
              $hit = substr($hit, 0, -1);
            }
            
        }else{
            $hit = "0,0,0,0,0,0,0,0,0,0,0,0";
        }

    	$acc  = Ktp::where('status','acc')->count()+Skk::where('status','acc')->count()
                +Pengaduan::where('status','acc')->count()+Sk::where('status','acc')->count()
                +Skematian::where('status','acc')->count()+Sktm::where('status','acc')->count()
                +Sptjm::where('status','acc')->count();

    	if (Auth::user()->roles->first()->name == "Kepala Desa") {
    		return view('kades.dashboard',compact('user','acc','mobile','tab','desktop',
                'hit','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'
            ));
    	}else{
    		return view('admin.dashboard',compact('user','acc','mobile','tab','desktop',
                'hit','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'
            ));
    	}
    }

    public function riwayat(Request $req)
    {
    	$datas = Pengunjung::paginate(10);

        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();

    	if (Auth::user()->roles->first()->name == "Kepala Desa") {
    		return view('kades.riwayat',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
    	}else{
    		return view('admin.riwayat',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
    	}
    }

    public function hapus_riwayat()
    {    	
        if ($data = Pengunjung::truncate()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Riwayat berhasil di hapus');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Riwayat gagal di hapus');
        }
    	return back();
    }

    public function editWeb()
    {
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();

        $web = Web::firstOrFail(); 
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.web.web',compact('web','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }else{
            return view('admin.web.web',compact('web','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }
    }

    public function updateWeb(Request $req,$id)
    {
        $data  = Web::findOrFail($id);

        if ($req->hasFile('foto_slider') && $req->hasFile('foto_slider1')) {
            @unlink(public_path("storage/slider/{$data->foto_slider}"));
            @unlink(public_path("storage/slider/{$data->foto_slider1}"));

            $foto = Image::make($req->file('foto_slider'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            $foto1 = Image::make($req->file('foto_slider1'))->fit(600,360)->encode('jpg');
            $nama1 = md5($foto1->__toString()).".jpg";

            // uncoment if you use local storage
            $lokasi = "storage/slider/{$nama}";
            $foto->save(public_path($lokasi));
            $data->foto_slider = $nama;
            
            // uncoment if you use local storage
            $lokasi1 = "storage/slider/{$nama1}";
            $foto1->save(public_path($lokasi1));
            $data->foto_slider1 = $nama1;

            //Config for google drive
            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'slider')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);
            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();
            // $data->foto_slider = $file['basename'];

            // Storage::cloud()->put($lokasi['path']."/".$nama1, $foto1);
            // $file1 = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama1, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama1, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();
            // $data->foto_slider1 = $file1['basename'];

        }elseif($req->hasFile('foto_slider')){
            @unlink(public_path("storage/slider/{$data->foto_slider}"));
            $foto = Image::make($req->file('foto_slider'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";
            
            // uncoment if you use local storage
            $lokasi = "storage/slider/{$nama}";
            $foto->save(public_path($lokasi));
            $data->foto_slider = $nama;

            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'slider')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);

            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();

            // $data->foto_slider = $file['basename'];

        }elseif($req->hasFile('foto_slider1')){
            @unlink(public_path("storage/slider/{$data->foto_slider1}"));
            $foto = Image::make($req->file('foto_slider1'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            // uncoment if you use local storage
            $lokasi = "storage/slider/{$nama}";
            $foto->save(public_path($lokasi));
            $data->foto_slider1 = $nama;

            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'slider')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);
            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();

            // $data->foto_slider1 = $file['basename'];
        }

        if ($req->hasFile('foto_tentang')) {
            @unlink(public_path("storage/tentang/{$data->foto_tentang}"));
            $foto = Image::make($req->file('foto_tentang'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            //uncoment if you use local storage 
            $lokasi = "storage/tentang/{$nama}";
            $foto->save(public_path($lokasi));
            $data->foto_tentang = $nama;

            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'tentang')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);

            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();

            // $data->foto_tentang = $file['basename'];
        }

        if ($req->hasFile('peta')) {
            @unlink(public_path("storage/peta/{$data->peta}"));
            $foto = Image::make($req->file('peta'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            //uncoment if you use local storage 
            $lokasi = "/storage/peta/{$nama}";
            $foto->save(public_path($lokasi));

            $data->peta = $nama;

            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'tentang')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);

            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();

            // $data->peta = $file['basename'];
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
        $data->runtext  = $req->input('runtext');

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Website berhasil di ubah');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Website gagal di ubah');
        }
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

        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.struktur.index',compact('datas','jabatan','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.struktur.index',compact('datas','jabatan','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    public function updateStruktur(Request $req,$id)
    {
        $data = Struktur::findOrFail($id);

        if($req->hasFile('foto')){
            @unlink(public_path("storage/struktur/{$data->foto}"));
            $foto = Image::make($req->file('foto'))->fit(600,360)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";
            
            //uncoment if you use local storage 
            $lokasi = "storage/struktur/{$nama}";
            $foto->save(public_path($lokasi));
            $data->foto        = $nama;
            
            // $lokasi = '/';
            // $recursive = false;
            // $contents = collect(Storage::cloud()->listContents($lokasi, $recursive));
            // $lokasi = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', 'struktur')
            //     ->first();

            // if ( ! $lokasi) {
            //     return 'Directory does not exist!';
            // }

            // Storage::cloud()->put($lokasi['path']."/".$nama, $foto);

            // $file = collect(Storage::cloud()->listContents($lokasi['basename'], $recursive))
            //     ->where('type', '=', 'file')
            //     ->where('filename', '=', pathinfo($nama, PATHINFO_FILENAME))
            //     ->where('extension', '=', pathinfo($nama, PATHINFO_EXTENSION))
            //     ->sortBy('timestamp')
            //     ->last();

            // $data->foto        = $file['basename'];
        }

        $data->nama    = $req->input('nama');
        $data->jabatan = $req->input('jabatan');
        $data->fb      = $req->input('fb');
        $data->twitter = $req->input('twitter');

        if ($data->save()) {
            session()->flash('status','Sukses');
            session()->flash('pesan','Struktur Organisasi berhasil di ubah');
        }else{
            session()->flash('status','Gagal');
            session()->flash('pesan','Struktur Organisasi gagal di ubah');
        }
        return back();
    }
}
