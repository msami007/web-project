@extends('layout.main')
@section('main-container')
<x-nav-bar/>
<div class="container d-flex justify-content-center align-items-center sign-in">
    <div class="container1 text-center">
        <h2 class="m-4">Sign Up</h2>
        <form>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputtext" aria-describedby="text" placeholder="Enter name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
            </div>
            <button class="btn btn-primary" type="submit" >Sign Up</button>
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
            <p style="font-size: small">By continuing you are agring to out <span><a href="#">Terms</a></span> and <span><a href="#">conditions</a></span></p>
        </div>
        <p>Already Register? <span><a href="{{route('sign.in')}}">Sign in</a></span></p>
        <p style="font-size: small">This page is protected by Google reCAPTCHA to ensure you're not a bot. </p>

    </div>
</div>
@endsection
