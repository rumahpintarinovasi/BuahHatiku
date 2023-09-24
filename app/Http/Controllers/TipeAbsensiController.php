<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipeAbsensi;

class TipeAbsensiController extends Controller
{
    //
    public static function view(){
        $tipe_absensies = TipeAbsensi::all();
        return view('tipe_absensi_insert')->with([
            'tipe_absensies' => $tipe_absensies
        ]);
    }

    public static function insert(Request $request){
        $tipe_absensi = new TipeAbsensi;

        $tipe_absensi->JenisAbsensi = $request->JenisAbsensi;
        $tipe_absensi->Keterangan = $request->Keterangan;
        $tipe_absensi->Harga = $request->Harga;
        $tipe_absensi->Durasi = $request->Durasi;
        $tipe_absensi->save();

        return redirect('/tipe_absensi_insert');
    }

    public static function delete($IdTipe){
        $tipe_absensi = TipeAbsensi::where('IdTipe', $IdTipe)->first();
        $tipe_absensi->delete();
        return redirect('/tipe_absensi_insert');
    }
}