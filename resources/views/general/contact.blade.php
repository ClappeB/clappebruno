@extends('layouts.master')

@section('page_description'){{__('page_description.contact_page')}}@endsection

@section('headAddings')
    <link href="{{asset('assets/css/general/contact.css')}}" rel="stylesheet">
    @flash('mail_sent')
        <link href="{{asset('assets/css/layouts/flash.css')}}" rel="stylesheet">
    @endflash
@endsection

@section('background'){{'planks'}}@endsection

@section('content')

    @flash('mail_sent')
        @include('general.flash')
    @endflash
    <div class="container align-items-center">
        <div class="row justify-content-center px-lg-3">
                <div class="card col-12 p-0">
                    <div class="card-header text-center"><h3>{{ __('contact.page_name') }}</h3></div>
                    <div class="card-body">

                        <form method="POST" action="{{route('mail_contact')}}">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-12 col-md-10 mx-1 mx-md-0">
                                    <label for="email" class="col-12 col-sm-5 col-md-4 col-lg-3 decorated-label text-center">{{ __('contact.email') }}</label>
                                    <div class="col-12 animated-area p-0 m-0">
                                        <span class="animation-adding"></span>
                                        <span class="animation-adding"></span>
                                        <input id="email" type="text" class="form-control decorated-label-area @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" placeholder="{{__('contact.placeholders.email')}}" autofocus>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-12 col-md-10 mx-1 mx-md-0">
                                    <label for="object" class="col-12 col-sm-5 col-md-4 col-lg-3 decorated-label text-center">{{ __('contact.object') }}</label>
                                    <div class="col-12 animated-area p-0 m-0">
                                        <span class="animation-adding"></span>
                                        <span class="animation-adding"></span>
                                        <input id="object" type="text" class="form-control decorated-label-area @error('object') is-invalid @enderror"
                                               name="object" value="{{ old('object') }}" placeholder="{{__('contact.placeholders.object')}}" autofocus>
                                    </div>
                                    @error('object')
                                    <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-12 col-md-10 mx-1 mx-md-0">
                                    <label for="message" class="col-12 col-sm-5 col-md-4 col-lg-3 decorated-label text-center">{{__('contact.message')}}</label>
                                    <div class="col-12 animated-area p-0 m-0">
                                        <span class="animation-adding"></span>
                                        <span class="animation-adding"></span>
                                        <textarea id="message" name="message" class="form-control decorated-label-area @error('message') is-invalid @enderror"
                                                  rows="3" placeholder="{{__('contact.placeholders.message')}}" maxlength="3000">{{ old('message') }}</textarea>
                                    </div>
                                    @error('message')
                                    <span class="invalid-feedback d-inline-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-0">
                                <div class="col-12 col-md-6 text-center">
                                    <button type="submit" class="btn decorated-button">
                                        {{ __('contact.send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center text-bold font-italic text-capitalize">
                        {{\Carbon\Carbon::now()->translatedFormat(__('general.date_format'))}}
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scriptsAddings') @stack('flashScripts') @endsection
