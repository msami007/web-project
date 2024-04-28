
@extends('layout.main')
@section('main-container')
<x-nav-bar/>
<div class="container d-flex justify-content-center align-items-center sign-in">
    <div class="container1 text-center">
        <h2 class="m-4">Forgot Password</h2>
        <div class="mb-4" style="font-size: small">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
        
            <!-- Email Address -->
            <div>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        
            <button class="btn btn-primary mt-4" type="submit">Send Link</button>
        </form>

    </div>
</div>

  
