<header>
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm dark-rock">
        <div class="col-10 col-sm-4 col-md-3 text-sm-left text-md-right m-0 px-0 px-sm-1 mr-md-3">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img class="navbar-icon" src="{{asset('assets/img/logo.png')}}" alt="{{__('general.logo_alt')}}"/>
                <span class="p-0 m-0 no-gutters">{{__('general.site_name')}}</span>
            </a>
        </div>

        <div class="col-2 col-sm-8 text-sm-right m-0 p-0 toggle-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="col-12 col-sm-12 col-md-6 text-center justify-content-center text-sm-right m-0 p-0">
            <div class="collapse navbar-collapse m-0 p-0" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto text-center">

                    <li class="nav-item white-text mx-lg-1">
                        <a class="navbar-link" href="{{route('resume')}}">{{__('general.resume')}}</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="navbar-link" href="{{route('work')}}">{{__('general.work')}}</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="navbar-link" href="{{route('contact')}}">{{__('general.contact')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
