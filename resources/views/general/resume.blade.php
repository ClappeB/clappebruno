@extends('layouts.master')

@section('page_description'){{__('page_description.resume_page')}}@endsection

@section('headAddings')<link href="{{asset("assets/css/general/resume.css")}}" rel="stylesheet"> @endsection

@section('background'){{'planks'}}@endsection

@section('content')
    <div class="container">
        <div class="row flex-center position-ref full-height justify-content-center align-items-center mb-3">
            @Desktop
                <div class="m-0 p-0 col-12 col-sm-10 col-md-8">
                    <iframe class="resume" type="application/pdf" src="{{ asset('resources/resume/'.\Illuminate\Support\Facades\App::getLocale().'/'.__('resume.resume_name').'.pdf') }}#toolbar=0&view=fit" frameborder="0"></iframe>
                </div>
            @else
                <img class="col-10 col-md-8 col-lg-6 resume-border" src="{{asset('resources/resume/'.\Illuminate\Support\Facades\App::getLocale().'/'.__('resume.resume_name').'.png')}}">
            @endDesktop
        </div>
        <div class="row flex-center position-ref full-height justify-content-center mb-3">
            <div class="col-8 col-sm-6 col-md-4 text-center m-0 p-0">
                <a href="{{route('resume_download')}}" class="col-12 btn resume-download-button">{{__('resume.resume_download_button')}}</a>
            </div>
        </div>
    </div>
@endsection
