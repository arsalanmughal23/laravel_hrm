<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ConstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('constants')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $constants = [
            ['group' => 'general',   'key' => 'status',           'slug' => 'general.status',            'text' => 'Active',                     'value' => Str::slug('Active', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'general',   'key' => 'status',           'slug' => 'general.status',            'text' => 'In-Active',                  'value' => Str::slug('In-Active', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'gender',           'slug' => 'user.gender',               'text' => 'Male',                       'value' => Str::slug('Male', '_'),                      'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'gender',           'slug' => 'user.gender',               'text' => 'Female',                     'value' => Str::slug('Female', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Married',                    'value' => Str::slug('Married', '_'),                   'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Single',                     'value' => Str::slug('Single', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Widow',                      'value' => Str::slug('Widow', '_'),                     'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Divorced',                   'value' => Str::slug('Divorced', '_'),                  'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'In-Office',                  'value' => Str::slug('In-Office', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'Out-Office',                 'value' => Str::slug('Out-Office', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'cost_center',      'slug' => 'employee.cost_center',      'text' => 'Head Office',                'value' => Str::slug('Head Office', '_'),               'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'employee_status',  'slug' => 'employee.employee_status',  'text' => 'Probation',                  'value' => Str::slug('Probation', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'employee_status',  'slug' => 'employee.employee_status',  'text' => 'Full-Time',                  'value' => Str::slug('Full-Time', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'employee_status',  'slug' => 'employee.employee_status',  'text' => 'Part-Time',                  'value' => Str::slug('Part-Time', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'employee_status',  'slug' => 'employee.employee_status',  'text' => 'Internship',                 'value' => Str::slug('Internship', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'employee_status',  'slug' => 'employee.employee_status',  'text' => 'Terminated',                 'value' => Str::slug('Terminated', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Resigned',                   'value' => Str::slug('Resigned', '_'),                  'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Contract Ended',             'value' => Str::slug('Contract Ended', '_'),            'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Terminated',                 'value' => Str::slug('Terminated', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Pursuing Higher Education',  'value' => Str::slug('Pursuing Higher Education', '_'), 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Change',              'value' => Str::slug('Career Change', '_'),             'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Relocation of Company',      'value' => Str::slug('Relocation of Company', '_'),     'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Personal Reasons',           'value' => Str::slug('Personal Reasons', '_'),          'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Advancement',         'value' => Str::slug('Career Advancement', '_'),        'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.account_type',     'text' => 'Current Account. ',          'value' => Str::slug('Current Account. ', '_'),         'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Savings Account. ',          'value' => Str::slug('Savings Account. ', '_'),         'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['group' => 'employee',  'key' => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Fixed Deposit Account',      'value' => Str::slug('Fixed Deposit Account', '_'),     'active' => true, 'created_at' => now(),'updated_at' => now()],
        ];


        DB::table('constants')->insert($constants);
    }
}
