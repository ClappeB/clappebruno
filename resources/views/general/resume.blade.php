@extends('layouts.master')

@section('page_description'){{__('page_description.resume_page')}}@endsection

@section('headAddings')<link href="{{asset("assets/css/general/resume.css")}}" rel="stylesheet"> @endsection

@section('scriptsAddings')<script src="{{asset("assets/js/general/resume.js")}}"></script> @endsection

@section('background'){{'planks'}}@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center mb-3">
            <div id="resume_div" class="col-12 col-sm-12 col-md-8 text-center">
                @for($i=0; $i<3; $i++)
                    <div @if($i==0) id="{{__('resume.resume_name')}}" @endif class="spinner-grow" role="status">
                        @if($i==0)<span class="sr-only">Loading...</span>@endif
                    </div>
                @endfor
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-8 col-sm-6 col-md-4 text-center m-0 p-0">
                <a href="{{@RouteWithLocale('resume_download')}}" class="col-12 btn resume-download-button">{{__('resume.resume_download_button')}}</a>
            </div>
        </div>
    </div>
@endsection
