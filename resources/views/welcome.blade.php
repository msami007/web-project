@extends('layout.main')
@section('main-container')
    <x-nav-bar/>
    <div class="container-fluid d-flex justify-content-center align-items-center mt-5">
        <div class="container">
            <div class="welcome">
                <h1>Welcome to HueHub - Your Ultimate Palette Generator!</h1>
                <h2>Unleash Your Creativity with Every Shade</h2>
                <a href="{{route('palatte.page')}}"><button class="btn btn-primary">Start Generating</button></a>
            </div>
        </div>
        <div class="container">
            <img src="{{asset('img/Image-removebg.png')}}" alt="">
        </div>
    </div>
    <h3 class="text-center">A completely free palette generating website</h3>
    
@endsection