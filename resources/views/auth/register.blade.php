@extends('screens.manage.master')

@section('title', 'Login')

@section('scripts1')
<style>
/* BESPOKE SIGNIN ONLY CSS */
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #fff;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;

  background:rgba(255,255,255,1);
  border-radius: 4px;

  border: 1px solid rgba(0,0,0,.05);
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);

    
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
h2 {
  text-align: center;
}
p {
  margin:0px;
  padding: 1em;
}
</style>
@endsection

@section('content')
  <div class="container">
    <form method="POST" action="{{ route('register') }}" role="form" class="form-signin">
    {{ csrf_field() }}

     <h2 class="form-signin-heading"><img src="/img/screens/manage/pgh-logo-130.png" alt="Preston Guild Hall"><br><h3 class="text-center">Please Register</h3></h2>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="email">Name:</label>
          <input type="name" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
            <span class="help-block">
             <strong>{{ $errors->first('name') }}</strong>
           </span>
         @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required autofocus>

          @if ($errors->has('email'))
            <span class="help-block">
             <strong>{{ $errors->first('email') }}</strong>
           </span>
         @endif
    </div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

      <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

      <label for="password-confirm">Confirm Password:</label>
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>

      <button class="btn btn-lg btn-success btn-block" type="submit">Register <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
</div>

<br>

  <div class="row text-center copyright">
    <p>© Preston Guild Hall LTD 2016 - All Rights Reserved</p>
  </div>
  </form>
  
</div>
@endsection
