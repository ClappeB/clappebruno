@extends('layouts.master')

@section('page_description'){{__('page_description.achievements_page')}}@endsection

@section('headAddings')<link href="{{asset('assets/css/general/work.css')}}" rel="stylesheet">@endsection

@section('background'){{__('planks')}}@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="container">
            <div class="masonry mx-2 mx-xl-5">
                @Desktop
                    @foreach(__('work.work_pages') as $work)
                        <form method="GET" action="{{route(@RouteNameWithLocale('work_page'), ['slug'=>$work['slug']])}}">
                            <button type="submit" class="card text-white work">
                                <img src="{{asset('resources/work/'.$work['images']['overview']['img'])}}" class="card-img img-fluid" alt="...">
                                <div class="card-img-overlay align-items-center p-2 p-sm-4">
                                    <h5 class="card-title m-0 text-right">{{$work['title']}}</h5>
                                    <span class="card-separator"></span>
                                    <p class="card-text text-justify">{{$work['description']}}</p>
                                </div>
                            </button>
                        </form>
                    @endforeach
                @else
                    @foreach(__('work.work_pages') as $work)
                        <a href="{{route('work_page|'.\Illuminate\Support\Facades\App::getLocale(), ['slug'=>$work['slug']])}}">
                            <div class="card text-white work">
                                <img src="{{asset('resources/work/'.$work['images']['overview']['img'])}}" class="card-img img-fluid" alt="...">
                                <div class="card-img-overlay align-items-center pr-4 p-sm-4">
                                    <h5 class="card-title m-0 text-center">{{$work['title']}}</h5>
                                    <span class="card-separator"></span>
                                    <p class="card-text text-justify">{{$work['description']}}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endDesktop
            </div>
        </div>
    </div>
@endsection
