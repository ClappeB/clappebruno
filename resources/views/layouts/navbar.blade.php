<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="col-12 col-sm-4 col-md-3 text-center text-sm-right m-0 px-1">
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img class="navbar-icon" src="{{asset('assets/img/logo.png')}}" alt="{{__('general.logo_alt')}}"/>
                <span class="p-0 m-0 no-gutters">{{__('general.site_name')}}</span>
            </a>
        </div>

        <div class="col-12 col-sm-6 text-center justify-content-center text-sm-right m-0 p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse m-0 p-0" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto text-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('resume')}}">{{__('general.resume')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('work')}}">{{__('general.work')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">{{__('general.contact')}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
