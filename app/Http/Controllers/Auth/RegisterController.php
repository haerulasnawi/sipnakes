<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Nake;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    // public function register(Request $request)
    // {
    //     // dd($request->all());
    // }

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // public function register(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data);
    // }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        // $time = strtotime($data['tgl_lahir']);
        // $newformat = date($time);
        // dd($newformat);
        // Nake::create([
        //     'user_id' => $user['id'],
        //     'full_name' => $full_name,
        //     'gender' => $data['gender'],
        //     // 'tgl_lahir' => $newformat,
        //     'tgl_lahir' => $data['tgl_lahir'],
        //     'nakes_phone_number' => $data['phone'],
        // ]);

        $nake = new Nake();
        $nake->user_id = $user->id;
        $nake->full_name = $data['first_name'] . ' ' . $data['last_name'];
        $nake->gender = $data['gender'];
        $nake->tgl_lahir = $data['tgl_lahir'];
        $nake->nakes_phone_number = $data['phone'];
        $nake->save();

        return $user;
    }
    protected function registered(Request $request, $user)
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard');
        }
        if (Auth::user()->role == 'faskes') {
            return view('pages.faskes.dashboard');
        }
        if (Auth::user()->role == 'nakes') {
            return view('pages.nakes.profile.index');
        }
    }
}
