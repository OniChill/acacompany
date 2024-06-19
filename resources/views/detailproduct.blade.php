<x-layout>
    <x-slot:tittle>{{ $tittle}}</x-slot:tittle>

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="cta-content background-overlay">
            <img src="{{ URL::to('img/product-img') }}/{{$product->featured_image}}" alt="">
        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <a href="#">
            <h2>{{ $product->name }}</h2>
        </a>
        @if ($product->sale_price != null)
        <p class="product-price"><span class="old-price">${{ $product->price }}</span> ${{ $product->sale_price }}</p>
        @else
        <p class="product-price">${{ $product->price }}</p>
        @endif
        <p class="product-desc">{{ $product->body }}</p>
        <hr class="my-6">
        <div class="cart-form clearfix">
            <x-flash></x-flash>
            {{ html()->form('post', route('cart.store'))->open() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}"/>
            <div class="row">
                <!-- Select Box -->
                <div class="select-box">
                    <select name="productColor" id="productColor">
                        <option value="default">Color: Default</option>
                        <option value="black">Color: Black</option>
                        <option value="white">Color: White</option>
                        <option value="red">Color: Red</option>
                        <option value="purple">Color: Purple</option>
                    </select>
                </div>
                <div class="col-md-2 col-2">
                    <input type="number" name="qty" value="1" class="form-control" min="1" />
                </div>
                <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                    <button type="submit"  class="btn essence-btn"><i class="bx bx-cart-alt"></i> Add to cart</button>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->
</x-layout>