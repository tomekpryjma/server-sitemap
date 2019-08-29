<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    /**
     * Generates fake client contacts.
     * 
     * @return array
     */
    private function generateContacts()
    {
        $faker = Faker::create();
        $contactsNumber = rand(1, 4);
        $contacts = array();

        for ($iteration = 0; $iteration < $contactsNumber; $iteration++) {
            $contacts[] = array(
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email
            );
        }
        return $contacts;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($iteration = 0; $iteration < 5; $iteration++) {
            \DB::table('clients')->insert([
                'id' => $iteration + 1,
                'name' => $faker->company,
                'contacts' => json_encode($this->generateContacts()),
                'website' => $faker->domainName,
                'notes' => $faker->sentence,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
        }
    }
}
