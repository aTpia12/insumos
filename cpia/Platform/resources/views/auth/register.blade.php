<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="{{ asset('media/idym.jpeg') }}" alt="" width="90%">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta!</h1>
                            </div>
                            <form class="user" action="{{ route('register.store')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" 
                                            class="form-control form-control-user {{$errors->has('name') ? 'is-invalid' : ''}}" 
                                            name="name" id="name"
                                            placeholder="Nombre">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" 
                                            class="form-control form-control-user {{$errors->has('username') ? 'is-invalid' : ''}}" 
                                            name="username" 
                                            id="username"
                                            placeholder="Nombre de usuario">
                                        @if ($errors->has('username'))
                                            <span class="text-danger">{{$errors->first('username')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" 
                                        class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : ''}}" 
                                        name="email" 
                                        id="email"
                                        placeholder="Correo eléctronico">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" 
                                            class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : ''}}"
                                            id="password" 
                                            name="password" 
                                            placeholder="Contraseña">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" 
                                            class="form-control form-control-user {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            placeholder="Repetir contraseña">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar cuenta
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login')}}">Tienes una cuenta con nosotros? Ingresar!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
    @stack('scripts')
    <script src="{{asset('/js/main.js')}}"></script>
    @include('sweetalert::alert')

</body>

</html>