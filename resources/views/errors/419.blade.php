<?php
    $title = '';
    $userAuth = Auth()->User();
?>
@extends('_Partials.index')
@section('content')
    <div class="row">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <div class="error-page">
                    <br><br><br><br>
                    <h2 class="headline text-warning"> 419</h2>
                    <div class="error-content">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> {{__('Oops! Page expired.')}}</h3><br> 
                        <p>
                            {{ __('Sorry, your session has expired. Please refresh and try again.') }} <br>
                           <a href="{{ route('login') }}">{{ __('Log in') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
