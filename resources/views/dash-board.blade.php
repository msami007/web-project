@extends('layout.main')

@section('main-container')
<x-nav-bar/>
<div class="dashboard-container m-4" style="height: 90vh;">
    <div class="sidebar d-flex flex-column dash-border" style="height: 100%;">
        <ul class="nav flex-column flex-grow-1">
            <li class="nav-item dash-nav-item my-3">
                <a class="nav-link d-flex px-3 py-2 mr-4 {{ request()->is('dashboard/palette') || request()->is('dashboard') ? 'active' : '' }}" href="{{route('dashboard.palettes')}}" onclick="loadContent('palettes')">
                    <img src="{{ asset('svg/palette.svg') }}" alt="Description of SVG" style="vertical-align: middle;">
                    <span class="ml-3 mr-5">Palettes</span>
                </a>
            </li>
            {{-- <li class="nav-item dash-nav-item my-3">
                <a class="nav-link d-flex px-3 py-2 mr-4 {{ request()->is('dashboard/library') ? 'active' : '' }}" href="#" onclick="loadContent('library')">
                    <img src="{{ asset('svg/library.svg') }}" alt="Description of SVG" style="vertical-align: middle;">
                    <span class="ml-3 mr-5">Library</span>
                </a>
            </li> --}}
        </ul>
        <button class="btn btn-primary mt-auto mb-3 dash-nav-item" type="button" onclick="newAction()"><a href="{{route('palatte.page')}}" style="color: white">New <img src="{{ asset('svg/plus.svg') }}" alt="Description of SVG" style="vertical-align: middle;"></a></button>
    </div>
    
    <div class="main-content">
        
        <div class="content" id="dashboardContent">
            <h2>{{ $title }}</h2>
            <div class="row">
                @foreach($palettes as $palette)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $palette->name }}</h5>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"data-toggle="modal" data-target="#ViewModal" href="#"><i class="fa fa-eye mr-2"></i>View</a>
                                            <form action="{{ route('palettes.delete', $palette->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Remove</button>
                                            </form>
                                        </div>
                                      </div>

                                    </div>
                                <div class="d-flex">
                                    <div style="background-color: {{ $palette->hex1 }}; width: 20%; height: 50px;"></div>
                                    <div style="background-color: {{ $palette->hex2 }}; width: 20%; height: 50px;"></div>
                                    <div style="background-color: {{ $palette->hex3 }}; width: 20%; height: 50px;"></div>
                                    <div style="background-color: {{ $palette->hex4 }}; width: 20%; height: 50px;"></div>
                                    <div style="background-color: {{ $palette->hex5 }}; width: 20%; height: 50px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <x-view-com/> --}}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
