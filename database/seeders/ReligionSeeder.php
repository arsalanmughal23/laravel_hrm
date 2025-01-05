<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("religions")->delete();
        $religions = array(
            ["name" => "Christianity"],
            ["name" => "Islam"],
            ["name" => "Secular"],
            ["name" => "Hinduism"],
            ["name" => "Buddhism"],
            ["name" => "Chinese traditional religion"],
            ["name" => "Ethnic"],
            ["name" => "African"],
            ["name" => "Sikhism"],
            ["name" => "Spiritism"],
            ["name" => "Judaism"],
            ["name" => "Bahá'í"],
            ["name" => "Jainism"],
            ["name" => "Shinto"],
            ["name" => "Cao Dai"],
            ["name" => "Zoroastrianism"],
            ["name" => "Tenrikyo"],
            ["name" => "Animism"],
            ["name" => "Neo-Paganism"],
            ["name" => "Unitarian Universalism"],
            ["name" => "Rastafari"],
        );
        DB::table("religions")->insert($religions);
    }
    
}
