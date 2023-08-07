<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('orders')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityNews = 10;
        $orders = [];
        for ($i=0; $i < $quantityNews; $i++) {
            $orders[] = [
                'name' => fake()->userName(),
                'phone' => fake()->phoneNumber(),
                'email'  => fake()->email(),
                'information' => fake()->text(100),
                'created_at' => now(),
            ];
        }

        return $orders;
    }
}
