@extends('frontend.layouts.app')

@section('content')
    <div id="home" class="flex flex-col relative bg-white font-sans"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        @include('frontend.components.home.hero')

    </div>

    @include('frontend.components.home.scripts')

    @include('frontend.components.home.styles')
@endsection
