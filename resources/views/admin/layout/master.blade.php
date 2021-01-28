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

</head>

<body>

        <div class="container">
                <div class="row">
                        <div class="col-md-4">
                                <div class="card">
                                        <div class="card-body">
                                                <ul class="list-group">
                                                        <a href="#">
                                                                <li class="list-group-item bg-primary text-white">
                                                                        Admin Management
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.name.dashborad')}}">
                                                                <li class="list-group-item">
                                                                        DashBoard
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.category.index')}}">
                                                                <li class="list-group-item">
                                                                        Category
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.product.index')}}">
                                                                <li class="list-group-item">
                                                                        Product
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.order.pending')}}">
                                                                <li class="list-group-item">
                                                                        Order
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.order.complete')}}">
                                                            <li class="list-group-item">
                                                                Complete Order
                                                            </li>
                                                        </a>
                                                        </a>
                                                        <a href="{{route('admin.user.list')}}">
                                                            <li class="list-group-item">
                                                               Users List
                                                            </li>
                                                        </a>
                                                        <a href="{{route('admin.logout')}}">
                                                            <li class="list-group-item">
                                                               logout
                                                            </li>
                                                        </a>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8">
                                <div class="card">
                                        <div class="card-body">
                                            @include('inc.error')
                                                @yield('content')
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script
                src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/js/argon.min.js?v=1.2.0"></script>
</body>

</html>
