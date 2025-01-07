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
        DB::table('constants')->delete();
        $constants = [
            ['id' => 1,  'group' => 'general',   'key' => 'status',           'slug' => 'general.status',            'text' => 'Active',                     'value' => Str::slug('Active', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 2,  'group' => 'general',   'key' => 'status',           'slug' => 'general.status',            'text' => 'In-Active',                  'value' => Str::slug('In-Active', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 3,  'group' => 'user',      'key' => 'gender',           'slug' => 'user.gender',               'text' => 'Male',                       'value' => Str::slug('Male', '_'),                      'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 4,  'group' => 'user',      'key' => 'gender',           'slug' => 'user.gender',               'text' => 'Female',                     'value' => Str::slug('Female', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 5,  'group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Married',                    'value' => Str::slug('Married', '_'),                   'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 6,  'group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Single',                     'value' => Str::slug('Single', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 7,  'group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Widow',                      'value' => Str::slug('Widow', '_'),                     'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 8,  'group' => 'user',      'key' => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Divorced/Separated',         'value' => Str::slug('Divorced/Separated', '_'),        'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 9,  'group' => 'employee',  'key' => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'In-Office',                  'value' => Str::slug('In-Office', '_'),                  'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 10, 'group' => 'employee',  'key' => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'Out-Office',                 'value' => Str::slug('Out-Office', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 11, 'group' => 'employee',  'key' => 'cost_center',      'slug' => 'employee.cost_center',      'text' => 'Head Office',                'value' => Str::slug('Head Office', '_'),               'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 12, 'group' => 'employee',  'key' => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'Active',                     'value' => Str::slug('Active', '_'),                    'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 13, 'group' => 'employee',  'key' => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'In Active',                  'value' => Str::slug('In Active', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 14, 'group' => 'employee',  'key' => 'status',            'slug' => 'employee.status',           'text' => 'Probation',                 'value' => Str::slug('Probation', '_'),                 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 15, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Resigned',                   'value' => Str::slug('Resigned', '_'),                  'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 16, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Contract Ended',             'value' => Str::slug('Contract Ended', '_'),            'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 17, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Terminated',                 'value' => Str::slug('Terminated', '_'),                'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 18, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Pursuing Higher Education',  'value' => Str::slug('Pursuing Higher Education', '_'), 'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 19, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Change',              'value' => Str::slug('Career Change', '_'),             'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 20, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Relocation of Company',      'value' => Str::slug('Relocation of Company', '_'),     'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 21, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Personal Reasons',           'value' => Str::slug('Personal Reasons', '_'),          'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 22, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Advancement',         'value' => Str::slug('Career Advancement', '_'),        'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 23, 'group' => 'employee',  'key' => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Current Account. ',          'value' => Str::slug('Current Account. ', '_'),           'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 24, 'group' => 'employee',  'key' => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Savings Account. ',          'value' => Str::slug('Savings Account. ', '_'),           'active' => true, 'created_at' => now(),'updated_at' => now()],
            ['id' => 25, 'group' => 'employee',  'key' => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Fixed Deposit Account',      'value' => Str::slug('Fixed Deposit Account', '_'),       'active' => true, 'created_at' => now(),'updated_at' => now()],
        ];


        DB::table('constants')->insert($constants);
    }
}
