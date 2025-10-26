<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

  <!-- Bootstrap 4 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

  <!-- SB Admin 2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                <form class="user" method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user"
                                id="username" placeholder="Ingresa tu usuario..." required>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="password" placeholder="Contraseña..." required>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">
                                    Recordarme
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Ingresar
                        </button>
                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>

</body>

</html>