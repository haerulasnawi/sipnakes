<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use League\Flysystem\Filesystem;


use App\Http\Controllers\NakeController;
use Illuminate\Routing\RouteGroup;

Route::get('/datasipnakes', 'KlaimController@cariNakes');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/curl', function () {
    $response = Http::get('http://sisdmk.kemkes.go.id/sdmk/id_sub_rumpun_pekerjaan', [
        'name' => 'id_rumpun_pekerjaan',
        'page' => 1
    ]);

    dd($response->body());
    // return $response;
});
//istr roure
Route::resource('/str', 'IstrController');
Route::post('table/str', 'IstrController@dataTable')->name('table.str');

Route::resource('/sip', 'IsipController');
Route::post('table/sip', 'IsipController@dataTable')->name('table.sip');

//pengaturan
Route::resource('/persyaratan', 'RequirementController');
Route::post('/table/peryaratan', 'RequirementController@dataTable')->name('table.persyaratan');
//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(['verified', 'checkrole:superadmin,admin,faskes,nakes']);


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


// Route::get('/table/user_biasa', 'NakeController@dataTable')->name('table.user.biasa');
Route::group(['middleware' => ['auth', 'checkrole:superadmin', 'verified']], function () {
    Route::resource('/jnakes', 'JnakeController');
});

Route::group(['middleware' => ['auth', 'checkrole:,superadmin,admin', 'verified']], function () {

    //faskes route
    Route::resource('/faskes', 'FaskeController');
    Route::post('/table/daftar_faskes', 'FaskeController@dataTable')->name('table.daftar.faskes');
});

Route::group(['middleware' => ['auth', 'checkrole:superadmin,admin,faskes,nakes,guest', 'verified']], function () {
    //User route
    Route::resource('/users', 'UserController');
    Route::post('/table/user', 'UserController@dataTable')->name('table.daftar.user');
    //nakes route
    Route::resource('/nakes', 'NakeController');
    Route::post('/table/nakes', 'NakeController@dataTable')->name('table.daftar.nakes');
});

Route::group(['middleware' => ['auth', 'checkrole:nakes', 'verified']], function () {
    Route::get('/profile', function () {
        return view('pages.nakes.profile.index');
    })->name('profile.nakes');
});

Route::group(['middleware' => ['auth', 'checkrole:faskes', 'verified']], function () {
    Route::get('/profile_faskes', function () {
        return view('pages.faskes.profile.index');
    })->name('profile.faskes');
});




// Route::get('list','DropFileController@index');

Route::get('/list', function() {
    $date_now=new DateTime("now");
    // $date_now=$date_now->format("yy-m-d");

    // dd($date_now);
    $date_now=$date_now->sub(new DateInterval("P60D"));
    $date_now=$date_now->format("yy-m-d");
    // $date_next=new DateTime('2019-01-01');
    // $date=$date_now->diff($date_next);
    // $date=$date->format('%r%a');
    return $date_now;



    // $client = new Spatie\Dropbox\Client('mA2b5ITMl78AAAAAAAAAAUSo8Yo66xPhfvAt7jpJcgVY6aDucjKbtXFz-hC6BJLS');
    // $client=Storage::disk('dropbox')->get('/');
    // // $client = new Spatie\Dropbox\Client(['1ajsglc9co7o5af','6mm5w7qmg2jui5l']);
    // // $client = new Spatie\Dropbox\Client(['6mm5w7qmg2jui5l']);
    // // $client=$client->listFolder('/');
    // return $client;
});