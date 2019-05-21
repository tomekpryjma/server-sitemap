<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 4; $i++) {
            \DB::table('servers')->insert([
                'id' => $i + 1,
                'name' => $faker->lastName,
                'ip_address' => $faker->ipv4,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
