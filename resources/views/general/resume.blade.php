@extends('layouts.master')

@section('page_description'){{__('page_description.resume_page')}}@endsection

@section('headAddings')<link href="{{asset("assets/css/general/resume.css")}}" rel="stylesheet"> @endsection

@section('content')
    <div class="row flex-center position-ref full-height justify-content-center align-items-center mb-3">
        <img class="col-10 col-md-8 col-lg-6 resume" src="{{asset('resources/resume/'.\Illuminate\Support\Facades\App::getLocale().'/'.__('resume.resume_name').'.png')}}">
        <!--<div class="resume_wrapper m-0 p-0 col-6">
            <iframe class="resume" type="application/pdf" src="{{ url("resources/CV_Clappe_Bruno.pdf") }}#toolbar=0" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
        </div>-->
    </div>
    <div class="row flex-center position-ref full-height justify-content-center">
        <div class="col-6 col-md-4 text-center m-0 p-0">
            <a href="{{route('resume_download')}}" class="col-12 btn btn-outline-primary">{{__('resume.resume_download_button')}}</a>
        </div>
    </div>
@endsection
