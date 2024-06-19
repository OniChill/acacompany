<x-layout>
<x-slot:tittle>{{ $tittle}}</x-slot:tittle>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">
                        @if ($categories->count()>0)
                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagory: {{$category->name}}</h6>
                            @foreach($categories as $category)
                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li><a href="{{shop_category_link($category)}}">{{$category->name}}</a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">

                        <div class="row">
                         @forelse ($catalogs as $catalog)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="img/product-img/{{ $catalog->featured_image }}" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="img/product-img/{{ $catalog->featured_image }}" alt="">

                                        <!-- Product Badge -->
                                        @if ($catalog->diskon != null)
                                        <div class="product-badge offer-badge">
                                            <span>-${{ $catalog->diskon }}%</span>
                                        </div> 
                                        @endif
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{Str::limit($catalog->excerpt,50)}}</span>
                                        <a href="\product\show\{{$catalog->id}}">
                                            <h6>{{$catalog->name}}</h6>
                                        </a>
                                        @if ($catalog->sale_price != null)
                                        <p class="product-price"><span class="old-price">${{ $catalog->price }}</span> ${{ $catalog->sale_price }}</p>
                                        @else
                                        <p class="product-price">${{ $catalog->price }}</p>
                                        @endif

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="\product\show\{{$catalog->id}}" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Product empty</p>
                        @endforelse
                        </div>
                    </div>
                    <!-- Pagination -->
                    {!! $catalogs->links() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

</x-layout>