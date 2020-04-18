<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class IstrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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