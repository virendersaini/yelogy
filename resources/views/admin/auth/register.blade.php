<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Just Helper</title>
    <meta name="description" content="Just Helper">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="../public/admin/assets/css/normalize.css">
    <link rel="stylesheet" href="../public/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/admin/assets/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../public/admin/assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

<body class="open p-0">
<!-- Headre-->
    <div class="login-header text-center ">
        <img src="../public/admin/images/logo.png" alt="Just helper">
    </div>
<!-- Headre-->

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-content">
                        
                        <div class="register-form">             
                            <div class="form-title">Register</div>    
                            <form  method="POST" id="registform" action="{{ route('admin.register') }}">
                                {{ csrf_field() }}
                                <ul>
                                    <li class="{{ $errors->has('name') ? ' has-error' : '' }}">       
                                        <label for="name" >Name</label>            
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </li>
                                    <li class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-Mail Address</label>           
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </li>
                                    <li class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </li>        
                                    <li>
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </li> 
                                    <li>
                                        <button type="submit" class="btn btn-primary full">
                                            Register
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <div class="forgot-pass text-center"><a href="{{ url('/login') }}">Already Have an Account?</a></div>
                        </div>        
</div>
                </div>
            </div>
        </div>
    </main>

<!-- Footer-->
    <footer class="main-footer" style="left: 0">
       <p>&copy; 2018 Just Helper.</p>
    </footer>
<!-- Footer-->
</body>
</html>