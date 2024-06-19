<!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img src="{{ URL::to('img/core-img/logo.png') }}" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/" style="{{ request()->is('/') ? 'color:#000000' : 'color:#787878'}}">Home</a></li>
                            <li><a href="/shop" style="{{ request()->is('shop') ? 'color:#000000' : 'color:#787878'}}">Shop</a></li>
                            <li><a href="/blog" style="{{ request()->is('blog') ? 'color:#000000' : 'color:#787878'}}">Blog</a></li>
                            <li><a href="/contact" style="{{ request()->is('contact') ? 'color:#000000' : 'color:#787878'}}">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                @if (Route::has('login'))
                    @auth
                    <!-- User Dashboard Info -->
                    <div class="user-login-info">
                        <a href="{{ url('/dashboard') }}"><img src="{{ URL::to('img/core-img/home.svg') }}" alt=""></a>
                    </div>
                        @else
                            <!-- User Login Info -->
                            <div class="user-login-info">
                                <a href="{{ route('login') }}"><img src="{{ URL::to('img/core-img/user.svg') }}" alt=""></a>
                            </div>
                    @endauth
                @endif
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="/cart" ><img src="{{ URL::to('img/core-img/bag.svg') }}" alt=""> </a> 
                    <!-- <span>3</span> -->
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->