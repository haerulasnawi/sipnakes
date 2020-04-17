<?php

use Illuminate\Database\Seeder;

class NakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Nake::class, 1000)->create();
    }
}
