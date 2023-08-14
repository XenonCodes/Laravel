<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityNews = 10;
        $news = [];
        for ($i=0; $i < $quantityNews; $i++) {
            $news[] = [
                'title' => fake()->jobTitle(),
                'description' => fake()->text(100),
                'image'  => fake()->imageUrl(200, 150),
                'author' => fake()->userName(),
                'status' => Status::ACTIVE->value,
                'category_id' => rand(1,10),
                'source_id' => rand(1,10),
                'created_at' => now(),
            ];
        }

        return $news;
    }
}
