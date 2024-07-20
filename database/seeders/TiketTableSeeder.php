<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TiketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path ke file JSON
        $json = File::get(database_path('seeders/DataTiket.json'));

        // Decode JSON data
        $data = json_decode($json, true);

        // Insert ke database
        DB::table('tickets')->insert($data);
    }
}
