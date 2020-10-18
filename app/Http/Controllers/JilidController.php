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
        $jilid = TabelJilid::where('idCerita', $idCerita)->count();
        $judul = TabelCerita::find($idCerita);
        $nomorJilid;
        if ($jilid>0) {
            return $jilid=+1;
        } else {
            $jilid=1;
        }
        
        $data =[
            'jilid'=>$jilid,
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
