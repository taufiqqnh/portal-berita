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
        $slide = Slide::all();
        $kategori = Kategori::all(); 
        $artikel = Artikel::where('is_active','1')->orderBy('created_at', 'DESC')->limit('5')->get();
        $playlist = Playlist::where('is_active','1')->orderBy('created_at', 'DESC')->limit('4')->get(); 
        $materi = Materi::where('is_active','1')->orderBy('created_at', 'DESC')->limit('2')->get();
        $iklanfooter = Iklan::orderBy('created_at', 'DESC')->limit('1')->get(); //Iklan::where('id', '1')->first();
        $postfooter = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        return view('front.frontend',
         compact('slide','kategori','artikel','playlist','iklanfooter','postfooter','materi'));
    }

    public function detail($slug)
    { 
        $kategori = Kategori::all();
        $artikel = Artikel::where('slug', $slug)->first(); 
        $iklanA = Iklan::orderBy('created_at', 'DESC')->limit('2')->get();//Iklan::where('id', '1')->first();
        $iklanfooter =  Iklan::orderBy('created_at', 'DESC')->limit('1')->get();
        $postterbaru = Artikel::orderBy('created_at', 'DESC')->limit('3')->get();
        $postfooter = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        return view('front.artikel.detail-artikel',
         compact('kategori','artikel','iklanA','iklanfooter','postfooter','postterbaru'));
    }
}
