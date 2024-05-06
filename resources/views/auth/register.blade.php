@extends('layouts.layout')


@section('content')

<div id="hero" class="lg:flex items-center relative h-screen">
  
    <!-- Content -->
    <div class="left-column px-5 pt-24 sm:px-10 md:px-10 md:flex lg:block lg:w-1/3 lg:max-w-3xl lg:mr-8 lg:px-20 relative z-20">
      <div class="md:w-1/2 md:mr-10 lg:w-full lg:mr-0">
        <div class="flex justify-center">
            <img class="text-xl xl:text-2xl font-black md:leading-none xl:leading-tight" src="{{ asset('storage/img/icons/android-chrome-512x512.png') }}" alt="logo" width="75" height="75">
            </img>
        </div>
        
        <p class="beta flex justify-center mt-2 text-sm xl:mt-1 font-semibold text-gray-700">
       
    PAWSITIVE SYSTEM | Beta

        </p>
        <p class="mt-2 text-xs xl:mt-1 text-gray-700 flex justify-center">
        Register a new account
        </p>
      </div>
      <div class="flex-1">
       
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="relative mt-2 md:mt-0 text-xs lg:mt-4">
              
    <div class="row mb-3">

        <div class="col-md-6">
            <input id="name" type="text" class="w-full px-6 py-2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">
            <input id="email" type="email" class="w-full px-6 py-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">
            <input id="username" type="text" class="w-full px-6 py-2 form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" placeholder="Username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">
            <input id="password" type="password" class="w-full px-6 py-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="w-full px-6 py-2 form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-6">
            <select id="usertype" type="text" class="w-full px-6 py-2 form-control" name="usertype" required autocomplete="usertype">
                <option value="guest">Guest</option>

            </select>
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button class="login-btn transition-all duration-300 mt-3 w-full border border-transparent rounded font-semibold tracking-wide text-xs px-4 py-3 focus:outline-none focus:shadow-outline bg-indigo-500 text-gray-100 hover:bg-yellow-500 hover:text-yellow-900">     {{ __('Register') }}</button>

            <a class="block btn btn-link text-xs my-3" href="{{ route('login') }}">
                Already have an account? <span class="font-semibold hover:text-yellow-800">{{ __('Login') }}</span> 
            </a>
        </div>
    </div>

</div>
</form>
      </div>
    </div>
  </div>
  



@endsection

