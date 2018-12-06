<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Kategori;
use App\User;
use Auth;
use Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Blog::with('users','kategoris')->paginate(10);
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }else{
            return view('admin.blog.index',compact('datas'))->with('no',($req->input('page',1)-1)*10);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Kategori::all();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.create',compact('datas'));
        }else{
            return view('admin.blog.create',compact('datas'));
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
        $data = Blog::findOrFail($id);
        $kategori = Kategori::all();
        if (Auth::user()->roles->first()->name == "Kepala Desa") {
            return view('kades.blog.edit',compact('data','kategori'));
        }else{
            return view('admin.blog.edit',compact('data','kategori'));
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
        unlink(public_path('storage/blog'),$data->foto);
        $data->delete();
        return back();
    }
}
