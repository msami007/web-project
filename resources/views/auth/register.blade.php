@extends('layout.main')
@section('main-container')
<x-nav-bar/>
<div class="container d-flex justify-content-center align-items-center sign-in">
    <div class="container1 text-center">
        <h2 class="m-4">Sign Up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-text-input id="password" class="form-control"
                              type="password"
                              name="password"
                              required autocomplete="new-password" placeholder="Password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-text-input id="password_confirmation" class="form-control"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button class="btn btn-primary" type="submit">Sign Up</button>
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
             data-text="continue_with"
             data-shape="rectangular"
             data-logo_alignment="left">
        </div>
        <div class="m-3">
            <p style="font-size: small">By creating an account, you agree to our <span><a href="#">Terms of Use</a></span>, <span><a href="#">Privacy Policy</a></span></p>
        </div>
        <p>Already Registered? <span><a href="{{ route('login') }}">Sign in</a></span></p>
        <p style="font-size: small">This page is protected by Google reCAPTCHA to ensure you're not a bot. </p>
    </div>
</div>
@endsection