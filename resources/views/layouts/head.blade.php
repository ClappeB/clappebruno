<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('assets/img/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('page_description', __('page_description.default'))">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titre', __('general.site_name'))</title>

    @include('layouts.common_css')

</head>
