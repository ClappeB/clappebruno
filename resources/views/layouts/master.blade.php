<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('layouts.head')
    @yield('headAddings')
    <body>
        <div id="app">
            @include('layouts.navbar')
            <main class="py-4">
                @yield('content')
            </main>
            @include('layouts.footer')
        </div>
    @include('layouts.common_scripts')
    @yield('scriptsAddings')
    </body>
</html>
