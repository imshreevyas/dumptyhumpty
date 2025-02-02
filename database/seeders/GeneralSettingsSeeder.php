<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GeneralSetting;
use File;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed All Categories

        $json = File::get("database/data/generalSettings.json");
        $generalSettings = json_decode($json);
        foreach ($generalSettings as $key => $value) {
            GeneralSetting::create([
                "name" => $value->name,
                "value" => $value->value,
                "short_desc" => $value->short_desc
            ]);
        }
    }
}
