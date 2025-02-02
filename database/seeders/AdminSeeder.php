<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use File;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get("database/data/admin.json");
        $admin = json_decode($json);
        foreach ($admin as $key => $value) {
            Admin::create([
                "name" => $value->name,
                "username" => $value->username,
                "password" => Hash::make('123456')
            ]);
        }
    }
}
