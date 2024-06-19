<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\UuidTrait;

class Category extends Model
{
    use HasFactory, UuidTrait;


    protected $table = 'shop_categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
    ];

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'shop_categories_products', 'product_id', 'category_id');
    }

    public static function childIDs($parentID = null)
    {
        $categories = Category::select('id', 'name', 'parent_id')
            ->where('parent_id', $parentID)
            ->get();
        
        $childIDs = [];
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $childIDs[] = $category->id;
                $childIDs = array_merge($childIDs, Category::childIDs($category->id));
            }
        }

        return $childIDs;
    }
}
