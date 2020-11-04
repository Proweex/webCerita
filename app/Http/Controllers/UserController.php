<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::count();
        $user = User::all();
        return view('pages.Admin.userManagement.userManager')->with(['user' => $user, 'userCount' => $userCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Admin.userManagement.newUser');
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
            'nama' => 'required',
            'email' => 'required',
            'foto' => 'required|image|max:1000'
        ]);

        /**
         * File Upload
         */
        if($request->hasFile('foto')){
            //get file name with Extension
            $fileNameWithExt = $request->file('foto')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extesion
            $ext = $request->file('foto')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            //upload image
            $path = $request->file('foto')->storeAs('public/assets/foto_profil', $fileNameToStore);
        }

        $user = new User;
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->foto_profile = $fileNameToStore;
        $user->save();

        return redirect("/m/user-manager")->with('success', 'Berhasil ditambahkan');
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
        $user = User::find($id);
        return view('pages.Admin.userManagement.editUser')->with(['user' => $user]);
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
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'foto' => 'image|nullable|max:1000'
        ]);

        $user = User::find($id);
        /**
         * File Upload
         */
        if($request->hasFile('foto')){
            //get file name with Extension
            $fileNameWithExt = $request->file('foto')->getClientOriginalName();
            //get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just extesion
            $ext = $request->file('foto')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$ext;
            //upload image
            $path = $request->file('foto')->storeAs('public/assets/foto_profil', $fileNameToStore);
        }else{
            $fileNameToStore = $user->foto_profile;
        }

        
        $user->name = $request->input('nama');
        $user->email = $request->input('email');
        if($request->password != null){
            $user->password = $request->input('password');
        }else{
            $user->password = $user->password;
        }

        if($request->hasFile('foto')){
            $user->foto_profile = $fileNameToStore;
        }

        $user->save();

        return redirect("/m/user-manager")->with('success', 'Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect("/m/user-manager")->with('success', 'Data user berhasil dihapus');
    }
}
