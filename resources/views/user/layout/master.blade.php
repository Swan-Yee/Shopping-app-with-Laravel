<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MM-Coder-Shop</title>
        <link rel="stylesheet"
                href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
        <link rel="stylesheet"
                href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/css/argon.min.css?v=1.2.0">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
        <!-- Header -->
            <div class="container-fluid" id="header">
                <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand text-white" href="#">MM-Shop</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                                <a class="nav-link" href="#">Home </a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="#">Your Order</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        User
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    @if (Auth::check())
                                                        <a class="dropdown-item" href="#">Welcome {{auth()->user()->name}}!</a>
                                                        <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{url('/login')}}">Login</a>
                                                        <a class="dropdown-item" href="{{url('/register')}}">Register</a>
                                                    @endif
                                                </div>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="{{url('/cart')}}" tabindex="-1"
                                                        aria-disabled="true">
                                                        Cart
                                                        <small class="badge badge-danger">{{$cart_count}}</small>
                                                </a>
                                        </li>
                                </ul>
                                <form class="form-inline" method="get" action="{{url('product/search')}}">
                                        <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                                aria-label="search" name="search">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                        </div>
                </nav>
                <div class="container">
                        <div class="row">
                                <div class="col-md-6">
                                        <h1>Welcome From MM-Coder Shopping Website</h1>
                                        <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium
                                                sequi voluptas similique sed minima rerum labore reprehenderit, illo
                                                recusandae quasi tempore placeat aliquam autem, a soluta nisi totam
                                                temporibus dolorem!
                                        </p>
                                        @if (!Auth::check())
                                           <a href="{{url('/register')}}" class="btn btn-outline-primary">SignUp</a>
                                           <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
                                        @else
                                            <a href="{{url('/logout')}}" class="btn btn-danger">Logout</a>
                                        @endif

                                </div>
                                <div class="col-md-6 text-center">
                                        <img class=""
                                                src="https://wp.xpeedstudio.com/seocify/home-fifteen/wp-content/uploads/sites/27/2020/03/home17-banner-image-min.png"
                                                alt="">
                                </div>
                        </div>
                </div>
            </div>
        <!-- End Header -->
        <div class="container-fluid mt-5">
                <div class="row">
                        <!-- For Category and Information -->
                        <div class="col-md-3">
                                <div class="card">
                                        <div class="card-body">
                                                <ul class="list-group">
                                                    <a href="{{url('order/pending')}}">
                                                        <li class="list-group-item bg-dark text-white">
                                                            Pending Order
                                                        </li>
                                                    </a>
                                                    <a href="{{url('order/confirm')}}">
                                                        <li class="list-group-item bg-danger text-white">
                                                            Confirm Order
                                                        </li>
                                                    </a>
                                                        <li class="list-group-item bg-danger text-white">
                                                            <a href="{{url('/cart')}}" class="text-white">Cart Detail!</a>
                                                        </li>
                                                        <li class="list-group-item bg-danger text-white">
                                                            <a href="{{url('/info')}}" class="text-white">Your Acc info</a>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                                <div class="card">
                                        <div class="card-body">
                                                <ul class="list-group">
                                                        <li class="list-group-item bg-primary text-white">
                                                                All Category
                                                        </li>
                                                        @foreach ($category as $c)
                                                        <a href="{{url('/product/category/'.$c->slug)}}">
                                                            <li class="list-group-item">
                                                                {{$c->name}}
                                                                    <span class="badge badge-primary float-right">{{$c->product_count}}</span>
                                                            </li>
                                                        </a>
                                                        @endforeach
                                                </ul>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8">
                            @include('inc.error');
                            @yield('content');
                        </div>
                </div>
        </div>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script
                src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/js/argon.min.js?v=1.2.0"></script>
</body>
</html>
