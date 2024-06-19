<?php

namespace App\Repositories\Front;

use App\Models\Category;
use App\Repositories\Front\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    
    public function findAll($options = [])
    {
        return Category::orderBy('name', 'asc')->get();
    }

    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }
}