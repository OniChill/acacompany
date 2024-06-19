<?php

namespace App\Repositories\Front;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\CartItem;
use App\Repositories\Front\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface {
    
    public function findByUser(User $user): Cart
    {
        $cart = Cart::with([
                'items',
                'items.product',
        ])->forUser($user)->where('deleted_at', null)->first();

        if (!$cart) {
            return Cart::create([
                'user_id' => $user->id,
                'expired_at' => (new Carbon())->addDay(7),
            ]);
        }

        $this->calculateCart($cart);

        return $cart;
    }

    public function addItem($product, $data = []): CartItem
    {
        $cart = $this->findByUser(auth()->user());
        ($data['isicolor']);
        $qty = $data['isiqty'];
        $color = $data['isicolor'];

        $existItem = CartItem::where([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'color' => $color,
        ])->first();
        
        if (!$existItem) {
            return CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'qty' => $qty,
                'color' => $color,
            ]);
        }

        if (($existItem->qty + $qty) > $product->stock) {
            return new CartItem();
        }

        $existItem->qty = $existItem->qty + $qty;
        $existItem->save();

        return $existItem;
    }

    public function removeItem($id) : bool
    {
        return CartItem::where('id', $id)->delete();
    }

    public function updateQty($items = []): void
    {
        if (!empty($items)) {
            foreach ($items as $itemID => $qty) {
                $item = CartItem::where('id', $itemID)->first();
                if ($item) {
                    $item->qty = $qty;
                    $item->save();
                }
            }
        }
    }

    private function calculateCart(Cart $cart): void
    {
        $baseTotalPrice = 0;
        $discountAmount = 0;
        $grandTotal = 0;

        if (count($cart->items) > 0) {
            foreach ($cart->items as $item) {
                $baseTotalPrice += $item->qty * $item->product->price;

                if ($item->product->has_sale_price) {
                    $discountAmountItem = $item->product->price - $item->product->sale_price;
                    $discountAmount += $item->qty * $discountAmountItem;
                }
            }
        }

        $nettTotal = $baseTotalPrice - $discountAmount;
        $grandTotal = $nettTotal;

        $cart->update([
            'base_total_price' => $baseTotalPrice,
            'discount_amount' => $discountAmount,
            'grand_total' => $grandTotal,
        ]);
    }
}
