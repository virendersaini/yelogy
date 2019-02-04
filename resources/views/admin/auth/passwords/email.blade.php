@extends('admin.layout.login')

@section('content')
<div class="login-form">
    <div class="form-title">Reset Password</div> 
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}" id="resetlinkform">
        {{ csrf_field() }}
        <ul>
            <li class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif            
            </li>
            <li>           
                <button type="submit" class="btn btn-primary full">
                    Send Password Reset Link
                </button>            
            </li>
        </ul>
    </form>
</div>        
@endsection
@push('scripts')
<script type="text/javascript">
    $('#resetlinkform').validate();    
</script>
@endpush 
