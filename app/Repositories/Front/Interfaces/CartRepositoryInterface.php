<?php

namespace App\Repositories\Front\Interfaces;

use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

interface CartRepositoryInterface
{
    public function findByUser(User $user): Cart;
    public function addItem(Product $product, $data = []): CartItem;
    public function removeItem($id): bool;
    public function updateQty($items = []): void;
}