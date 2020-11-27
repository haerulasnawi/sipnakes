<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Dropbox\Client;
// use Spatie\FlysystemDropbox\DropboxAdapter;


use App\Isip;
use App\Istr;

class DropFileController extends Controller
{
    public function __construct()
    {
        $this->dropbox=Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }
    public function index()
    {
        dd(Storage::disk('dropbox')->allDirectories());
        $files=Istr::all();
        return view('');
    }
    public function store(Request $request)
    {
        $files = $request->file('file');
        foreach($files as $file)
        {
            $fileExtension=$file->getClientOriginalExtension();
            $newName=uniqid().'.'.$fileExtension;
            Storage::disk('dropbox')->put('public/upload',$file,$newName);
        }
        
    }
}
