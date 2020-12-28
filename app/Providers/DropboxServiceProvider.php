<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Storage::extend('dropbox',function($app,$config){
        //     $client= new DropboxClient($config['authorizationToken']);
        //     return new Filesystem(new DropboxAdapter($client));
        // });

        Storage::extend('dropbox',function($app,$config){
            // $client= new DropboxClient($config['authorizationToken']);
            $client= new DropboxClient(['appKey','appSecret']);
            return new Filesystem(new DropboxAdapter($client));
        });

    }
}
