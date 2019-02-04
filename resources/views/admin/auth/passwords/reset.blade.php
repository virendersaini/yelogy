@extends('admin.layout.login')
@section('content')
<div class="login-form">
    <div class="form-title">Reset Password</div>              
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" id="restpassform" action="{{ route('admin.password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <ul>
            <li class="{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>                
                <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif                
            </li>

        <li class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif            
        </li>
        <li class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm">Confirm Password</label>            
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif            
        </li>
        <li class="form-group">            
            <button type="submit" class="btn btn-primary full">
                    Reset Password
            </button>            
        </li>
    </form>                
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('#restpassform').validate({
        rules: {
            password: {
                required: true, 
            },
            password_confirmation: {
                required: true,                
                equalTo: "#password",                
            }
        },
          messages: {          
            cnfpassword: {
              equalTo: "Password should be same.",            
            }
          }
    });    
</script>
@endpush 
