<div class="white scrolling-navbar sticky-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg">
                    <!-- Brand -->
                    <a class="navbar-brand waves-effect" href="#" target="_blank">
                        <strong class="blue-text">AI.JOBS</strong>
                    </a>

                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="/">Home
                            <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">Free download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free tutorials</a>
                        </li>
                        </ul>

                        <!-- Right -->
                        <ul class="navbar-nav nav-flex-icons">

                        <li class="nav-item">
                            <a class="nav-link waves-effect">
                            <span class="badge red z-depth-1 mr-1"> 1 </span>
                            <i class="fas fa-shopping-cart"></i>
                            <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ url('profil')}}" class="dropdown-item">
                                    Profil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12 py-2 bg-info shadow">
                @php
                    $category = App\Models\Category::where('status','!=','2')->get();
                @endphp
                @foreach ($category as $category_nav_item)
                <a href="{{ url('lowongan/'.$category_nav_item->url) }}" class="px-4 text-white">{{ $category_nav_item->name }}</a>

                @endforeach
            </div>
        </div>


    </div>
</div>
