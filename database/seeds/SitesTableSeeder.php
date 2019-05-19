<?php

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sites')->insert([
            'name' => 'google site',
            'url' => 'google.com',
            'server_id' => 1,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        \DB::table('sites')->insert([
            'name' => 'Ebay site',
            'url' => 'ebay.com',
            'server_id' => 1,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        \DB::table('sites')->insert([
            'name' => 'Yahoo',
            'url' => 'yahoo.com',
            'server_id' => 2,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
