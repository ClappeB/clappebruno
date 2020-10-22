@extends('layouts.master')

@section('page_description'){{__('page_description.achievements_page')}}@endsection

@section('headAddings')<link href="{{asset('assets/css/general/work_page.css')}}" rel="stylesheet">@endsection

@section('scriptsAddings')<script src="{{asset("assets/js/general/work_page.js")}}"></script>@endsection

@section('background'){{__('planks')}}@endsection

@section('content')

    <div class="row m-0 p-0 mt-2 text-center align-items-center h-100 resume">
        <div class="container">
            <div class="work-div-placeholder sliding-work"></div>
            <div class="@Desktop{{"work-div"}}@else{{"work-div-mobile"}}@endDesktop sliding-work">
                <div class="container">
                    <h1 class="sliding-work-title text-center">{{$work['title']}}</h1>
                </div>
            </div>
            <div class="row d-md-none align-items-center mb-5">
                <div class="col section p-1">
                    @for($i = 0; $i<6; $i++)<span class="section-border"></span>@endfor
                    <h1 class="head-title text-center m-0">{{$work['title']}}</h1>
                </div>
            </div>

            <hr class="d-md-none">
            @php $count=0; @endphp
            @foreach($work['images'] as $image)

                <div class="row align-items-center my-5">
                    <div class="wrapper align-items-center">
                        <div class="col grid-text pl-0 @if($count%2==0){{"grid-text-left"}}@else{{"grid-text-right"}}@endif">
                            @if($count==0)<h1 class="title text-right d-none d-md-block mb-3 mb-md-4">{{$work['title']}}</h1>@endif
                            <p class="description text-center @if($count%2==0){{"text-md-right"}}@else{{"text-md-left"}}@endif m-0">{{$image['text']}}</p>
                        </div>

                        <div class="col justify-content-center d-flex section p-sm-4 p-3">
                            @for($i = 0; $i<6; $i++)<span class="section-border"></span>@endfor
                            <img src="{{asset('resources/work/'.$image['img'])}}" alt="{{$image['alt']}}"
                                 class="img-fluid d-block">
                        </div>
                    </div>
                </div>

                @php $count++; @endphp

                @if($count==count($work['images']))
                @elseif($count%2==1)
                    <hr class="hr-to-left">
                @else
                    <hr class="hr-to-right">
                @endif
            @endforeach

            @if(key_exists('download', $work))
                @if($count%2==1)
                    <hr class="hr-to-left">
                @else
                    <hr class="hr-to-right">
                @endif
                <div class="row align-items-center my-5">
                    <div class="wrapper align-items-center" download>
                        <div class="col grid-text pl-0 @if($count%2==0){{"grid-text-left"}}@else{{"grid-text-right"}}@endif" download>
                            <p class="description text-center @if($count%2==0){{"text-md-right"}}@else{{"text-md-left"}}@endif m-0">{{__('work.download')}}</p>
                        </div>
                        <div class="col justify-content-center d-flex section p-sm-4 p-3">
                            @for($i = 0; $i<6; $i++)<span class="section-border"></span>@endfor
                            <a class="download" href="{{route(@RouteNameWithLocale('work_download'), ['slug'=>$work['slug'], 'work_name' => $work['name']])}}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>


            @endif

        </div>
    </div>

@endsection
