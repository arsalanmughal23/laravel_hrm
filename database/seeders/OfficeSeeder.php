<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offices')->delete();
            $offices = array(
                array('employee_id' => 9, 'station_id' => 1, 'department_id' => 8, 'designation_id' => 1, 'status_id' => 12, 'password' => '123456789', 'cost_center_id' => 11, 'employee_status_id' => 1, 'region_id' => 11, 'gl_class_id' => 9, 'joining_date' => '2024-12-29', 'confirmation_date' => '2024-12-29', 'expected_confirmation_days' => 1, 'contract_start_date' => '2024-12-29', 'contract_end_date' => '2024-12-29', 'resign_date' => '2024-12-29', 'leaving_date' => '2024-12-29', 'leaving_reason_id' => 1, 'created_at' => now(), 'updated_at' => now()),
                array('employee_id' => 11, 'station_id' => 1, 'department_id' => 1, 'designation_id' => 1, 'status_id' => 1,  'password' => '123456789', 'cost_center_id' => 1, 'employee_status_id' => 1, 'region_id' => 13, 'gl_class_id' => 9, 'joining_date' => '2024-12-29', 'confirmation_date' => '2024-12-29', 'expected_confirmation_days' => 1, 'contract_start_date' => '2024-12-29', 'contract_end_date' => '2024-12-29', 'resign_date' => '2024-12-29', 'leaving_date' => '2024-12-29', 'leaving_reason_id' => 1, 'created_at' => now(), 'updated_at' => now()),
            );
        DB::table('offices')->insert($offices);
    }
}
