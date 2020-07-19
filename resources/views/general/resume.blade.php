@extends('layouts.master')

@section('page_description'){{__('page_description.resume_page')}}@endsection

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <embed src="{{ url("./resources/CV_Clappe_Bruno.pdf") }}" style="width:600px; height:800px;" frameborder="0">
                </div>
            </div>
        </div>
@endsection
