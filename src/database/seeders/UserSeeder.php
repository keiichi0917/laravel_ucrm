<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'test@test.com'], // ← 重複チェック条件
            [
                'name' => 'test',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
