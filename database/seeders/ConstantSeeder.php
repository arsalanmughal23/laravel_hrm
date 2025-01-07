<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('constants')->delete();
        $constants = array(
            array('id' => 1,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'Active',                     'value' => 'active',                    'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 2,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'In-Active',                  'value' => 'in-active',                 'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 3,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Male',                       'value' => 'male',                      'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 4,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Female',                     'value' => 'female',                    'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 5,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Married',                    'value' => 'married',                   'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 6,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Single',                     'value' => 'single',                    'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 7,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Widow',                      'value' => 'widow',                     'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 8,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Divorced/Separated',         'value' => 'divorced/separated',        'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 9,  'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'In-Office',                  'value' => 'in-ffice',                  'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 10, 'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'Out-Office',                 'value' => 'out-office',                'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 11, 'group' => 'employee',  'key'    => 'cost_center',      'slug' => 'employee.cost_center',      'text' => 'Head Office',                'value' => 'head-office',               'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 12, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'Active',                     'value' => 'active',                    'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 13, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'In Active',                  'value' => 'in-active',                 'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 14, 'group' => 'employee',  'key'    => 'status',            'slug' => 'employee.status',           'text' => 'Probation',                 'value' => 'probation',                 'active' => true, 'created_at' => now(),'updated_at' => now()),

            array('id' => 15, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Resigned',                   'value' => 'resigned',                  'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 16, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Contract Ended',             'value' => 'contract ended',            'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 17, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Terminated',                 'value' => 'terminated',                'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 18, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Pursuing Higher Education',  'value' => 'pursuing higher education', 'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 19, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Change',              'value' => 'career change',             'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 20, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Relocation of Company',      'value' => 'relocation of company',     'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 21, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Personal Reasons',           'value' => 'personal reasons',          'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 22, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Advancement',         'value' => 'career advancement',        'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 23, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Current Account. ',          'value' => 'current account',           'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 24, 'group' => 'employee',  'key'    => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Savings Account. ',          'value' => 'savings account',           'active' => true, 'created_at' => now(),'updated_at' => now()),
            array('id' => 25, 'group' => 'employee',  'key'    => 'account_type',     'slug' => 'employee.account_type',     'text' => 'Term/Fixed Deposit Account', 'value' => 'term/fixed deposit account','active' => true, 'created_at' => now(),'updated_at' => now()),
        );
        DB::table('constants')->insert($constants);
    }
}
