<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelCerita;
use App\Models\TabelJilid;

class JilidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($idCerita)
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCerita)
    {
        $jilid = TabelJilid::where('idCerita', $idCerita)->orderBy('nomorJilid', 'desc')->limit(1)->get();
        $judul = TabelCerita::find($idCerita);
    
        if ($jilid != null) {
            $nJilid = $jilid[0]['nomorJilid'];
            $nJilid=$nJilid+1;
        } else {
            $nJilid=1;
        }
        
        $data =[
            'jilid'=>$nJilid,
            'idCerita'=>$idCerita,
            'judulCerita'=>$judul->judulCerita
        ];
        return view('pages.jilid.createJilid')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idCerita)
    {
        // return $idCerita;
        $post = new TabelJilid;
        $post->nomorJilid = $request->input('jilid');
        $post->idCerita = $idCerita;
        $post->save();

        return redirect("/c/{$idCerita}")->with('success', 'Berhasil ditambahkan');
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
        //
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
        //
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
