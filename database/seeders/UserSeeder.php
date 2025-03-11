<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // حتى لا يتم تكرار الإدخال
            [
                'name' => 'Admin',
                'password' => Hash::make('123456789'), // استبدليها بكلمة سر قوية
                'role' => 'admin',
            ]
        );
    }
}
