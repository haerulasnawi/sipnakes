<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FaskeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.faskes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $model = DB::table('faskes')
                ->select([DB::raw("CONCAT(faskes.id) as id"), 'faske_kode', 'nama_faskes', 'alamat_faskes', 'faskes_phone_number']);
            if ($jnakes = $request->jnakes) {
                $model->where('nama_jnakes', 'like', "%$jnakes%");
            }
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return '<a href="' . route('nakes.show', $model->id) . '" class="btn btn-outline-secondary " title="Detail: ' . $model->id . '"><i class="far fa-eye"> Detail</i></a>';
                })
                ->toJson();
        }
    }
}
