<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Slide;
use App\Models\Materi;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Playlist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $slide = Slide::where('status','1')->get();
        $kategori = Kategori::all(); 
        $artikel = Artikel::where('is_active','1')->orderBy('created_at', 'DESC')->limit('6')->get();
        $playlist = Playlist::where('is_active','1')->orderBy('created_at', 'DESC')->limit('4')->get(); 
        $materi = Materi::where('is_active','1')->orderBy('created_at', 'DESC')->limit('2')->get();
        $iklanfooter = Iklan::where('status','1')->orderBy('created_at', 'DESC')->limit('1')->get(); //Iklan::where('id', '1')->first();
        $postfooter = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        return view('front.frontend',
         compact('slide','kategori','artikel','playlist','iklanfooter','postfooter','materi'));
    }

    public function detail($slug)
    { 
        $kategori = Kategori::all();
        $artikel = Artikel::where('slug', $slug)->first(); 
        $iklanA = Iklan::orderBy('created_at', 'DESC')->limit('2')->get();//Iklan::where('id', '1')->first();
        $iklanfooter = Iklan::where('status','1')->orderBy('created_at', 'DESC')->limit('1')->get();
        $postterbaru = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        $postfooter = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        return view('front.artikel.detail-artikel',
         compact('kategori','artikel','iklanA','iklanfooter','postfooter','postterbaru'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        if($request->kategori){

            $kategori = Kategori::where('nama_kategori', $request->kategori)->first();

            $artikel_search = Artikel::where('kategori_id', $kategori->id)->paginate(5);

        }else{
            $artikel_search = Artikel::where('judul', 'like', "%" . $keyword . "%")->paginate(5);
        }

        // jadi setiap kamu manggil view dengan layout front.layouts.app kamu harus ngasi variabel dibawah ini juga yg dipanggil didalem footer / navbar
        $slide = Slide::all();
        $kategori = Kategori::all();
        $artikel = Artikel::where('is_active','1')->orderBy('created_at', 'DESC')->limit('5')->get();
        $playlist = Playlist::where('is_active','1')->orderBy('created_at', 'DESC')->limit('4')->get();
        $materi = Materi::where('is_active','1')->orderBy('created_at', 'DESC')->limit('2')->get();
        $iklanfooter = Iklan::orderBy('created_at', 'DESC')->limit('1')->get(); //Iklan::where('id', '1')->first();
        $postfooter = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();

        return view('front.search', compact('slide','kategori','artikel','playlist','iklanfooter','postfooter','materi','artikel_search'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}
