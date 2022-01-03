<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iklan = Iklan::all();
        return view('back.iklan.index', compact('iklan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iklan = Iklan::all();
        return view('back.iklan.create', compact('iklan'));
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
            'judul_iklan' => 'required|min:4',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);

        if(!empty($request->file('image'))){

            $data= $request->all();
            $data['image'] = $request->file('image')->store('iklan');
            Iklan::create($data);

            Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/iklan');
            // ->with('success', 'Your data has been added!');
        } else {
            $data = $request->all();
            
            Iklan::create($data);

            Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/iklan');
            // ->with('success', 'Your data has been added!');
        }
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
        $iklan = Iklan::find($id);
        return view('back.iklan.edit', compact('iklan'));
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
            'judul_iklan' => 'required|min:4',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);

        if(!empty($request->file('image'))){

            $data= $request->all();
            $data['image'] = $request->file('image')->store('iklan');

            $iklan = Iklan::findOrFail($id);
            Storage::delete($iklan->image);
            $iklan->update($data);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/iklan');
            // ->with('success', 'Your data has been added!');
        } else {
            $data= $request->all();

            $iklan = Iklan::findOrFail($id);
            
            $iklan->update($data);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/iklan');
            // ->with('success', 'Your data has been added!');
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
        $iklan = Iklan::find($id);
        $iklan->delete();
        Alert::info('Success', 'Berhasil Terhapus');
        return redirect ('/iklan');
        // ->with('success', 'Your data has been Deleted!');
    }
}
