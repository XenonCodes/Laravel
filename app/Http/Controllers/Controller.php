<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Метод для получения категорий новостей
    public function getNewsCategories(int $id = null):array
    {
        $categories = [
            ['id' => 1, 'name' => 'Sport'],
            ['id' => 2, 'name' => 'Politics'],
            ['id' => 3, 'name' => 'Technologies'],
            ['id' => 4, 'name' => 'Culture'],
            ['id' => 5, 'name' => 'The science'],
        ];

        if ($id !== null) {
            foreach ($categories as $category) {
                if ($category['id'] === $id) {
                    return $category;
                }
            }
        }

        return $categories;
    }

    public function getNews(int $id = null, int $categories_id = null): array
    {
        if($id !== null){
            return [
                'id' => $id,
                'categories_id' => $categories_id,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'img' => fake()->imageUrl(200,200),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i'),
            ];
        }

        $someAmountNews = 4;
        $news = [];
        for ($i=0; $i <= $someAmountNews; $i++){
            $news[] = [
                'id' => ($i == 0) ? ++$i : $i ,
                'categories_id' => $categories_id,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'img' => fake()->imageUrl(200,200),
                'status' => 'ACTIVE',
                'description' => fake()->text(100),
                'created_at' => now()->format('d-m-Y H:i'),
            ];
        }

        return $news;
    }
}
