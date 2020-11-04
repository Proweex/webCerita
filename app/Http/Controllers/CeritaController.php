<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelCerita;
use App\Models\TabelJilid;

class CeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cerita = TabelCerita::all();
        return view('pages.cerita.index')->with('cerita', $cerita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cerita.createCerita');
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
            'judul' => 'required'
        ]);

        // Create Cerita
        $post = new TabelCerita;
        $post->judulCerita = $request->input('judul');
        $post->coverImage = $request->input('cover');
        $post->save();

        return redirect('/cerita')->with('success', 'Berhasil ditambahkan');
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
    public function edit($idCerita)
    {
        $id = $idCerita;
        $judul = TabelCerita::find($id);
        $nomorJilid = $id;
        $listJilid = TabelJilid::all()->where('idCerita', $id);
        $data = [
            'judul'=>$judul->judulCerita,
            'idCerita'=>$judul->id
            // 'jilid'=>$listJilid
        ];
        return view('pages.cerita.edit')->with($data);
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
            'judul' => 'required'
        ]);

        // Create Cerita
        $post = TabelCerita::find($id);
        $post->judulCerita = $request->input('judul');
        $post->coverImage = $request->input('cover');
        $post->save();

        return redirect('/cerita')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TabelCerita::find($id);
        $post->delete();
        return redirect('/cerita')->with('success', 'telah terhapus');
    }
}
