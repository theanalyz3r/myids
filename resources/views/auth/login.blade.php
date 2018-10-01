@extends('layouts.app')

@section('page-header')
    <div class="page-header flex">
        <div class="font-bold">
            Login
        </div>
    </div>
@endsection

@section('section-1')
<div class="section">
    <div class="section-header flex justify-between mb-4">
      <div class="section-header-left flex text-white font-light items-baseline leading-none">
        <div class="text-2xl font-light">
          Please Login Now
        </div>
      </div>
    </div>
  
    <div class="section-content">
      <div class="card p-2 mb-4">
        <div class="panel-body">
          <form method="POST" action="{{ route('login') }}" role="form">
            {{ csrf_field() }}						
            <div>
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="name">
                Email Address
              </label>
              <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="example@pda-tech.com" required autofocus>
              @if ($errors->has('email'))
                <span class="text-red font-bold">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
              <p class="text-red text-xs italic mb-3">Please fill out this field.</p>
            </div>
            
            <div>
              <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="description">
                Password
              </label>
              <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" id="password" name="password" type="password" placeholder="Your Password" required>
              @if ($errors->has('password'))
                <span class="text-red font-bold">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
              <p class="text-red text-xs italic mb-3">Please fill out this field.</p>
            </div>

            <a class="no-underline uppercase text-xs tracking-tight text-black" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>

            <div class="form-group">
              <button type="submit" class="rounded-full text-white bg-blue px-4 py-2">Login</button>        
            </div>

            <div class="form-group">  
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                  <span class="uppercase text-xs tracking-tight text-black">Remember Me</span>
                </label>
              </div>
            </div>

            <br>

            <div class="text-xs tracking-tight text-center uppercase">
              <p>© PDA Technical 2018 - All Rights Reserved</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
