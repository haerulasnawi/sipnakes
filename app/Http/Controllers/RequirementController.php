<?php

namespace App\Http\Controllers;

use App\requirement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use \App\Jnake;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jnakes = Jnake::all();
        return view('pages.requirement.index', ['jnakes' => $jnakes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\requiremen  $requiremen
     * @return \Illuminate\Http\Response
     */
    // public function show(requirement $requiremen)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\requiremen  $requiremen
     * @return \Illuminate\Http\Response
     */
    // public function edit(requirement $requiremen)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\requiremen  $requiremen
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, requirement $requiremen)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\requiremen  $requiremen
     * @return \Illuminate\Http\Response
     */
    // public function destroy(requirement $requiremen)
    // {
    //     //
    // }
    public function dataTable(Request $request)
    {
        if (request()->ajax()) {
            $model = DB::table('requirements')
                ->select([DB::raw("CONCAT(requirements.id) as id"), 'nama_jnakes', 'nama_persyaratan', 'persyaratan_link'])
                ->Join('jnakes', 'jnakes.id', '=', 'requirements.jnake_id');
            if ($jnakes = $request->jnakes) {
                $model->where('nama_jnakes', 'like', "%$jnakes%");
            }
            if ($nama_persyaratan = $request->nama_persyaratan) {
                $model->where('nama_persyaratan', 'like', "%$nama_persyaratan%");
            }
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('nakes.show', $model->id),
                        'url_edit' => route('nakes.edit', $model->id),
                        'url_destroy' => route('nakes.destroy', $model->id)
                    ]);
                })
                ->toJson();
        }
    }
}
