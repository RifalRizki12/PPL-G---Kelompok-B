<header class="header fixed-top" style="margin-bottom: 200px">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> animeyuusa@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        @guest
                        <div class="header__top__right__auth">
                            <a href="{{ url('/login') }}"><i class="fa fa-user"></i> Login</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ url('/register') }}"><i class="fa fa-user"></i> Daftar</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="header__top__right__auth">
                            <a href="{{ url('/register') }}"><i class="fa fa-user"></i> Daftar</a>
                        </div>
                        @endif
                        @else
                        <div class="header__top__right__auth">
                            <a href="{{ url('/profil-pencari') }}"><i class="fa fa-user"></i> Profil</a>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="{{ url('/logout') }}"><i class="fa fa-user"></i> Logout</a>
                        </div>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h2 class="text-center"><a href="/pencari-dashboard" style="color:rgb(0, 206, 62)">AI.JOBS</a></h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/pencari-dashboard">Home</a></li>
                            {{-- <li><a href="shop-grid.html">Shop</a></li> --}}
                            <li><a href="/post-pencari">Profil yang Tampil</a>
                                {{-- <ul class="header__menu__dropdown">
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul> --}}
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</header>
