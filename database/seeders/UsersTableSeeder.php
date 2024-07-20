<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Path ke file JSON
        $json = File::get(database_path('seeders/DataPelanggan.json'));

        // Decode JSON data
        $data = json_decode($json, true);

        // Encrypt password field before inserting
        foreach ($data as &$item) {
            $item['password'] = Hash::make($item['password']);
        }

        // Insert ke database
        DB::table('users')->insert($data);
    }
}
