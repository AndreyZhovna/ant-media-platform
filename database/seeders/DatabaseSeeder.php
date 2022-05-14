<?php

namespace Database\Seeders;

use App\Models\Stream;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('123456')
        ])->create();

        $this->call(StreamSeeder::class);
    }
}
