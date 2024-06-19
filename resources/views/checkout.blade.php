<x-layout>
    <x-slot:tittle>{{ $tittle}}</x-slot:tittle>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="{{ route('paypal')}}" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" name="country" id="country" required>
                                        <option value="">Choose</option>
                                        @foreach ($onkir as $item)
                                            <option value="{{ $item->negara }}">{{ $item->negara }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="street_address" name="street_address" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="state">State <span>*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" min="0" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email_address" value="" required>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">
                        @csrf
                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>$ {{$cart->base_total_price_label}}</span></li>
                            <input type="hidden" value="{{ $sum = 0; }}">
                            @foreach ($cart->items as $item)
                            <input type="hidden" value="{{$sum += $item->qty;}}">
                            <input type="hidden" id="product_name" name="product_name" value="{{ $item->cart_id }}" readonly required> 
                            <input type="hidden" value="{{ $item->qty }}" readonly required> 
                            @endforeach
                            <li><span>Diskon</span> <span id="labeldiskon"></span></li>
                            <input type="hidden" id="diskon" value="{{ $cart->discount_amount_label }}" readonly required>
                            <li><span>Subtotal</span> <span id="label_sub_total_price"></span></li>
                            <input type="hidden" id="sub_total_price" value="{{ $cart->sub_total_price_label }}" readonly required>
                            <li><span>Shipping</span> <span id="labelshipping">$ 0</span></li>
                            <input type="hidden" name="onkir" id="onkir" readonly required>
                            <li><span>Total</span> <span id="labelprice">$ {{ $cart->sub_total_price_label }}</span></li>
                            <input type="text" name="price" id="price" readonly required>
                            <input type="hidden" name="quantity" id="quantity" value="{{ $sum }}">
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="cart-page-heading">
                                <h5>Payment</h5>
                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" border="0" alt="PayPal Logo">
                            </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <h6 class="sideKickHeadline">Send:</h6>
                                        <p class="contentPara">Simply add a card to start shopping, and earn card reward points.  <p>Plus, we protect your eligible purchases with <a href="https://www.paypal.com/id/webapps/mpp/paypal-buyer-protection?locale.x=en_ID" data-pa-click="Send-Buyer Protection">Buyer Protection</a>.</p></p>
                                        <ul class="send-payment-list send" id="send">
                                            <li class="main">
                                                <img src="https://www.paypalobjects.com/en_GB/SG/i/logo/logo_ccMC.gif" alt="payment method" />
                                            </li>
                                            <li class="main">
                                                <img src="https://www.paypalobjects.com/en_GB/SG/i/logo/logo_ccVisa.gif" alt="payment method" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn essence-btn">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ URL::to('js/checkout.js') }}"></script>

</x-layout>