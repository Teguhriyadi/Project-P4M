<?php

namespace Database\Seeders;

use App\Models\Model\HakAkses;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "username" => "administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "hak_akses_id" => 1
        ]);

        User::create([
           "name" => "user",
           "username" => "user",
           "email" => "user@gmail.com",
           "password" => bcrypt("password"),
           "hak_akses_id" => 2
        ]);
    }
}
