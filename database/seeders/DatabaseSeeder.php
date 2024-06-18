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
            'email' => 'admin@email.com',
            'password' => ('iqbal')
        ]);

        User::factory()->create([
            'name' => 'User',
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
