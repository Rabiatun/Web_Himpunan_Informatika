<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hmit.ac.id'],
            [
                'name'     => 'Admin HMIT',
                'email'    => 'admin@hmit.ac.id',
                'password' => Hash::make('admin12345'),
                'role'     => 'admin',
            ]
        );
    }
}
