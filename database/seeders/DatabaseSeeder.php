<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $data_role = [
            [
                'name' => "admin",
            ],
            [
                'name' => "client",
            ]
        ];

        Role::insert($data_role);
        User::create([
            'username' => "admin",
            'slug' => null,
            'password' => Hash::make("12345678"),
            'phone' => null,
            'address' => "rumah",
            'status' => "active",
            'role_id' => 1,
        ]);
    }
}
