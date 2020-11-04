<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelCerita;
use App\Models\TabelJilid;
use App\Models\TabelBab;
use Illuminate\Support\Facades\DB;

class BabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCerita, $nomorJilid)
    {
        // $bab = TabelBab::where('nomorJilid', $nomorJilid)->count();
        return $bab = DB::select('select count(b.idJilid) from tabel_jilids a join tabel_babs b on a.nomorjilid = b.idjilid');
        $jilid = TabelJilid::find($nomorJilid);
        $judul = TabelCerita::find($idCerita);

        if ($bab>0) {
            $bab=$bab+1;
        } else {
            $bab=1;
        }
        
        $data =[
            'jilid'=>$jilid,
            'idCerita'=>$idCerita,
            'judulCerita'=>$judul->judulCerita
        ];
        return view('pages.bab.createBab')->with($data);
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
    // public function show($id)
    // {
    //     //
    // }

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
