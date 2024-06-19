<?php

namespace App\Repositories\Front;

use App\Models\Product;
use App\Models\Category;
use App\Repositories\Front\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function findAll($options = [])
    {
        $perPage = $options['per_page'] ?? null;
        $categorySlug = $options['filter']['category'] ?? null;

        $products = Product::with(['categories', 'tags']);

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $childCategoryIDs = Category::childIDs($category->id);

            $categoryIDs = array_merge([$category->id], $childCategoryIDs);

            $products = $products->whereHas('categories', function ($query) use ($categoryIDs) {
                $query->whereIn('shop_categories.id', $categoryIDs);
            });
        }

        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }

    public function findByID($id)
    {
        return Product::where('id', $id)->firstOrFail();
    }
}