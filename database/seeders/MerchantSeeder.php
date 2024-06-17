<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merchant;

class MerchantSeeder extends Seeder
{
    public function run()
    {
        $merchants = [
            ['name' => 'UMKM Sukses', 'description' => 'Deskripsi UMKM Sukses', 'email' => 'merchant1@email.com', 'wa_number'=>'6289023847', 'city_id' => 1],

            ['name' => 'Usaha Jaya', 'description' => 'Deskripsi Usaha Jaya', 'email' => 'merchant2@email.com', 'wa_number'=>'62856278346', 'city_id' => 2],

            ['name' => 'Maju Terus', 'description' => 'Deskripsi Maju Terus', 'email' => 'merchant3@email.com', 'wa_number'=>'62813263448', 'city_id' => 3],

            ['name' => 'Berkah Abadi', 'description' => 'Deskripsi Berkah Abadi', 'email' => 'merchant4@email.com', 'wa_number'=>'62812873264', 'city_id' => 4],

            ['name' => 'Makmur Sejahtera', 'description' => 'Deskripsi Makmur Sejahtera', 'email' => 'merchant5@email.com', 'wa_number'=>'62821346434', 'city_id' => 5],
        ];

        foreach ($merchants as $merchant) {
            Merchant::create($merchant);
        }
    }
}
