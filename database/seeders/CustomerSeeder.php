<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 10; $i++) { 
            $customers = new Customers;
            $customers -> first_name = $faker-> firstName;
            $customers -> last_name = $faker-> lastName;
            $customers -> email = $faker-> email;
            $customers -> password = $faker-> password;
            $customers -> save();
        }
    }
}
