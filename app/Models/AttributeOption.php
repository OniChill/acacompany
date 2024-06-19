<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\UuidTrait;

class AttributeOption extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_attribute_options';

    protected $fillable = [
        'attribute_id',
        'slug',
        'name',
    ];

}
