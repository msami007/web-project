<div>
    <div class="container-fluid bg-light">
        <div class="fluid-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
                <a class="navbar-brand" href="#"><img src="{{asset('img/HUEHUB.png')}}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbars" id="navbarNav">
                    @if(!Auth::check() && !request()->is('signin') && !request()->is('signup'))
                        <button type="button" class="btn btn-outline-primary m-2"> <a href="{{route('sign.in')}}">Sign in</a></button>
                        <button class="btn btn-primary" type="submit"><a style="color: white" href="{{route('sign.up')}}">Sign up</a></button>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>