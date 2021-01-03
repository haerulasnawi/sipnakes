<?php

namespace App\Http\Controllers;

use App\Istr;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use DateTime;

class IstrController extends Controller
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
    public function create()
    {
        $model=new Istr;
        return view('pages.nakes.formStr',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=DB::table('istrs')->orderBy('str_mass','desc')->first();
        if ($data==null||($data->str_mass)<=60) {
            $request->validate([
                'str_nomor'=>['required'],
                'str_terbit'=>['required','date'],
                'str_exp'=>['required','date'],
                'str_file'=>['required','mimes:pdf'],
            ]);
            $ext=$request->file('str_file')->getClientOriginalExtension();
            $nik=Auth::user()->nake->nik;
            $nameStr='str_'.$nik.'_'.$request->str_exp.'.'.$ext;
            $data=Storage::putFileAs('nakes/'.$nik,$request->file('str_file'),$nameStr);
            $tgl_exp=new DateTime($request->str_exp);
            $tgl_now=new DateTime("now");
            $mass=$tgl_now->diff($tgl_exp);
            $mass=$mass->format("%r%a");
            if ($mass<=0) {
                return response(['info','Opss','Str anda sudah tidak aktif, mohon input str yang masih aktif']);
            }
            if ($mass<=30) {
                return response(['info','Opss','Masa Aktif STR anda kurang dari 30 hari, mohon segera mengurus perpanjangan str']);
            }
            Istr::create(array_merge($request->all(), [
                'nake_id' => Auth::user()->nake->id,
                'jnake_id'=>Auth::user()->nake->jnake_id,
                'str_name'=>$nameStr,
                'str_link'=>url($data),
                'str_size'=>Storage::size($data),
                'str_mass'=>$mass
                ]));
            return response(['success','Yeay','Anda Berhasil Menambahkan STR']);               
        }
        if (($data->str_mass)>60) {
            $date=$data->str_exp;
            $date->sub(new DateInterval("P60D"));
            $date->format('Y-m-d');
            // $date=$date->format("yy-m-d");
            return response(['info','Opss','Belum Waktunya anda menambahkan STR, anda dapat menambahkan str pada tanggal '.$date.'']);
        }                   
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
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    public function dataTable(Request $request)
    {
        if (request()->ajax()) {
            $model = DB::table('istrs')->select([DB::raw("CONCAT(istrs.id) as id"), 'str_nomor', 'str_terbit', 'str_exp', 'nake_id'])
                ->where('nake_id', '=', Auth::user()->nake->id);
            // dd($model);
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('status', function ($model) {
                    return '<a href="" class="btn btn-outline-secondary " title="Detail: ' . $model->id . '"><i class="far fa-eye"> Detail</i></a>';
                })
                ->addColumn('action', function ($model) {
                    return '<a href="' . route('nakes.show', $model->id) . '" class="btn btn-secondary " title="Detail: ' . $model->id . '"><i class="far fa-eye"></i></a>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }
}
