<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\borrowerinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'is_admin' => 1, // Assuming 1 means admin, modify as needed
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'First Officer',
            'email' => 'officer1@gmail.com',
            'password' => Hash::make('qwerqwer'),
            'is_admin' => 0, // Assuming 1 means admin, modify as needed
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('officerinfo')->insert([
            'offId' => 'OFL-00000',
            'offFname' => 'Officer1',
            'offMname' => 'O',
            'offLname' => 'Officer1',
            'offSuffix' => 'Jr',
            'offContact' => '09851232131',
            'offAddress' => 'Lourdes College',
            'offDob' => '1990-01-01', // Assuming a date format, modify as needed
            'offGender' => 'Male',
            'offEmail' => 'officer1@gmail.com',
            'offpassword' => Hash::make('qwerqwer'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
