<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Jnake;
use \App\Faske;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jnakes = Jnake::all();
        $faskes = Faske::all();
        return view('pages.user.user_biasa', ['jnakes' => $jnakes, 'faskes' => $faskes]);
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
            $model = DB::table('users')->select([
                DB::raw("CONCAT(users.id) as id"),
                DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name"),
                'username', 'email', 'role'
            ])
                ->where('role', '!=', 'admin');
            if ($role = $request->role) {
                $model->where('role', 'like', "%$role%");
            }
            if ($email = $request->email) {
                $model->where('email', 'like', "%$email%");
            }
            if ($full_name = $request->full_name) {
                $model->WhereRaw("concat(first_name, ' ', last_name) like '%$full_name%'")
                    ->orWhere('username', 'like', "%$full_name%");
            }
            $datatables = DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('nakes.show', $model->id),
                        'url_edit' => route('nakes.edit', $model->id),
                        'url_destroy' => route('nakes.destroy', $model->id)
                    ]);
                });
            // ->rawColumn('full_name','action');

            return $datatables
                ->make(true);
        }
    }
}
