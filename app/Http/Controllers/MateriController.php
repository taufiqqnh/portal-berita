<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        return view('back.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materi = Materi::all();
        $playlist = Playlist::all();
        return view('back.materi.create',compact('materi','playlist'));
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
            'judul_materi' => 'required|min:4',
        ]);

        $data= $request->all();
            $data['slug'] = Str::slug($request->input('judul_materi'));
            $data['image'] = $request->file('image')->store('materi');
             
        Materi::create($data);

        Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/materi');
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
        $materi = Materi::find($id);
        $playlist = Playlist::all();
        return view('back.materi.edit', compact('materi','playlist'));
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
        $this-> validate($request, [
            'judul_materi' => 'required|min:4',
        ]);

        if(empty($request->file('image'))){
            $data = $request->all();
            $data ['slug'] = Str::slug($request->judul_materi);
            
            $materi = Materi::findOrFail($id);
            Storage::delete($materi->image);
            $materi->update($data);  
            Alert::success('Success', 'Berhasil Teredit!'); 
        return redirect('/materi');
            // ->with('success', 'Your data has been Updated!');
        } else {
            $data = $request->all();
            $data ['slug'] = Str::slug($request->judul_materi);
            $data['image'] = $request->file('image')->store('materi');
            $materi = Materi::findOrFail($id);
            $materi->update($data); 
            Alert::success('Success', 'Berhasil Teredit!');  
        return redirect('/materi');
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
        $materi = Materi::find($id);
        $materi->delete();
        Alert::info('Success', 'Berhasil Terhapus');
        return redirect ('/materi');
        // ->with('success', 'Your data has been Deleted!');
    }
}
