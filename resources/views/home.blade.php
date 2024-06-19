<x-layout>
    <x-slot:tittle>{{ $tittle}}</x-slot:tittle>
    <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            @foreach ($sliders as $slider)
            <div class="item">
                <img src="slider/{{$slider['img']}}">
                <div class="content">
                    <div class="author">{{$slider['author']}}</div>
                    <div class="title">{{$slider['tittle']}}</div>
                    <div class="des">
                    {{Str::limit($slider['des'],200)}}
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
        @foreach ($sliders as $slider)
            <div class="item">
                <img src="slider/{{$slider['imgtmb']}}">
                <div class="content">
                    <div class="title">
                    {{$slider['tittle']}}
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>


    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                @foreach ($diskons as $dsk)
                    <div class="cta-content bg-img background-overlay" style="background-image: url(img/bg-img/{{$dsk['img']}});">
                        <div class="h-100 d-flex align-items-center justify-content-center">
                            <div class="cta--text">
                                <strong>{{$dsk['diskon']}}</strong>
                                <h2>{{$dsk['judul']}}</h2>
                                <a href="\customdesign" target="_blank"class="btn essence-btn">Create Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @foreach ($catalogs as $ctg)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/{{$ctg['featured_image']}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="img/product-img/{{$ctg['featured_image']}}" alt="">

                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>

                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{Str::limit($ctg->excerpt,50)}}</span>
                                <a href="\product\show\{{$ctg->id}}">
                                    <h6>{{$ctg->name}}</h6>
                                </a>
                                @if ($ctg->sale_price != null)
                                <p class="product-price"><span class="old-price">${{ $ctg->price }}</span> ${{ $ctg->sale_price }}</p>
                                @else
                                <p class="product-price">${{ $ctg->price }}</p>
                                @endif

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="\product\show\{{$ctg->id}}" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand1.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand2.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand3.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand4.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand5.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="img/core-img/brand6.png" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->
     <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ URL::to('js/jquery/jquery-migrate-3.4.0.min.js') }}"></script>
     <!-- Mengaktifkan Slider -->
    <script src="{{ URL::to('app.js') }}"></script>

</x-layout>