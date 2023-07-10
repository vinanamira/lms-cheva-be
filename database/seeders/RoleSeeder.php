<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            [
                'nama_role' => Role::MENTOR,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_role' => Role::MURID,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
