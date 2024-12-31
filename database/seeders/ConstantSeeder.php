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
            array('id' => 1,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'active',                     'value' => 'Active',                    'active' => true),
            array('id' => 2,  'group' => 'general',   'key'    => 'status',           'slug' => 'general.status',            'text' => 'in-active',                  'value' => 'In Active',                 'active' => true),
            array('id' => 3,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Male',                       'value' => 'male',                      'active' => true),
            array('id' => 4,  'group' => 'user',      'key'    => 'gender',           'slug' => 'user.gender',               'text' => 'Female',                     'value' => 'female',                    'active' => true),
            array('id' => 5,  'group' => 'user',      'key'    => 'martial_status',   'slug' => 'user.martial_status',       'text' => 'Married',                    'value' => 'married',                   'active' => true),
            array('id' => 6,  'group' => 'user',      'key'    => 'martial_status',   'slug' => 'user.martial_status',       'text' => 'Single',                     'value' => 'single',                    'active' => true),
            array('id' => 7,  'group' => 'user',      'key'    => 'martial_status',   'slug' => 'user.martial_status',       'text' => 'Widow',                      'value' => 'Widow',                     'active' => true),
            array('id' => 8,  'group' => 'user',      'key'    => 'martial_status',   'slug' => 'user.martial_status',       'text' => 'Divorced/Separated',         'value' => 'Divorced/Separated',        'active' => true),
            array('id' => 9,  'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'in-office',                  'value' => 'In-Office',                 'active' => true),
            array('id' => 10, 'group' => 'employee',  'key'    => 'gl_class',         'slug' => 'employee.gl_class',         'text' => 'out-office',                 'value' => 'Out-Office',                'active' => true),
            array('id' => 11, 'group' => 'employee',  'key'    => 'cost_center',      'slug' => 'employee.cost_center',      'text' => 'head-office',                'value' => 'Head-Office',               'active' => true),
            array('id' => 12, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'active',                     'value' => 'Active',                    'active' => true),
            array('id' => 13, 'group' => 'employee',  'key'    => 'emp_status',       'slug' => 'employee.emp_status',       'text' => 'in-active',                  'value' => 'In-Active',                 'active' => true),

            array('id' => 14, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'resigned',                   'value' => 'Resigned',                  'active' => true),
            array('id' => 15, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'contract Ended',             'value' => 'Contract Ended',            'active' => true),
            array('id' => 16, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'terminated',                 'value' => 'Terminated',                'active' => true),
            array('id' => 17, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'pursuing Higher Education',  'value' => 'Pursuing Higher Education', 'active' => true),
            array('id' => 18, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'career Change',              'value' => 'Career Change',             'active' => true),
            array('id' => 19, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'relocation of Company',      'value' => 'Relocation of Company',     'active' => true),
            array('id' => 20, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'personal Reasons',           'value' => 'Personal Reasons',          'active' => true),
            array('id' => 21, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'career advancement',         'value' => 'Career Advancement',        'active' => true),
            array('id' => 22, 'group' => 'employee',  'key'    => 'leaving_reason',   'slug' => 'employee.leaving_reason',   'text' => 'lack of flexibility. ',      'value' => 'Lack of flexibility. ',     'active' => true),
        );
        DB::table('constants')->insert($constants);
    }
}
