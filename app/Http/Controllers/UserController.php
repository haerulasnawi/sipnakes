<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Jnake;
use \App\Faske;
use \App\User;
use Illuminate\Contracts\Session\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jnakes = Jnake::all();
        // $faskes = Faske::all();
        // return view('pages.user.user_biasa', ['jnakes' => $jnakes, 'faskes' => $faskes]);
        return view('pages.user.user_biasa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new user();
        return view('pages.user.form', compact('model'));
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
    public function edit($id)
    {
        $model = User::findOrFail($id);
        // dd($model);
        return view('pages.user.form', compact('model'));
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
        // dd($request->all());
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $model['password'] = $request->password;
        // dd($model);
        // $model['password'] = Hash::make($model['password']);
        // dd($model);
        User::findOrFail($id)->update(['password' => Hash::make($model['password'])]);
        $request->session()->flash('success', 'Data Berhasil Diupdate!');
        // return redirect()->route('home');
    }

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

    // public function json()
    // {
    //     $model = DB::table('users')->select([
    //         DB::raw("CONCAT(users.id) as id"),
    //         // DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name"),
    //         'username', 'email', 'role'
    //     ])->get();
    //     return response()->json($model);
    // }
    public function dataTable(Request $request)
    {
        if (request()->ajax()) {
            if (Auth::user()->role == 'superadmin') {
                $model = DB::table('users')->select([
                    DB::raw("CONCAT(users.id) as id"),
                    // DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name"),
                    'username', 'email', 'role'
                ]);
            }
            if (Auth::user()->role == 'admin') {
                $model = DB::table('users')->select([
                    DB::raw("CONCAT(users.id) as id"),
                    // DB::raw("CONCAT(users.first_name,' ',users.last_name) as full_name"),
                    'username', 'email', 'role'
                ])->where('role', '!=', 'superadmin');
            }
            if (Auth::user()->role == 'faskes') {
                $model = DB::table('users')
                    ->join('nakes', 'users.id', '=', 'nakes.user_id')
                    ->join('isips', 'isips.nake_id', '=', 'nakes.id')
                    ->select([DB::raw("CONCAT(nakes.user_id)as id"), 'username', 'email', 'role'])
                    ->where('isips.faske_id', '=', Auth::user()->faske->id);
            }


            if ($role = $request->role) {
                $model->where('role', 'like', "%$role%");
            }
            if ($email = $request->email) {
                $model->where('email', 'like', "%$email%");
            }
            if ($username = $request->username) {
                $model->where('username', 'like', "%$username%");
                // $model->WhereRaw("concat(first_name, ' ', last_name) like '%$full_name%'")
                //     ->orWhere('username', 'like', "%$full_name%");
            }
            $datatables = DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return '<a href="' . route('users.edit', $model->id) . '" class="btn btn-outline-secondary modal-show edit" title="Username: ' . $model->username . ' email: ' . $model->email . '"><i class="fas fa-key"> Ganti Password</i></a>';
                    // return view('layouts._action', [
                    //     'model' => $model,
                    //     'url_show' => route('nakes.show', $model->id),
                    //     'url_edit' => route('nakes.edit', $model->id),
                    //     'url_destroy' => route('nakes.destroy', $model->id)
                    // ]);
                });
            // ->rawColumn('full_name','action');

            return $datatables
                ->make(true);
        }
    }
}
