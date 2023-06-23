<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('back.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('back.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('judul'));
        $data['user_id'] = Auth::id();
        $data['views'] = 0;
        $data['image'] = $request->file('image')->store('artikel');
        Artikel::create($data);

        Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/artikel');
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
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        return view('back.artikel.edit', compact('artikel', 'kategori'));
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
        // $this-> validate($request, [
        //     'judul' => 'required|min:4',
        // ]);

        if (empty($request->file('image'))) {

            $artikel = Artikel::find($id);
            $artikel->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->input('judul')),
                'desc' => $request->desc,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'is_active' => $request->is_active,
            ]);
            Alert::success('Success', 'Berhasil Teredit!');
            return redirect('/artikel');
            // ->with('success', 'Your data has been Updated!');
        } else {
            $artikel = Artikel::find($id);
            Storage::delete($artikel->image);
            $artikel->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->input('judul')),
                'desc' => $request->desc,
                'kategori_id' => $request->kategori_id,
                'user_id' => Auth::id(),
                'is_active' => $request->is_active,
                'image' => $request->file('image')->store('artikel'),

            ]);
            Alert::success('Success', 'Berhasil Teredit!');
            return redirect('/artikel');
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
        $artikel = Artikel::find($id);
        $artikel->delete();

        Alert::info('Success', 'Berhasil Terhapus');
        return redirect('/artikel');
        // ->with('success', 'Your data has been Deleted!');
    }
}
