<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('back.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategori.create');
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
            'nama_kategori' => 'required|min:4',
        ]);

        Kategori::create([
            'nama_kategori' => $request->input('nama_kategori'),
            'slug' => Str::slug($request->input('nama_kategori'))
        ]);
        Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/kategori');
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
        $kategori = Kategori::find($id);
        return view('back.kategori.edit', compact('kategori')); 
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

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('nama_kategori'));

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/kategori');
            // ->with('success', 'Your data has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        Alert::info('Success', 'Berhasil Terhapus');
        return redirect ('/kategori');
        // ->with('success', 'Your data has been Deleted!');
    }
}
