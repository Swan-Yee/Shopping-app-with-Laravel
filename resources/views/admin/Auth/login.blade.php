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

<body style="height: 100vh; width: 100vw;" class="d-flex justify-content-center align-items-center ml-auto">
        <div class="container">
                <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                                <div class="card">
                                        <div class="card-body">
                                            <form action="{{route('admin.login')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="mail" class="form-control" name="mail">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </form>
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
