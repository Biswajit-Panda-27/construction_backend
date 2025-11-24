<?php

namespace Database\Seeders;

use App\Models\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
                'email' => 'biswajitpanda94389@gmail.com',
                'password' => 'biswajit12345'
            ]
        ]);

        $users->each(function ($user) {
            Auth::create($user);
        });
    }
}
