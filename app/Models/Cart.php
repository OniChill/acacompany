<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Builder;

class Cart extends Model
{
    use UuidTrait;


    protected $table = 'shop_carts';

    protected $fillable = [
        'user_id',
        'expired_at',
        'base_total_price',
        'discount_amount',
        'tax_amount',
        'grand_total',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function scopeForUser(Builder $query, User $user): void
    {
        $query->where('user_id', $user->id);
    }

    public function getGrandTotalLabelAttribute()
    {
        return $this->grand_total;
    }

    public function getDiscountAmountLabelAttribute()
    {
        return $this->discount_amount;
    }

    public function getTaxAmountLabelAttribute()
    {
        return $this->tax_amount;
    }

    public function getBaseTotalPriceLabelAttribute()
    {
        return $this->base_total_price;
    }

    public function getSubTotalPriceLabelAttribute()
    {
        return $this->base_total_price - $this->discount_amount;
    }
}