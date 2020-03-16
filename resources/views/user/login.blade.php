@extends('layouts.register-index')

@section('title')
    Masuk
@endsection

@section('content')
<div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><form id="student-login" name="student-login" class="white-popup-block" action="{{ url('student/login') }}" method="POST">@csrf
    <div class="popup_box ">
        <div class="popup_inner">
            <div class="logo text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/form-logo.png') }}" alt="">
                </a>
            </div>
            @if (Session::has('error_message'))
                <div class="alert alert_error alert-block" style="">
                   {!! session('error_message') !!}
                </div>
            @endif
            <h3>Sign in</h3>

                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <input id="email" name="email" type="email" placeholder="Email">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="boxed_btn_orange">Sign in</button>
                    </div>
                </div>

            <p class="doen_have_acc">Don’t have an account? <a href="{{ url('student/register') }}">Sign Up</a>
            </p>
        </div>
    </div></form></div></div></div>
@endsection