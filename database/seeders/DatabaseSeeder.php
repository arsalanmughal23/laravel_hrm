<?php

namespace Database\Seeders;

// use Database\Seeders\CountriesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            ConstantSeeder::class,
            CountriesTableSeeder::class,
            GeneralSettingSeeder::class,
            // PermissionsSeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            ReligionSeeder::class,
            StationSeeder::class,
            RegionSeeder::class
            // DesignationSeeder::class,
        ]);

    }
}
