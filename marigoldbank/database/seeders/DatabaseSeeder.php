<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $iban = 'LT' . '10100' . rand(12345678901, 92345678901);
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('accounts')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->freeEmail,
                'accountNumber' => $iban,
                'password' => $faker->password,
                'address' => $faker->address,
                'phone' => '+370' . $faker->numberBetween($min = 60000000, $max = 69999999),
                'cash' => $faker->numberBetween($min = 0, $max = 10000),
            ]);
        }
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 5,
        ]);
        
    }
}
