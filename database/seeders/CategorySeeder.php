<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
use File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed All Categories

        $json = File::get("database/data/categories.json");
        $categories = json_decode($json);
        foreach ($categories as $key => $value) {
            sleep(1);
            Category::create([
                "category_uid" => (string)Str::uuid()->getHex(),
                "name" => $value->name,
                "long_desc" => $value->long_desc,
                "short_desc" => $value->short_desc
            ]);
        }
    }
}
