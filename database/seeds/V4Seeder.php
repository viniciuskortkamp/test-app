<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class V4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $current_version = env('BUZZY_VERSION', '0.0.0');
        // only run for verison 3.5
        if (version_compare($current_version, '4.0.0', '>=')) return;

        Model::unguard();

        $this->call(MenuTableSeeder::class);

        Model::reguard();
    }
}
