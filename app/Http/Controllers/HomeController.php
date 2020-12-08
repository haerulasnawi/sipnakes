<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Auth::user()->role);
        $user = Auth::user();
        if (($user->role == 'guest') && ($user->nake == true)) {
            return view("pages.nakes.profile.index");
        }
        if (($user->role == 'guest') && ($user->klaim == true)) {
            $model = $user->klaim->nake;
            if (isset($model->isip()->first()->faske->nama_faskes)) {
                $faske = $model->isip()->first()->faske->nama_faskes;
            }else {
                $faske="";
            }
            $nama = $model->gelar_depan . ' ' . $model->first_name . ' ' . $model->last_name . ' ' . $model->gelar_belakang;
            $istr = ($model->istr == true) ? (($model->istr->str_ket == 1) ? 'Teregistrasi' : 'Belum Registrasi') : 'Belum Registrasi';
            $model = ([
                'Nama' => $nama,
                'Profesi' => $model->jnake->nama_jnakes,
                'Registrasi' => $istr,
                'IzinPraktek' => $faske,
            ]);
            $model = (object)$model;
            return view('blank', ['model' => $model]);
        }
        if ($user->role == 'guest') {
            // $u = Auth::user()->toJson();

            // dd($u);
            Alert::info('SELAMAT DATANG', 'Cek identitas NIK atau NIP anda!')->showConfirmButton('OK', '#3085d6');
            return view('cariidentitas')->with('success', 'Task Created Successfully!');
        }
        // return view('dashboard');
        return redirect('dashboard');
    }
}
