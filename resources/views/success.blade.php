<x-layout>
    <x-slot:tittle>{{ $tittle}}</x-slot:tittle>
    <style>
        .success-animation { margin:50px auto;}

        .checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #4bb71b;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #4bb71b;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            position:relative;
            top: 5px;
            right: 5px;
        margin: 0 auto;
        }
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4bb71b;
            fill: #fff;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {
            0%, 100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4bb71b;
            }
        }
    </style>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="regular-page-content-wrapper section-padding-80">
                    <div class="success-animation">
                    <svg   svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
                    </div>
                    <div class="row justify-content-center">
                        <h2>YOUR ORDER HAS BEEN RECEIVED</h2>
                        <p>Thanks you for your payment, it's processing.</p>
                        <p>You will receive an order confirmation email with details of your order and a link to track you process.</p>
                        <h6>Order # is: {{$invoice}}</h6>
                    </div>
                    <div class="row justify-content-center">
                        <h6>Email : {{$email}}</h6>
                    </div>
                    <div class="row justify-content-center">
                        <p><span>More info : contact@essence.com</span></p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="\shop" class="btn essence-btn">Continue Shopping</a>
                    </div>
                </div>  
            </div>
        </div>
    </div>

</x-layout>