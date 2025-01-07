<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->delete();
        $regions = array(
            array('name' => 'North Karachi', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Gulshan-e-Iqbal', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Clifton', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Defence (DHA)', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Malir', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Korangi', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Saddar', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Orangi Town', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Lyari', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
            array('name' => 'Nazimabad', 'city_id' => 2729, 'created_at' => now(), 'updated_at' => now()),
        );
        DB::table('regions')->insert($regions);
    }
}
