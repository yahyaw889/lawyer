@extends('frontend.layouts.app')

@section('content')
    <div class="relative my-5 flex flex-col items-center justify-center bg-white overflow-hidden font-cairo"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Background Logo Watermark -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-[0.03] pointer-events-none">
            <img src="{{ asset('img/logo.png') }}" alt="" class="h-[800px] w-auto grayscale">
        </div>

        <!-- Main Container -->
        <div class="container mx-auto px-6 relative z-10 h-full flex flex-col justify-center">

            {{-- Back Button --}}
            <div class="absolute top-0 w-full flex justify-start pt-4 animate-fade-in-down z-20">
                <a href="{{ route('services.index') }}"
                    class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-bold text-sm">
                    <span class="material-symbols-outlined rtl:rotate-180 text-base">arrow_back</span>
                    {{ __('frontend.nav.back_home') }}
                </a>
            </div>

            {{-- Header --}}
            <div class="text-center mb-10 animate-fade-in-down">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                    <span
                        class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">{{ __('frontend.services_page.cards.consultation.title') }}</span>
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-[#1C1C1C] mb-4">
                    {{ __('consultation_request.title') }}
                </h1>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto font-medium">
                    {{ __('consultation_request.subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto w-full items-center">

                {{-- Left Side: Details & Action --}}
                <div class="flex flex-col space-y-8 animate-fade-in-left">

                    <div class="bg-white border-l-4 border-[#a41c1c] pl-6 py-2 shadow-sm">
                        <p class="text-gray-600 text-lg leading-loose text-justify">
                            {{ __('consultation_request.description') }}
                        </p>
                    </div>

                    {{-- Duration Highlight --}}
                    <div class="flex items-center gap-4 bg-gray-50 p-6 rounded-lg border border-gray-100">
                        <div class="w-12 h-12 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                            <span class="material-symbols-outlined text-2xl">schedule</span>
                        </div>
                        <div>
                            <span
                                class="block text-xs uppercase tracking-wider text-gray-500 font-bold mb-1">{{ __('consultation_request.duration_label') ?? 'Duration' }}</span>
                            <span class="text-2xl font-bold text-[#1C1C1C]">{{ __('consultation_request.duration') }}</span>
                        </div>
                    </div>

                    {{-- Action Button --}}
                    <div class="pt-4">
                        <a href="{{ route('consultation.checkout') }}"
                            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-[#1C1C1C] text-white px-8 py-5 rounded-sm font-bold text-lg overflow-hidden transition-all hover:bg-[#a41c1c] hover:shadow-xl hover:-translate-y-1">
                            <span class="z-10">{{ __('consultation_request.request_button') }}</span>
                            <span
                                class="material-symbols-outlined z-10 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Right Side: Features List --}}
                <div class="bg-gray-50 p-10 rounded-sm border border-gray-100 shadow-lg animate-fade-in-up">
                    <h3 class="text-2xl font-bold text-[#1C1C1C] mb-8 flex items-center gap-3">
                        <span class="material-symbols-outlined text-[#a41c1c]">verified_user</span>
                        {{ __('consultation_request.services_title') }}
                    </h3>

                    <ul class="space-y-6">
                        @foreach (__('consultation_request.services') as $service)
                            <li class="flex items-start gap-4 group">
                                <div
                                    class="mt-1 w-6 h-6 rounded-full bg-[#a41c1c]/10 flex items-center justify-center text-[#a41c1c] shrink-0 group-hover:bg-[#a41c1c] group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm">check</span>
                                </div>
                                <span class="text-gray-700 font-medium text-lg font-bold">{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



        </div>
    </div>
@endsection
