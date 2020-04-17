<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Nake;
use \App\Jnake;
use \App\Faske;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use lluminate\Http\Response;
use Illuminate\Support\Str;
// use DataTables;


class NakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.nakes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nakes = new Nake;
        // $jnakes = Jnake::all();
        return view('pages.nakes.form', compact('nakes'))->with('jnakes');
        // return view('pages.nakes.form');
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
    public function dataTable(Request $request)
    {

        if (request()->ajax()) {
            if (Auth::user()->role == 'faskes') {
                $model = DB::table('isips')
                    ->where('faske_id', '=', Auth::user()->faske->id)
                    ->select([DB::raw("CONCAT(isips.nake_id) as id"), 'full_name', 'gender', 'str_mass', 'nama_jnakes', 'nakes_phone_number', 'tgl_lahir', 'nik', 'nip', 'gelar', 'str_ket'])
                    ->Join('jnakes', 'jnakes.id', '=', 'isips.jnake_id')
                    ->Join('nakes', 'nakes.id', '=', 'isips.nake_id')
                    ->Join('istrs', 'istrs.nake_id', '=', 'isips.nake_id');
            }
            if (Auth::user()->role == 'admin') {
                $model = DB::table('isips')
                    ->select([DB::raw("CONCAT(isips.nake_id) as id"), 'full_name', 'gender', 'str_mass', 'nama_jnakes', 'nakes_phone_number', 'tgl_lahir', 'nik', 'nip', 'gelar', 'nama_faskes', 'str_ket'])
                    ->Join('jnakes', 'jnakes.id', '=', 'isips.jnake_id')
                    ->Join('nakes', 'nakes.id', '=', 'isips.nake_id')
                    ->Join('istrs', 'istrs.nake_id', '=', 'isips.nake_id')
                    ->Join('faskes', 'faskes.id', '=', 'isips.faske_id');
            }
            if ($status = $request->status) {
                $model->where('str_ket', 'like', "%$status%");
            }
            if ($nik = $request->nik) {
                $model->where('nik', 'like', "%$nik%");
            }
            if ($full_name = $request->full_name) {
                $model->where('full_name', 'like', "%$full_name%");
            }
            if ($gender = $request->gender) {
                $model->where('gender', 'like', "%$gender%");
            }
            $datatables = DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('progress', function ($model) {
                    return '<div class="media-progressbar">
                    <div class="progress-text">' . $model->str_mass . '%</div>
                    <div class="progress" data-height="6" style="height: 6px;">
                      <div class="progress-bar bg-primary" data-width="' . $model->str_mass . '%" style="width: ' . $model->str_mass . '%;"></div>
                    </div>
                  </div>';
                })
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('nakes.show', $model->id),
                        'url_edit' => route('nakes.edit', $model->id),
                        'url_destroy' => route('nakes.destroy', $model->id)
                    ]);
                })
                ->addColumn('status', function ($model) {
                    if ($model->str_ket == 1) {
                        return '<td value="' . $model->str_ket . '">Aktif</td>';
                    }
                    if ($model->str_ket == 2) {
                        return '<td value="' . $model->str_ket . '">Tidak Aktif</td>';
                    }
                    if ($model->str_ket == 3) {
                        return '<td value="' . $model->str_ket . '">Pending</td>';
                    }
                    return '<td value="' . $model->str_ket . '">Tidak Aktif</td>';
                    // return view('layouts._status', ['model' => $model]);
                });
            return $datatables
                ->rawColumns(['progress', 'action', 'status'])
                ->toJson();
        }
    }
}
