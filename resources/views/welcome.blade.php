@extends('layout.main')
@section('main-container')
    <x-nav-bar/>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container">
            <h1>Welcome to the Palette of the future</h1>
            <button class="btn btn-primary">Start Generating</button>
        </div>
        <div class="container">
            <img src="{{asset('img/Image-removebg.png')}}" alt="">
        </div>
    </div>
    
@endsection