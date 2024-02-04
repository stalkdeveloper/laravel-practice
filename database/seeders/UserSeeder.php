<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $dob = Carbon::now()->subYears(random_int(16, 60))->subDays(random_int(0, 365));

        $usersData = [
            [
                'name' => 'User1',
                'email' => 'user1@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'sunny',
                'email' => 'user2@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'John',
                'email' => 'johnuser@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'John',
                'email' => 'johnuser2@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Doe',
                'email' => 'doeuser@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Doe',
                'email' => 'doeuser2@email.com',
                'dob' => date('Y-m-d', strtotime($dob)),
                'password' => bcrypt('12345678'),
            ],
        ];
        
        DB::table('users')->insert($usersData);
        
    }
}
