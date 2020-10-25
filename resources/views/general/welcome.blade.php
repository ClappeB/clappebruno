@extends('layouts.master')

@section('page_description'){{__('page_description.welcome_page')}}@endsection

@section('headAddings')<link href="{{asset('assets/css/general/welcome.css')}}" rel="stylesheet">@endsection

@section('background'){{__('planks')}}@endsection

@section('content')
    <div class="row m-0 p-0 text-center h-100">
        <div class="wrapper">
            <div class="photo-col col p-0">
                <div class="photo-section">
                    <div>
                        <div class="photo">
                            <img class="img-fluid" src="https://picsum.photos/350/450">
                            <span class="point top-right-corner-point rounded-circle"><img src="{{asset("assets/img/thumbtack.png")}}"></span>
                            <span class="point bottom-left-corner-point rounded-circle"><img src="{{asset("assets/img/thumbtack.png")}}"></span>
                        </div>
                        <p class="name">{{__('welcome.name')}}</p>
                        <p class="job">{{__('welcome.job')}}</p>
                    </div>
                </div>
                <div class="photo-text d-none d-lg-block">
                    <p>{{__('welcome.skills_description')}}</p>
                </div>
            </div>
            <div class="text-col col p-0">
                <div class="text-title-section">
                    <p class="text-site-title">{{__('welcome.name')}}</p>
                </div>
                <div class="text-personality-space">
                    <div class="text-personality">
                        @foreach(__('welcome.qualities') as $quality)
                            <span class="personnality-span"><p class="personnality-word">{{$quality}}</p></span>
                        @endforeach
                    </div>
                </div>
                <div class="text-site-description-space">
                    <p class="text-site-description">{{__('welcome.site_description')}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
