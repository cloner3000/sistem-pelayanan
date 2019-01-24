<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Kategori;
use App\User;
use Auth;
use Image;

use App\Ktp;
use App\Skk;
use App\Pengaduan;
use App\Sk;
use App\Skematian;
use App\Sktm;
use App\Sptjm;
class BlogController extends Controller
{
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
        
        $datas = Blog::with('users','kategoris')
                ->whereDoesntHave('kategoris',function($q){
                    $q->where('slug','=','peraturan-desa')
                        ->orWhere('slug','=','keuangan-desa')
                        ->orWhere('slug','=','kekayaan-desa')
                        ->orWhere('slug','=','pengurus-bpd')
                        ->orWhere('slug','=','pengurus-lpm')
                        ->orWhere('slug','=','pengurus-pkk')
                        ->orWhere('slug','=','karang-taruna')
                        ->orWhere('slug','=','rw-rt')
                        ->orWhere('slug','=','kader-posyandu')
                        ->orWhere('slug','=','linmas')
                        ->orWhere('slug','=','mui-desa')
                        ->orWhere('slug','=','gapoktan');
                })
                ->orderBy('created_at','desc')
                ->paginate(10);

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.index',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.blog.index',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'))->with('no',($req->input('page',1)-1)*10);
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
        
        $datas = Kategori::Where('slug','!=','peraturan-desa')
                 ->Where('slug','!=','keuangan-desa')
                 ->Where('slug','!=','kekayaan-desa')
                 ->Where('slug','!=','pengurus-bpd')
                 ->Where('slug','!=','pengurus-lpm')
                 ->Where('slug','!=','pengurus-pkk')
                 ->Where('slug','!=','karang-taruna')
                 ->Where('slug','!=','rw-rt')
                 ->Where('slug','!=','kader-posyandu')
                 ->Where('slug','!=','linmas')
                 ->Where('slug','!=','mui-desa')
                 ->Where('slug','!=','gapoktan')
                 ->get();

        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.create',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }else{
            return view('admin.blog.create',compact('datas','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if ($req->hasFile('foto')) {
            $foto = Image::make($req->file('foto'))->fit(1366,720)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            $lokasi = "storage/blog/{$nama}";
            $foto->save(public_path($lokasi));

            $data = Blog::create([
                    'kategori_id' => $req->input('kategori_id'),
                    'user_id'     => Auth::id(),
                    'slug'        => slugify($req->input('judul')),
                    'judul'       => $req->input('judul'),
                    'isi'         => $req->input('isi'),
                    'deskripsi'   => $req->input('deskripsi'),
                    'foto'        => $nama,
                ]);
            $data->save();  
        }

        return back();     
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
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();
        
        $data = Blog::findOrFail($id);
        $kategori = Kategori::Where('slug','!=','peraturan-desa')
                 ->Where('slug','!=','keuangan-desa')
                 ->Where('slug','!=','kekayaan-desa')
                 ->Where('slug','!=','pengurus-bpd')
                 ->Where('slug','!=','pengurus-lpm')
                 ->Where('slug','!=','pengurus-pkk')
                 ->Where('slug','!=','karang-taruna')
                 ->Where('slug','!=','rw-rt')
                 ->Where('slug','!=','kader-posyandu')
                 ->Where('slug','!=','linmas')
                 ->Where('slug','!=','mui-desa')
                 ->Where('slug','!=','gapoktan')
                 ->get();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.edit',compact('data','kategori','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }else{
            return view('admin.blog.edit',compact('data','kategori','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }
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
        $data = Blog::findOrFail($id);
         if ($req->hasFile('foto')) {
            $foto = Image::make($req->file('foto'))->fit(1366,720)->encode('jpg');
            $nama = md5($foto->__toString()).".jpg";

            $lokasi = "storage/blog/{$nama}";
            $foto->save(public_path($lokasi));
            unlink(public_path('storage/blog').'/'.$data->foto);
            $data->foto        = $nama;
        }

        $data->kategori_id = $req->input('kategori_id');
        $data->user_id     = Auth::id();
        $data->slug        = slugify($req->input('judul'));
        $data->judul       = $req->input('judul');
        $data->isi         = $req->input('isi');
        $data->deskripsi   = $req->input('deskripsi');
        $data->save();

         if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return redirect()->route('kades.blog.index');
         }else {
            return redirect()->route('blog.index');
         }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        unlink(public_path('storage/blog/').$data->foto);
        $data->delete();
        return back();
    }

    public function editRegulasi($slug)
    {
        $nKtp       = Ktp::where('status','=','pending')->count();
        $nPengaduan = Pengaduan::where('status','=','pending')->count();
        $nSk        = Sk::where('status','=','pending')->count();
        $nSkematian = Skematian::where('status','=','pending')->count();
        $nSkk       = Skk::where('status','=','pending')->count();
        $nSktm      = Sktm::where('status','=','pending')->count();
        $nSptjm     = Sptjm::where('status','=','pending')->count();

        $data = Blog::where('slug',$slug)->first();
        $kategori = Kategori::all();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.regulasi.edit',compact('data','kategori','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }else{
            return view('admin.regulasi.edit',compact('data','kategori','nKtp','nPengaduan','nSk','nSkematian','nSkk','nSktm','nSptjm'));
        }
    }
}
