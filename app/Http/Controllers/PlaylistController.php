<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist = Playlist::all();
        return view('back.playlist.index', compact('playlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('back.playlist.create',compact('playlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request, [
            'judul_playlist' => 'required|min:4',
        ]);

        $data= $request->all();
            $data['slug'] = Str::slug($request->input('judul_playlist'));
            $data['user_id'] = Auth::id();
            $data['image'] = $request->file('image')->store('playlist');
             
        Playlist::create($data);

        Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/playlist');
            // ->with('success', 'Your data has been added!');
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
        $playlist = Playlist::find($id);
        return view('back.playlist.edit', compact('playlist'));
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
        if(empty($request->file('image'))){

            $playlist = Playlist::find($id); 
            $playlist->update([
            'judul_playlist' => $request->judul_playlist,
            'slug' => Str::slug($request->input('judul_playlist')),
            'desc' => $request->desc,
            'user_id' => Auth::id(),
            'is_active' => $request->is_active,
            ]);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/playlist');
            // ->with('success', 'Your data has been Updated!');
        } else {
            $playlist = Playlist::find($id);
            Storage::delete($playlist->image); 
            $playlist->update([
            'judul_playlist' => $request->judul_playlist,
            'slug' => Str::slug($request->input('judul_playlist')),
            'desc' => $request->desc,
            'user_id' => Auth::id(),
            'is_active' => $request->is_active,
            'image' => $request->file('image')->store('playlist'),

            ]);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/playlist');
            // ->with('success', 'Your data has been Updated!');
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
        $playlist = Playlist::find($id);
        $playlist->delete();
        Alert::info('Success', 'Berhasil Terhapus');
        return redirect ('/playlist');
        // ->with('success', 'Your data has been Deleted!');
    }
}
