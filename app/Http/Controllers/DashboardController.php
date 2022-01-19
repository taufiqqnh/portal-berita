<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Materi;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Playlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kategori = Kategori::all(); 
        $artikel = Artikel::all(); 
        $playlist = Playlist::all(); 
        $users = User::all();
        $materi = Materi::all();
        $postterbaru = Artikel::orderBy('created_at', 'DESC')->limit('2')->get();
        $playlistvideo = Playlist::orderBy('created_at', 'DESC')->limit('2')->get();
        $materivideo = Materi::orderBy('created_at', 'DESC')->limit('2')->get();
        
        return view('back.dashboard', 
        compact('kategori','artikel','playlist','users','materi','postterbaru','playlistvideo','materivideo'));
    }
    
}
