<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                "name" => "Tuan Kiet",
                "plan_id" => 1,
                "email" => "tuankiet.116@gmail.com",
                "password" => bcrypt("password")
            ]
        ]);
    }
}
