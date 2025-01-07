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
            array('id' => 1,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'Active',                     'value' => 'active',                    'active' => true),
            array('id' => 2,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'In-Active',                  'value' => 'in-active',                 'active' => true),
            array('id' => 3,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Male',                       'value' => 'male',                      'active' => true),
            array('id' => 4,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Female',                     'value' => 'female',                    'active' => true),
            array('id' => 5,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Married',                    'value' => 'married',                   'active' => true),
            array('id' => 6,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Single',                     'value' => 'single',                    'active' => true),
            array('id' => 7,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Widow',                      'value' => 'widow',                     'active' => true),
            array('id' => 8,  'group' => 'user',      'key'    => 'marital_status',   'slug' => 'user.marital_status',       'text' => 'Divorced/Separated',         'value' => 'divorced/separated',        'active' => true),
            array('id' => 9,  'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'In-Office',                  'value' => 'in-ffice',                  'active' => true),
            array('id' => 10, 'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'Out-Office',                 'value' => 'out-office',                'active' => true),
            array('id' => 11, 'group' => 'employee',  'key'    => 'cost_center',      'slug' => 'employee.cost_center',      'text' => 'Head Office',                'value' => 'head-office',               'active' => true),
            array('id' => 12, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'Active',                     'value' => 'active',                    'active' => true),
            array('id' => 13, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'In Active',                  'value' => 'in-active',                 'active' => true),
            array('id' => 14, 'group' => 'employee',  'key'    => 'status',            'slug' => 'employee.status',           'text' => 'Probation',                 'value' => 'probation',                 'active' => true),

            array('id' => 15, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Resigned',                   'value' => 'resigned',                  'active' => true),
            array('id' => 16, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Contract Ended',             'value' => 'contract ended',            'active' => true),
            array('id' => 17, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Terminated',                 'value' => 'terminated',                'active' => true),
            array('id' => 18, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Pursuing Higher Education',  'value' => 'pursuing higher education', 'active' => true),
            array('id' => 19, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Change',              'value' => 'career change',             'active' => true),
            array('id' => 20, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Relocation of Company',      'value' => 'relocation of company',     'active' => true),
            array('id' => 21, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Personal Reasons',           'value' => 'personal reasons',          'active' => true),
            array('id' => 22, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Career Advancement',         'value' => 'career advancement',        'active' => true),
            array('id' => 23, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'Lack Of Flexibility. ',      'value' => 'lack of flexibility. ',     'active' => true),
        );
        DB::table('constants')->insert($constants);
    }
}
