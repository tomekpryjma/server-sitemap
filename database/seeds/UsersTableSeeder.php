<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Evovle Digital",
            'email' => 'hosting@evolvedigital.co.uk',
            'password' => bcrypt(config('app.devpass'))
        ]);
    }
}
