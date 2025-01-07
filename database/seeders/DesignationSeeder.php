<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->delete();
        $designations = array(
            array('designation_name' => 'Android Developer', 'company_id' => 1, 'department_id' => 1, 'is_active' => true),
        );
        DB::table('designations')->insert($designations);
    }
}
