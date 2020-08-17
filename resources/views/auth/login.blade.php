
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sellfast | Payment analytics</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('login/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('login/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('login/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('login/style.css')}}">
</head>

<body >
    <style>
        .bg-back {




			}

			.layer {
				background-color: #000;
				background-color:rgba(0,0,0,0.87);

			}
    </style>
    <main>
        <section class="fxt-template-animation fxt-template-layout9 layer" >
            <div class="">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-3">
                            <div class="fxt-header">
                                <a href="login-9.html" class="fxt-logo"><img src="{{asset('img/logo.png')}}" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="fxt-content">
                                @if(count($errors) > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <strong><i class="fa fa-bell"></i></strong>
                                            @foreach ($errors->all() as $error)
                                                {{$error}}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <h2>Login into your account</h2>
                                <div class="fxt-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                                                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="fxt-transformY-50 fxt-transition-delay-3">
                                                <div class="fxt-checkbox-area">
                                                    <div class="checkbox">
                                                        <input id="checkbox1" type="checkbox">
                                                        <label for="checkbox1">Keep me logged in</label>
                                                    </div>
                                                    <a href="forgot-password-9.html" class="switcher-text">Forgot Password</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="fxt-transformY-50 fxt-transition-delay-4">
                                                <button type="submit" class="fxt-btn-fill">Log in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</body>
<script src="{{asset('login/js/jquery-3.5.0.min.js')}}"></script>
    <script src="{{asset('login/js/popper.min.js')}}"></script>
    <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('login/js/validator.min.js')}}"></script>
    <script src="{{asset('login/js/main.js')}}"></script>
</html>
