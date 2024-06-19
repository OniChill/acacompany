<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\UuidTrait;

class ProductInventory extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_product_inventories';
    
    protected $fillable = [
        'product_id',
        'qty',
        'low_stock_threshold',
    ];

    protected static function newFactory()
    {
        return \Database\factories\ProductInventoryFactory::new();
    }
}