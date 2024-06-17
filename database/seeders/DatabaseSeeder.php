<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret')
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'user@email.com',
            'password' => ('iqbal')
        ]);

        $this->call([
            CitySeeder::class,
            CategorySeeder::class,
            MerchantSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
