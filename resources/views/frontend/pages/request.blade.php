@extends('frontend.layouts.app')

@section('content')
    @include('frontend.partials.request', ['selectedService' => $selectedService ?? null])
@endsection
