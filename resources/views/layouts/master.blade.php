<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.head')
    @yield('headAddings')
    <body class="@Desktop{{__('body-desktop')}}@else{{__('body-mobile')}}@endDesktop @yield('background', "")">
        <div id="app">
            @include('layouts.navbar')
            <main class="{{'py-4 h-100 container-fluid'}} @yield('main-classes', "")">
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    @include('layouts.common_scripts')
    @yield('scriptsAddings')
    </body>
</html>
