<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("user_plans")->insert([
            [
                "id" => 1,
                "name" => "Free",
                "price_per_month" => 0,
                "limit_google_drive_request" => 100
            ]
        ]);
    }
}
