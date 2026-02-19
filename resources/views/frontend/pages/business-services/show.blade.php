@extends('frontend.layouts.app')

@section('content')
    <div class="relative min-h-screen flex flex-col bg-white overflow-x-hidden font-cairo"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Background Logo Watermark -->
        <div
            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-[0.03] pointer-events-none z-0">
            <img src="{{ asset('img/logo.png') }}" alt="" class="h-[80vh] w-auto grayscale">
        </div>

        <!-- Back Button (Fixed/Absolute) -->
        <div class="absolute top-6 start-6 z-50 animate-fade-in-down">
            <a href="{{ route('business-services.index') }}"
                class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-bold text-sm bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full shadow-sm">
                <span class="material-symbols-outlined rtl:rotate-180 text-base">arrow_back</span>
                {{ __('business_services.common.back_to_services') }}
            </a>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:flex-row h-full relative z-10">

            {{-- LEFT COLUMN: Details (Scrollable on mobile, Fixed/Centered on Desktop) --}}
            <div
                class="w-full lg:w-[45%] lg:h-screen flex flex-col justify-center p-6 pt-24 lg:pt-0 lg:p-12 xl:p-16 animate-fade-in-left overflow-y-auto no-scrollbar">

                {{-- Header --}}
                <div class="mb-6 lg:mb-10">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="h-px w-8 bg-[#a41c1c]"></span>
                        <span
                            class="text-[#a41c1c] font-bold tracking-widest uppercase text-xs font-cairo shadow-gray-400">{{ __('business_services.index.title') }}</span>
                    </div>
                    <h1 class="text-2xl md:text-4xl lg:text-5xl font-black text-[#1C1C1C] mb-3 leading-tight">
                        {{ __('business_services.services.' . $serviceKey . '.title') }}
                    </h1>
                    <p class="text-base md:text-lg text-gray-500 font-medium">
                        {{ __('business_services.services.' . $serviceKey . '.subtitle') }}
                    </p>
                </div>

                {{-- Description & Duration --}}
                <div class="space-y-6">
                    <div class="bg-white border-s-4 border-[#a41c1c] ps-4 py-2 shadow-sm rounded-e-lg">
                        <p class="text-gray-600 text-base lg:text-lg leading-relaxed text-justify">
                            {{ __('business_services.services.' . $serviceKey . '.description') }}
                        </p>
                    </div>

                    {{-- Compact Duration Box --}}
                    <div
                        class="flex items-center gap-4 bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-[#a41c1c]/20 transition-colors group">
                        <div
                            class="w-12 h-12 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors shrink-0">
                            <span class="material-symbols-outlined text-2xl">schedule</span>
                        </div>
                        <div>
                            <span
                                class="block text-[10px] uppercase tracking-wider text-gray-500 font-bold mb-0.5">{{ __('business_services.services.' . $serviceKey . '.duration_title') }}</span>
                            <span
                                class="text-lg font-bold text-[#1C1C1C]">{{ __('business_services.services.' . $serviceKey . '.duration') }}</span>
                        </div>
                    </div>

                    {{-- Action Button --}}
                    <a href="{{ route('request', ['service' => 'business_services']) }}"
                        class="group relative w-full flex items-center justify-center gap-3 bg-[#a41c1c] text-white px-6 py-4 rounded-xl font-bold text-lg overflow-hidden transition-all hover:bg-[#8a1818] hover:shadow-lg hover:shadow-[#a41c1c]/30 hover:-translate-y-0.5">
                        <span class="z-10">{{ __('business_services.request_button') }}</span>
                        <span
                            class="material-symbols-outlined z-10 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                        <div
                            class="absolute inset-0 -translate-x-full group-hover:animate-[shine_1.5s_infinite] bg-gradient-to-r from-transparent via-white/20 to-transparent z-0">
                        </div>
                    </a>
                </div>
            </div>

            {{-- RIGHT COLUMN: Scope & Requirements (Scrollable on Desktop) --}}
            <div
                class="w-full lg:w-[55%] lg:h-screen bg-gray-50/80 backdrop-blur-sm lg:overscroll-y-auto lg:overflow-y-auto p-6 lg:p-12 xl:p-16 flex flex-col gap-6 lg:gap-8 border-s border-gray-100">

                {{-- Requirements Card --}}
                <div
                    class="bg-[#1C1C1C] text-white p-6 md:p-8 rounded-2xl shadow-lg relative overflow-hidden group shrink-0">
                    <div
                        class="absolute -bottom-10 -left-10 w-32 h-32 bg-[#a41c1c] rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity">
                    </div>

                    <div class="flex items-center gap-3 mb-4 relative z-10">
                        <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-sm">assignment</span>
                        </div>
                        <h3 class="text-lg font-bold font-cairo">
                            {{ __('business_services.services.' . $serviceKey . '.requirements_title') }}
                        </h3>
                    </div>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-3 relative z-10">
                        @foreach (__('business_services.services.' . $serviceKey . '.requirements') as $req)
                            <li class="flex items-start gap-2 text-gray-300 group/item text-sm">
                                <span
                                    class="material-symbols-outlined text-[#a41c1c] text-base mt-0.5 group-hover/item:text-white transition-colors">check_circle</span>
                                <span
                                    class="font-medium group-hover/item:text-white transition-colors leading-snug">{{ $req }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Scope List --}}
                <div class="animate-fade-in-up">
                    <h3 class="text-xl font-bold text-[#1C1C1C] mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                            <span
                                class="material-symbols-outlined">{{ __('business_services.services.' . $serviceKey . '.icon') }}</span>
                        </div>
                        {{ __('business_services.services.' . $serviceKey . '.scope_title') }}
                    </h3>

                    {{-- Scope List (or Phases) --}}
                    @if (Lang::has('business_services.services.' . $serviceKey . '.phases'))
                        <div class="space-y-6">
                            @foreach (__('business_services.services.' . $serviceKey . '.phases') as $phase)
                                <div>
                                    <h4 class="text-lg font-bold text-[#a41c1c] mb-3 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-base">layers</span>
                                        {{ $phase['title'] }}
                                    </h4>
                                    <ul class="grid grid-cols-1 gap-2">
                                        @foreach ($phase['items'] as $item)
                                            <li
                                                class="flex items-start gap-3 bg-white p-3 rounded-lg border border-gray-100 shadow-sm hover:border-[#a41c1c]/30 transition-all group/list">
                                                <div
                                                    class="mt-1 w-4 h-4 rounded-full bg-[#a41c1c]/10 flex items-center justify-center text-[#a41c1c] shrink-0 group-hover/list:bg-[#a41c1c] group-hover/list:text-white transition-colors">
                                                    <span class="material-symbols-outlined text-[10px]">check</span>
                                                </div>
                                                <span
                                                    class="text-gray-700 font-medium text-sm leading-relaxed">{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <ul class="grid grid-cols-1 gap-3">
                            @foreach (__('business_services.services.' . $serviceKey . '.scope') as $item)
                                <li
                                    class="flex items-start gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:border-[#a41c1c]/30 hover:shadow-md transition-all group/list">
                                    <div
                                        class="mt-1 w-5 h-5 rounded-full bg-[#a41c1c]/10 flex items-center justify-center text-[#a41c1c] shrink-0 group-hover/list:bg-[#a41c1c] group-hover/list:text-white transition-colors">
                                        <span class="material-symbols-outlined text-[10px]">check</span>
                                    </div>
                                    <span
                                        class="text-gray-700 font-bold text-sm lg:text-base leading-relaxed">{{ $item }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- What We Offer List (Optional) --}}
                @if (Lang::has('business_services.services.' . $serviceKey . '.what_we_offer'))
                    <div class="animate-fade-in-up delay-100">
                        <h3 class="text-xl font-bold text-[#1C1C1C] mb-6 flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                                <span class="material-symbols-outlined">handshake</span>
                            </div>
                            {{ __('business_services.services.' . $serviceKey . '.what_we_offer_title') }}
                        </h3>

                        <ul class="grid grid-cols-1 gap-3">
                            @foreach (__('business_services.services.' . $serviceKey . '.what_we_offer') as $offer)
                                <li
                                    class="flex items-start gap-3 bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:border-[#a41c1c]/30 hover:shadow-md transition-all group/list">
                                    <div
                                        class="mt-1 w-5 h-5 rounded-full bg-[#a41c1c]/10 flex items-center justify-center text-[#a41c1c] shrink-0 group-hover/list:bg-[#a41c1c] group-hover/list:text-white transition-colors">
                                        <span class="material-symbols-outlined text-[10px]">star</span>
                                    </div>
                                    <span
                                        class="text-gray-700 font-bold text-sm lg:text-base leading-relaxed">{{ $offer }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

    </div>
    </div>

    <style>
        /* Hide Scrollbar but keep functionality */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
