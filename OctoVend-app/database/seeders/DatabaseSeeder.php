<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(WorldTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'octoadmin',
            'email' => 'admin@octovend.com',
            'password' => Hash::make('qwerty-2026'),
            'role' => 'admin',
        ]);
    }
}
