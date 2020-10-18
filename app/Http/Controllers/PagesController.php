<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelCerita;
use App\Models\TabelJilid;
use App\Models\TabelBab;

class PagesController extends Controller
{
    public function index(){
        $cerita = TabelCerita::all();
        return view('pages.index')->with('cerita', $cerita);
    }

    public function login(){
        return view('pages.login');
    }

    public function showCerita($idCerita){
        $id = $idCerita;
        $judul = TabelCerita::find($id);
        $nomorJilid = $id;
        $listJilid = TabelJilid::all()->where('idCerita', $id);
        $data = [
            'judul'=>$judul->judulCerita,
            'idCerita'=>$judul->id,
            'jilid'=>$listJilid
        ];
        return view('pages.jilid.index')->with($data);
    }

    public function showJilid($idCerita, $nomorJilid){
        $judul = TabelCerita::find($idCerita);

        $listBab = TabelBab::all()->where('idJilid', $nomorJilid);
        $data = [
            'judul'=>$judul->judulCerita,
            'idCerita'=>$judul->id,
            'nomorJilid'=>$nomorJilid,
            'bab'=>$listBab
        ];
        return view('pages.bab.index')->with($data);
    }

    public function showsText($idCerita, $nomorJilid, $nomorBab){
        $id = $idCerita;
        $judul = TabelCerita::find($id);

        $textc = TabelBab::find($nomorBab);

        $data = [
            'judul'=>$judul->judulCerita,
            'idCerita'=>$judul->id,
            'nomorJilid'=>$nomorJilid,
            'bab'=>$nomorBab,
            'judulBab'=>$textc->judulBab,
            'text'=>$textc->textsCerita,
            'tanggalDibuat'=>$textc->created_at
        ];
        return view('pages.text.index')->with($data);
    }
}
