<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->delete();
        $addresses = array(
            array('id' => 1, 'address' => ' Manzil, First Floor, Liaquat Colony', 'employee_id' => 9,'user_id' => 9,'country' => 1, 'province_id' => 54, 'city_id' => 5963 , 'zip_code' => 2, 'family_code' => 112),
        );
        DB::table('addresses')->insert($addresses);

    }
}
