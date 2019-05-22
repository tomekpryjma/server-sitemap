<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $serverIDs = \DB::table('servers')->pluck('id');

        for ($i = 0; $i < 16; $i++) {
            \DB::table('sites')->insert([
                'client' => $faker->company,
                'url' => $faker->domainName,
                'server_id' => $faker->randomElement($serverIDs),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
