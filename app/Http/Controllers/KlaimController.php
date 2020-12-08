<?php

namespace App\Http\Controllers;

use App\Nake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlaimController extends Controller
{
    public function cariNakes(Request $request)
    {
        $request->validate([
            'number' => ['required', 'numeric', 'digits:16']
        ]);
        $model = Nake::where("nik", "=", $request->number)
            ->first();
        if (isset($model)) {
            $nik = $model->nik;
            $id = (Auth::user()) ? ($model->id) : '0';
            if (isset($model->isip()->first()->faske->nama_faskes)) {
                $faske = $model->isip()->first()->faske->nama_faskes;
            }else {
                $faske="";
            }
            
            $nama = $model->gelar_depan . ' ' . $model->first_name . ' ' . $model->last_name . ' ' . $model->gelar_belakang;
            $istr = ($model->istr == true) ? (($model->istr->str_ket == 1) ? 'Teregistrasi' : 'Belum Registrasi') : 'Belum Registrasi';
            $model = ([
                // 'id' => $id,
                'nik' => $nik,
                'Nama' => $nama,
                'Profesi' => $model->jnake->nama_jnakes,
                'Registrasi' => $istr,
                'IzinPraktek' => $faske,
            ]);
            // return response($model)->header('Content-Type', 'text/plain');
            return $model;
        }
        return $request->number;
    }
}
