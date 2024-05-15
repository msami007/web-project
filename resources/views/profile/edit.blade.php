@extends('layout.main')
@section('main-container')
<x-nav-bar/>
{{-- <x-slot name="header">
    <h2 class="container">
        {{ __('Profile') }}
    </h2>
</x-slot> --}}

<div class="py-12">
    <div class=" mx-auto profile">
        <div class="p-4 my-5 container2">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 my-5 container2">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 my-5 container2">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection