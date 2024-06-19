<?php

if (!function_exists('shop_product_link')) {
    function shop_product_link($catalog) {

        return route('product.show',[$catalog->id]);
    }
}

if (!function_exists('shop_category_link')) {
    function shop_category_link($category) {

        return route('product.category',[$category->slug]);
    }
}