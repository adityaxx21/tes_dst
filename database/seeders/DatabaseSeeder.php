<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\products;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            products::create([
                'id' => 10001,
                'uuid' => "1000001",
                'name' => "Buku Gambar",
                'type' => "Buku",
                'price' => 10000,
                'quantity' =>20,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            transaction::create([
                'id' => 10001,
                'uuid' => "1000001",
                'name' => "Buku Gambar",
                'user_id' => 10001,
                'product_id' => 10001,
                'amount' => 2,
                'tax' => 1000,
                'admin_fee' => 2200,
                'total' => 23200,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            User::create([
                'id' => 10001,
                'name' => 'aditya',
                'role' => 'cutomer',
                'email' => 'adityayatma@gmail.com',
                'password' => md5('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'api_token' => Str::random(80),
            ]);
            User::create([
                'id' => 10002,
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => md5('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'api_token' => Str::random(80),
            ]);
    }
}
