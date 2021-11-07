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
        DB::table("majors")->insert([
            "name" => "Admin",
        ]);





        //Admin User
        DB::table("users")->insert([
            "first_name" => "Mouhamad",
            "last_name" => "Assaad",
            "email" => "mhmd12@gmail.com",
            "password" => bcrypt("mhmd123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-10",
            "role" => 1,
            "major_id" => 11,


        ]);
        // Eyes Doctor
        DB::table("users")->insert([
            "first_name" => "Imad",
            "last_name" => "Hsein",
            "email" => "imad12@gmail.com",
            "password" => bcrypt("imad123321"),
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
            "password" => bcrypt("kenan123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 2,
            "major_id" => 8,
        ]);
        //Kids Doctor
        DB::table("users")->insert([
            "first_name" => "Majed",
            "last_name" => "Haydar",
            "email" => "majed12@gmail.com",
            "password" => bcrypt("majed123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 2,
            "major_id" => 3,
        ]);
        //Nurses
        DB::table("users")->insert([
            "first_name" => "Manal",
            "last_name" => "Saleh",
            "email" => "manal12@gmail.com",
            "password" => bcrypt("manal123321"),
            "address" => "Tripoli",
            "date_of_employment" => "2021-10-15",
            "role" => 3,
            "major_id" => 9,
        ]);



        //Sections
        DB::table("sections")->insert([
            "name" => "Medical Care",
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

        // Consultations
        DB::table("consultations")->insert([
            "first_name" => "Ghada",
            "last_name" => "Abed",
            "phone_number" => "70236555",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-01-10",
            "approved" => 2,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Ahmad",
            "last_name" => "Fahed",
            "phone_number" => "70871231",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-02-10",
            "approved" => 2,
            "major_id" => 3,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Selena",
            "last_name" => "Itawi",
            "phone_number" => "03412777",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-03-10",
            "approved" => 2,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Hasan",
            "last_name" => "Hasan",
            "phone_number" => "76120001",
            "address" => "Tripoli",
            "start_hour" => "10:00:00",
            "end_hour" => "10:30:00",
            "date_of_consultation" => "2021-03-10",
            "approved" => 2,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Omar",
            "last_name" => "Khaled",
            "phone_number" => "81954190",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-04-10",
            "approved" => 1,
            "major_id" => 3,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Georges",
            "last_name" => "Tannous",
            "phone_number" => "70236555",
            "address" => "Mejedlaya",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-05-10",
            "approved" => 1,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Mahmoud",
            "last_name" => "Homsi",
            "phone_number" => "03667890",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-06-10",
            "approved" => 0,
            "major_id" => 2,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Moemen",
            "last_name" => "Hamed",
            "phone_number" => "03512940",
            "address" => "AL Mina",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-06-10",
            "approved" => 1,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Wajih",
            "last_name" => "Slayman",
            "phone_number" => "81347123",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-07-10",
            "approved" => 1,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Yana",
            "last_name" => "Makdessi",
            "phone_number" => "03764110",
            "address" => "Ardeh",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-08-10",
            "approved" => 1,
            "major_id" => 8,

        ]);
        DB::table("consultations")->insert([
            "first_name" => "Khalil",
            "last_name" => "Iskandar",
            "phone_number" => "76774122",
            "address" => "Mejedlaya",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_consultation" => "2021-09-10",
            "approved" => 1,
            "major_id" => 8,

        ]);

        //Appointments
        DB::table("appointments")->insert([
            "first_name" => "Youssef",
            "last_name" => "Bilal",
            "phone_number" => "81744290",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-01-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Aya",
            "last_name" => "Azuur",
            "phone_number" => "76321731",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-02-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Aya",
            "last_name" => "Azuur",
            "phone_number" => "76321731",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-03-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Moussa",
            "last_name" => "Saleh",
            "phone_number" => "03656812",
            "address" => "Abou Samra",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-05-10",
            "approved" => 1,
            "section_id" => 2,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Youssef",
            "last_name" => "Ahmad",
            "phone_number" => "03124568",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-05-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Nabih",
            "last_name" => "Hssein",
            "phone_number" => "03451268",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-05-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Tala",
            "last_name" => "Salim",
            "phone_number" => "81641990",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-06-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Judy",
            "last_name" => "Salim",
            "phone_number" => "81649910",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-06-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Luna",
            "last_name" => "Shehade",
            "phone_number" => "71349210",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-07-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Zaynab",
            "last_name" => "Ahmad",
            "phone_number" => "03542111",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-08-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Suzane",
            "last_name" => "Ali",
            "phone_number" => "81761980",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-09-10",
            "approved" => 1,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Reem",
            "last_name" => "Shebani",
            "phone_number" => "70410222",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-10-10",
            "approved" => 0,
            "section_id" => 3,

        ]);
        DB::table("appointments")->insert([
            "first_name" => "Aya",
            "last_name" => "Azuur",
            "phone_number" => "76321731",
            "address" => "Tripoli",
            "start_hour" => "9:00:00",
            "end_hour" => "9:30:00",
            "date_of_appointment" => "2021-11-10",
            "approved" => 1,
            "section_id" => 3,

        ]);

    }
}
