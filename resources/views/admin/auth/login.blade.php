<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> 
<!--<![endif]-->
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
    <link rel="stylesheet" href="../public/admin/assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
                        <h2>Login</h2>
                        <form action="{{ route('admin.login') }}" method="post">
                        
                        <div class="login-form">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" required="">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-1">
                                     <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="Customers1">
                                          <label class="custom-control-label" for="Customers1">Remember Me</label>
                                     </div> 
                                </div>
                                <div class="form-group col-md-6  text-right">
                                     <a href="#" class="text-danger">Forgot Your Password?</a>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' error-alert' : '' }} has-feedback">
                            {{-- {{ pr($errors) }} --}}
                            @if ($errors->has('email'))
                                <span class="help-block error">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif 
                        </div>
                            <div class="form-group">
                                 <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                            
                        </div> 
                         {{ csrf_field() }} 
                        </form>       
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
