<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('assets/img/logo.png')}}" style="width:40px" alt="{{__('general.logo_alt')}}"/>
            @lang('general.site_name')
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
