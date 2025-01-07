<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stations')->delete();

        $stations = array(
            array('id' => 1, 'name' => 'Head Office'),
            array('id' => 2, 'name' => 'Factory'),
            array('id' => 3, 'name' => 'Warehouse'),
            array('id' => 4, 'name' => 'Branch'),
        );
        DB::table('stations')->insert($stations);
    }
}
