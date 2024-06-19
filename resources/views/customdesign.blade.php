<x-layout>
<x-slot:tittle>{{ $tittle}}</x-slot:tittle>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: ('img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
     
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            {{ html()->form('post', route('cart.custom'))->open() }}
            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">
                        <x-flash></x-flash>
                        <div class="cart-page-heading mb-30">
                            <h1>Build your custom bike</h1>
                        </div>

                        <div class="row">
                            <input type="hidden" name="product_id" value="customid"/>
                            <input type="hidden" name="qty" value="1" class="form-control" min="1" />
                            <div class="col-md-6 mb-3">
                                <label for="front">Enter a front view photo of the bike <span>*</span></label>
                                <input class="form-control" id="front" type="file" name="front" accept="image/png, image/jpeg"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rear">Enter a rear view photo of the bike <span>*</span></label>
                                <input type="file" class="form-control" id="rear" name="rear" accept="image/png, image/jpeg"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="right">Enter a right view photo of the bike <span>*</span></label>
                                <input type="file" class="form-control" id="right" name="right" accept="image/png, image/jpeg"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="left">Enter a left view photo of the bike <span>*</span></label>
                                <input type="file" class="form-control" id="left" name="left" accept="image/png, image/jpeg"/>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="color">Color <span>*</span></label>
                                <select class="w-100" id="color" name="color" required>
                                    <option value="default">Default</option>
                                    <option value="white">White</option>
                                    <option value="black">Black</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="red">Red</option>
                                    <option value="purple">Purple</option>
                                    <option value="green">Green</option>
                                    <option value="orange">Orange</option>
                                    <option value="brown">Brown</option>
                                    <option value="grey">Grey</option>
                                    <option value="cream">Cream</option>
                                    <option value="pink">Pink</option>
                                    <option value="gold">Gold</option>
                                    <option value="maroon">Maroon</option>
                                    <option value="silver">Silver</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn essence-btn">Place Order</button>
            {{ html()->form()->close() }}
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Checkout Area End ##### -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ URL::to('js/customdesign.js') }}"></script>

</x-layout>