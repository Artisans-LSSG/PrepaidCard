<?php

namespace Database\Seeders;

use App\Models\ParentUser;
use Faker\Factory;

use Illuminate\Database\Seeder;

class ParentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $parent = new ParentUser();
        $parent->name = $faker->firstName;
        $parent->email = $faker->email;
        $parent->phone_number = $faker->phoneNumber;
        $parent->password = $faker->password;
        $parent->address = $faker-> address;
        $parent->gender = ['Male', 'Female'][rand(0,1)];
        $parent->save();
    }
}
