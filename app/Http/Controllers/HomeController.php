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
        if (Auth::user()->role == 'guest') {
            // $u = Auth::user()->toJson();

            // dd($u);
            Alert::info('SELAMAT DATANG', 'Cek identitas NIK atau NIP anda!')->showConfirmButton('OK', '#3085d6');
            return view('cariidentitas')->with('success', 'Task Created Successfully!');
        }
        // return view('dashboard');
        return redirect('dashboard');
    }
}
