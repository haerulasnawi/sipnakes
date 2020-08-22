<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Nake;
use \App\Jnake;
use \App\Faske;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use lluminate\Http\Response;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;

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
        $model = new Nake;
        $jnakes = Jnake::all();
        $jnakes = $jnakes->pluck('nama_jnakes', 'id');
        return view('pages.nakes.form', compact(['model', 'jnakes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jnakes' => ['required', 'numeric', 'max:2'],
            'nik' => ['sometimes', 'required', 'numeric', 'digits:16', 'unique:nakes'],
            'nip' => ['numeric', 'digits:18', 'nullable'],
            'gelar_depan' => ['string', 'max:10', 'nullable'],
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['string', 'min:3', 'max:255', 'nullable'],
            'gelar_belakang' => ['string', 'max:10', 'nullable'],
            'gender' => ['required', 'string', 'max:1'],
            'tgl_lahir' => ['required', 'date'],
            'nakes_phone_number' => ['numeric', 'digits:12', 'nullable'],
            'alamat' => ['string', 'max:255', 'nullable']
        ]);
        $model = Nake::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

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

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    // }
    public function dataTable(Request $request)
    {
        if (request()->ajax()) {
            if (Auth::user()->role == 'faskes') {
                $model = DB::table('isips')
                    ->where('faske_id', '=', Auth::user()->faske->id)
                    ->Join('jnakes', 'jnakes.id', '=', 'isips.jnake_id')
                    ->Join('nakes', 'nakes.id', '=', 'isips.nake_id')
                    ->Join('istrs', 'istrs.nake_id', '=', 'isips.nake_id')
                    ->select([DB::raw("CONCAT(isips.nake_id) as id"), DB::raw("CONCAT(nakes.gelar_depan,' ',nakes.first_name,' ',nakes.last_name,' ',nakes.gelar_belakang) as full_name"), 'gender', 'str_mass', 'nama_jnakes', 'nakes_phone_number', 'tgl_lahir', 'nik', 'nip', 'gelar_depan', 'gelar_belakang', 'str_ket']);
            }
            if (Auth::user()->role == 'admin' || 'superadmin') {
                $model = DB::table('isips')
                    ->Join('jnakes', 'jnakes.id', '=', 'isips.jnake_id')
                    ->Join('nakes', 'nakes.id', '=', 'isips.nake_id')
                    ->Join('istrs', 'istrs.nake_id', '=', 'isips.nake_id')
                    ->Join('faskes', 'faskes.id', '=', 'isips.faske_id')
                    ->select([DB::raw("CONCAT(isips.nake_id) as id"), DB::raw("CONCAT(nakes.gelar_depan,' ',nakes.first_name,' ',nakes.last_name,' ',nakes.gelar_belakang) as full_name"), 'gender', 'str_mass', 'nama_jnakes', 'nakes_phone_number', 'tgl_lahir', 'nik', 'nip', 'gelar_depan', 'gelar_belakang', 'nama_faskes', 'str_ket']);
            }
            if ($status = $request->status) {
                $model->where('str_ket', 'like', "%$status%");
            }
            if ($nik = $request->nik) {
                $model->where('nik', 'like', "%$nik%");
            }
            if ($full_name = $request->full_name) {
                // $model->where('full_name', 'like', "%$full_name%");
                $model->WhereRaw("concat(gelar_depan,first_name, ' ', last_name,gelar_belakang) like '%$full_name%'")
                    ->orWhere('full_name', 'like', "%$full_name%");
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
    public function cariNakes(Request $request)
    {
        $request->validate([
            'number' => ['required', 'numeric', 'digits:16']
        ]);

        $salah = $request->number;
        // dd($salah);
        $model = Nake::where("nik", "=", $request->number)
            ->first();
        if (isset($model)) {
            // dd($model);
            return $model;
        } else {
            return $salah;
        }
    }
}
