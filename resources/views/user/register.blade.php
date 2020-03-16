@extends('layouts.register-index')

@section('title')
    Daftar
@endsection

@section('content')
<div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><form id="student-register" name="student-register" class="white-popup-block" action="{{ url('student/register') }}" method="POST">@csrf
    <div class="popup_box ">
        <div class="popup_inner">
            <div class="logo text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset ('img/form-logo.png') }}" alt="">
                </a>
            </div>
            @if (Session::has('error_message'))
                <div class="alert alert_error alert-block" style="">
                   {!! session('error_message') !!}
                </div>
            @endif
            <h3>Resistration</h3>

                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <input id="name" name="name" type="text" placeholder="Full Name">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input id="email" name="email" type="email" placeholder="Email">
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <input id="password" name="password" type="password" placeholder="Password" class="pwstrength">
                    </div>
                    {{-- <div class="col-xl-12 col-md-12">
                        <input type="Password" placeholder="Confirm password">
                    </div> --}}
                    <div class="col-xl-12">
                        <button type="submit" class="boxed_btn_orange">Sign Up</button>
                    </div>
                </div>

            <p class="doen_have_acc">Already have an account? <a href="{{ url('student/login') }}">Login</a>
            </p>
        </div>
    </div></form></div></div></div>
@endsection