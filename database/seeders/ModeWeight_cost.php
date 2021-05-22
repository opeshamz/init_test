<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeWeight_cost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modeweight_cost')->insert([
            'aircost' => 50000,
            'watercost' => 15000,
            'airweightcost' => 10000,
            'waterweightcost' => 2000,
            'uk' => 800,
            'us' => 1500,
        ]);
    }
}
