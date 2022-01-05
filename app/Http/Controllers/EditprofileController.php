<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EditprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('back.profile.edit');
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
            'name' => ['string', 'min:4', 'required'],
            'email' => ['email', 'min:4', 'required'],
            'password' => 'nullable|string|min:5|confirmed'
            // 'password' => ['string', 'min:5', 'required'],
        ]);

        $data = $request->all();
        $data['name'] = ($request->input('name'));
        $data['password'] = Hash::make($request->input('password'));

        $users = User::findOrFail($id);
        $users->update($data);

        Alert::success('Success', 'Berhasil Teredit!');
        return redirect('/profile');


        // auth()->user()-> update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
