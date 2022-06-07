<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('back.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slide = Slide::all();
        return view('back.slide.create', compact('slide'));
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
            'judul_slide' => 'required|min:4',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);

        if(!empty($request->file('image'))){

            $data= $request->all();
            $data['image'] = $request->file('image')->store('slidebanner');
            Slide::create($data);

            Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/slide');
            // ->with('success', 'Your data has been added!');
        } else {
            $data = $request->all();
            
            Slide::create($data);

            Alert::success('Success', 'Berhasil Tersimpan!');
        return redirect('/slide');
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
        $slide = Slide::find($id);
        return view('back.slide.edit', compact('slide'));
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
            'judul_slide' => 'required|min:4',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);

        if(!empty($request->file('image'))){

            $data= $request->all();
            $data['image'] = $request->file('image')->store('slidebanner');

            $slide = Slide::findOrFail($id);
            Storage::delete($slide->image);
            $slide->update($data);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/slide');
            // ->with('success', 'Your data has been added!');
        } else {
            $data= $request->all();

            $slide = Slide::findOrFail($id);
            
            $slide->update($data);
            Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/slide');
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
        $slide = Slide::find($id);
        $slide->delete();
        Alert::info('Success', 'Berhasil Terhapus');
        return redirect ('/slide');
        // ->with('success', 'Your data has been Deleted!');
    }
}
