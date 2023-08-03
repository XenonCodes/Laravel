<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantitySources = 10;
        $sources = [];
        for ($i=0; $i < $quantitySources; $i++) {
            $sources[] = [
                'name' => fake()->jobTitle(),
                'URL' => fake()->url(),
                'created_at' => now(),
            ];
        }

        return $sources;
    }
}
