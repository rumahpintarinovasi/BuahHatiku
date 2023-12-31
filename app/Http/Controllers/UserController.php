<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\TipeAbsensi;


class UserController extends Controller
{
    //
    public static function home(){
        $user = Auth::user();
        if($user->Role == 3){
            return redirect('/daftar_absensi_terapis');
        } elseif($user->Role == 4){
            return redirect('/jadwal_rolling_view');
        }
        return redirect('/dashboard');
    }

    public static function view(){
        $users = User::all();
        return view('userview')->with('users', $users);
    }

    public static function insert_view(){
        $tipe_absensi = TipeAbsensi::all();
        return view('userform')->with([
            'tipe_absensi' => $tipe_absensi,
        ]);
    }

    public static function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NoIdentitas' => 'required|unique:users|max:16',
            'Role' => 'required',
            'Nama' => 'required',
            'Alamat' => 'required',
            'NoHP' => 'required',
            'Username' => 'required|unique:users',
            'Password' => 'required',
            'Email' => 'required|email|unique:users',
            'IdTipe' => 'required_if:Role,3'
        ], [
            'required' => ':attribute harus diisi',
            'IdTipe.required_if' => 'Terapis harus isi Tipe Absensi'
        ]);
        if ($validator->fails()) {
            return redirect('/user_form')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;

        $user->NoIdentitas = $request->NoIdentitas;
        $user->Role = $request->Role;
        if($request->Role==3){
            $user->IdTipe = $request->IdTipe;
        }
        $user->Nama = $request->Nama;
        $user->Alamat = $request->Alamat;
        $user->NoHP = $request->NoHP;
        $user->Username = $request->Username;
        $user->Password = Hash::make($request->Password);
        $user->Email = $request->Email;
        $user->StatusAktif = 1;

        $user->save();
        return redirect('user_view');
    }

    public static function update_view($NoIdentitas){
        $user = User::where('NoIdentitas', $NoIdentitas)->first();
        $tipe_absensi = TipeAbsensi::all();
        return view('useredit')->with([
            'user' => $user,
            'tipe_absensi' => $tipe_absensi,
        ]);
    }

    public static function update(Request $request)
    {
        $user = User::where('NoIdentitas', $request->NoIdentitas)->first();
        $validator = Validator::make($request->all(), [
            'Role' => 'required',
            'Nama' => 'required',
            'Alamat' => 'required',
            'NoHP' => 'required',
            'Username' => 'required|unique:users,Username,'.$user->NoIdentitas.',NoIdentitas',
            'Password' => 'nullable',
            'Email' => 'required|email|unique:users,Email,'.$user->NoIdentitas.',NoIdentitas',
            'IdTipe' => 'required_if:Role,3'
        ], [
            'required' => ':attribute harus diisi',
            'IdTipe.required_if' => 'Terapis harus isi Tipe Absensi'
        ]);
        if ($validator->fails()) {
            return redirect('/user_edit/'.$request->NoIdentitas)
                        ->withErrors($validator)
                        ->withInput();
        }
        $user->Role = $request->Role;
        if($request->Role==3){
            $user->IdTipe = $request->IdTipe;
        }
        $user->Nama = $request->Nama;
        $user->Alamat = $request->Alamat;
        $user->NoHP = $request->NoHP;
        $user->Username = $request->Username;
        if($request->Password){
            $user->Password = Hash::make($request->Password);
        }
        $user->Email = $request->Email;

        $user->save();
        return redirect('user_view');
    }

    public static function update_status($NoIdentitas){
        $user = User::where('NoIdentitas', $NoIdentitas)->first();
        $user->StatusAktif = $user->StatusAktif == 1 ? 0 : 1 ;
        $user->save();
        return redirect('user_view');
    }

    public static function delete($NoIdentitas){
        $user = User::where('NoIdentitas', $NoIdentitas)->first();
        $user->delete();
        return redirect('user_view');
    }
}
