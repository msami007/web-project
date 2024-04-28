@extends('layout.main')
@section('main-container')
    <x-nav-bar/>
    <div class="container d-flex justify-content-center align-items-center sign-in">
        <div class="container1 text-center main-box">
            <h2 class="m-4">Sign In</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}
                    <x-text-input id="password" class="form-control"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="form-group">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <x-primary-button class="ms-3 btn btn-primary">
                    {{ __('Log in') }}
                </x-primary-button>
            </form>
            <p class="text-center">OR</p>
            <script src="https://accounts.google.com/gsi/client" async></script>
            <div id="g_id_onload"
            data-client_id="YOUR_GOOGLE_CLIENT_ID"
            data-login_uri="https://your.domain/your_login_endpoint"
            data-auto_prompt="false">
        </div>
        <div class="g_id_signin"
            data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="sign_in_with"
                    data-shape="rectangular"
                    data-logo_alignment="left">
        </div>
        <div class="flex items-center justify-end mt-3 mb-3">
             @if (Route::has('password.request'))
                <a style="color: black" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                     {{ __('Forgot your password?') }}
                    </a>
            @endif
        </div>
                
            <p>New to HueHub? <span><a href="{{route('register')}}">Sign up now</a></span></p>
            <p style="font-size: small">This page is protected by Google reCAPTCHA to ensure you're not a bot. </p>
        </div>
    </div>
@endsection