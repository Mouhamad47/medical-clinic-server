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
        DB::table("majors")->insert([
            "name" => "Registered Nurse",
        ]);
        DB::table("majors")->insert([
            "name" => "Caregiver",
        ]);





        //Admin User
        DB::table("users")->insert([
            "first_name" => "Mouhamad",
            "last_name" => "Assaad",
            "email" => "mhmd12@gmail.com",
            "password"=> bcrypt("mhmd123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-10",
            "role" => 1,
            "major_id" => 9,
            
            
        ]);
        // Eyes Doctor
        DB::table("users")->insert([
            "first_name" => "Imad",
            "last_name" => "Hsein",
            "email" => "imad12@gmail.com",
            "password"=> bcrypt("imad123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 2,
            "major_id" => 2,

        ]);
        //Dentist
        DB::table("users")->insert([
            "first_name" => "Kenan",
            "last_name" => "Ahmad",
            "email" => "kenan12@gmail.com",
            "password"=> bcrypt("kenan123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 2,
            "major_id" => 8,
        ]);
        //Nurses
        DB::table("users")->insert([
            "first_name" => "Manal",
            "last_name" => "Saleh",
            "email" => "manal12@gmail.com",
            "password"=> bcrypt("manal123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 3,
            "major_id" => 9,
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
       

        
        // DB::table("major_user")->insert([
        //     "major_id" => 2,
        //     "user_id" => 2, 
        // ]);
       
        // DB::table("major_user")->insert([
        //     "major_id" => 8,
        //     "user_id" => 3, 
        // ]);
    }
}
