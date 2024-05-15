<div>
    <div class="container-fluid bg-light">
        <div class="fluid-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
                <a class="navbar-brand" href="#"><img src="{{asset('img/HUEHUB.png')}}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbars" id="navbarNav">
                    @if(!Auth::check() && !request()->is('login') && !request()->is('signup'))
                        <button type="button" class="btn btn-outline-primary m-2"> <a href="{{route('login')}}">Sign in</a></button>
                        <button class="btn btn-primary" type="submit"><a style="color: white" href="{{route('register')}}">Sign up</a></button>
                    @elseif(Auth::check())
                    <div class="dropdown">
                        <button class="dropdown-toggle btn bg" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <x-profile-pic/>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="{{route('palette.dash')}}">Dashboard</a>
                          <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                          <form method="POST" class="dropdown-item1" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        </div>
                      </div>
                    @endif
                </div>
            </nav>            
        </div>
    </div>
</div>