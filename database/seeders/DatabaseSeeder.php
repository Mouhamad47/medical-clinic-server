<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Admin User
        DB::table("users")->insert([
            "first_name" => "Mouhamad",
            "last_name" => "Assaad",
            "email" => "mhmd12@gmail.com",
            "password"=> bcrypt("mhmd123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-10",
            "role" => 1,
        ]);

        //Sections
        DB::table("sections")->insert([
            "name" => "Primary Care",
        ]);
        DB::table("sections")->insert([
            "name" => "Lab Test",
        ]);
        DB::table("sections")->insert([
            "name" => "Covid",
        ]);
        DB::table("sections")->insert([
            "name" => "Kids",
        ]);

        //Majors
        DB::table("majors")->insert([
            "name" => "Thoracic",
        ]);
        DB::table("majors")->insert([
            "name" => "Eyes",
        ]);
        DB::table("majors")->insert([
            "name" => "Digestion",
        ]);
        DB::table("majors")->insert([
            "name" => "X-ray",
        ]);
        DB::table("majors")->insert([
            "name" => "Ear/Nose/Throat",
        ]);
        DB::table("majors")->insert([
            "name" => "Orthopedic ",
        ]);
        DB::table("majors")->insert([
            "name" => "Kids",
        ]);
        DB::table("majors")->insert([
            "name" => "Dentist",
        ]);
    }
}
