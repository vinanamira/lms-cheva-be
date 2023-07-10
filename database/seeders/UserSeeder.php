<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $mentorRole = Role::where('nama_role', Role::MENTOR)->first();
        $muridRole = Role::where('nama_role', Role::MURID)->first();
        $adminRole = Role::where('nama_role', Role::ADMIN)->first();

        $divisi = Divisi::create([
            'nama_divisi' => 'coba divisi',
        ]);

        $userAdmin = User::create([
            'role_id' => $adminRole->id,
            'divisi_id' => $divisi->id,
            'user_mentor_id' => null,
            'photo_profile' => null,
            'fullname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);

        $userMentor = User::create([
            'role_id' => $mentorRole->id,
            'divisi_id' => $divisi->id,
            'user_mentor_id' => null,
            'photo_profile' => null,
            'fullname' => 'mentor',
            'username' => 'mentor',
            'email' => 'mentor@app.com',
            'password' => bcrypt('password'),
        ]);

        $userMudri = User::create([
            'role_id' => $muridRole->id,
            'divisi_id' => $divisi->id,
            'user_mentor_id' => $userMentor->id,
            'photo_profile' => null,
            'fullname' => 'murid',
            'username' => 'murid',
            'email' => 'murid@app.com',
            'password' => bcrypt('password'),
        ]);
    }
}
