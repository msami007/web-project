@extends('layout.main')
@section('main-container')
<x-nav-bar/>
<div class="dashboard-container m-4 " style="height: 90vh;">
    <div class="sidebar d-flex flex-column dash-border" style="height: 100%;">
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item dash-nav-item my-3">
                <a class="nav-link d-flex px-3 py-2 mr-4 {{request()->is('dashboard/palette') || request()->is('dashboard')? 'active':''}}" href="#" onclick="loadContent('palettes')">
                    <img src="{{ asset('svg/palette.svg') }}" alt="Description of SVG" style="vertical-align: middle;">
                    <span class="ml-3 mr-5">Palettes</span>
                </a>
            </li>
            <li class="nav-item dash-nav-item my-3">
                <a class="nav-link d-flex px-3 py-2 mr-4 {{ request()->is('dashboard/library') ? 'active' : '' }}" href="#" onclick="loadContent('library')">
                    <img src="{{ asset('svg/library.svg') }}" alt="Description of SVG" style="vertical-align: middle;">
                    <span class="ml-3 mr-5">Library</span>
                </a>
            </li>
        </ul>
        <button class="btn btn-primary mt-auto mb-3 dash-nav-item" type="button" onclick="newAction()">New <img src="{{ asset('svg/plus.svg') }}" alt="Description of SVG" style="vertical-align: middle;"></button>
    </div>
    
    <div class="main-content">
        <div class="title">
            <x-dash-title/>
        </div>
        <div class="content" id="dashboardContent">
            <!-- Dynamic content loads here without reloading the page -->
        </div>
    </div>
</div>

@endsection