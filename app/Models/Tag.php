<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\UuidTrait;

class Tag extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_tags';

    protected $fillable = [
        'slug',
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'shop_products_tags', 'tag_id', 'product_id');
    }
}
