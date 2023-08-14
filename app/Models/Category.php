<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getAll(): Collection
    {
        return \DB::table($this->table)->get();
    }

    public function getItemById(int $id): mixed
    {
        return \DB::table($this->table)->find($id);
    }
}
