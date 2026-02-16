@extends('frontend.layouts.app')

@section('content')
    <div class="relative min-h-screen bg-soft-white font-sans flex flex-col"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Background Elements -->
        <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center overflow-hidden fixed">
            <div class="opacity-[0.03] transform scale-150 grayscale animate-pulse-slow">
                <img src="{{ asset('img/logo.png') }}" alt="Background Logo" class="w-[80vw] h-auto object-contain">
            </div>
            <div class="absolute inset-0 bg-gradient-to-br from-white via-transparent to-white/90"></div>
        </div>

        <!-- Navigation / Header -->
        <header class="relative z-50 px-6 md:px-8 py-6 flex justify-between items-center shrink-0 animate-fade-in-down">
            <a href="{{ route('home') }}"
                class="group flex items-center gap-2 text-[#a41c1c] font-bold hover:text-[#8a1818] transition-colors font-cairo bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm border border-gray-100 hover:shadow-md">
                <span
                    class="material-symbols-outlined rtl:rotate-180 group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform">arrow_back</span>
                <span>{{ __('frontend.nav.back_home') }}</span>
            </a>

            <!-- Logo Badge -->
            <div class="hidden md:block">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10 w-auto opacity-100 transition-all">
            </div>
        </header>

        <!-- Main Content Grid -->
        <main
            class="flex-1 container mx-auto px-6 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center pb-12 pt-4 md:pt-0">

            <!-- Left Column: Title & Intro -->
            <div class="lg:col-span-5 flex flex-col justify-center space-y-8 animate-fade-in-left order-2 lg:order-1">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="h-px w-12 bg-[#a41c1c]"></span>
                        <span
                            class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">{{ __('frontend.services.desc') }}</span>
                    </div>
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-[#1C1C1C] mb-6 font-cairo leading-tight">
                        {{ __('legal_representation.title') }}
                    </h1>
                    <p class="text-lg md:text-xl text-gray-500 font-medium font-cairo leading-relaxed">
                        {{ __('legal_representation.subtitle') }}
                    </p>
                </div>

                <div class="bg-white/60 backdrop-blur-md p-6 border-l-4 border-[#a41c1c] rounded-r-lg shadow-sm">
                    <p class="text-[#606060] leading-loose font-cairo text-lg text-justify">
                        {{ __('legal_representation.description') }}
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6 pt-4">
                    <a href="{{ route('request', ['service' => 'legal_representation']) }}"
                        class="w-full sm:w-auto group relative px-8 py-4 bg-[#a41c1c] text-white font-bold font-cairo rounded overflow-hidden shadow-lg hover:shadow-[#a41c1c]/40 transition-all transform hover:-translate-y-1 text-center">
                        <span class="relative z-10 flex items-center justify-center gap-3">
                            {{ __('legal_representation.request_button') }}
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                        <div
                            class="absolute inset-0 bg-[#8a1818] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left rtl:origin-right">
                        </div>
                    </a>

                    <div class="flex items-center gap-2 text-[#606060] font-cairo text-sm">
                        <span class="material-symbols-outlined text-[#a41c1c]">schedule</span>
                        <span>{{ __('legal_representation.duration') }}</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Services & Details -->
            <div
                class="lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-6 items-start h-auto lg:h-full lg:max-h-[80vh] order-1 lg:order-2">

                <!-- Services Card -->
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 transform md:rotate-1 hover:rotate-0 transition-transform duration-500 animate-fade-in-up delay-100 flex flex-col justify-center relative overflow-hidden group min-h-[400px]">
                    <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                        <span class="material-symbols-outlined text-9xl text-[#a41c1c]">gavel</span>
                    </div>

                    <h3 class="text-2xl font-bold text-[#1C1C1C] mb-6 font-cairo flex items-center gap-3 relative z-10">
                        <div class="w-10 h-10 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                            <span class="material-symbols-outlined">list_alt</span>
                        </div>
                        {{ __('legal_representation.services_title') }}
                    </h3>

                    <ul class="space-y-4 relative z-10">
                        @foreach (__('legal_representation.services') as $service)
                            <li
                                class="flex items-center gap-4 p-3 rounded-lg hover:bg-gray-50 transition-colors cursor-default">
                                <span class="material-symbols-outlined text-[#a41c1c] text-xl shrink-0">check_circle</span>
                                <span class="text-[#1C1C1C] font-semibold font-cairo text-lg">{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Requirements Card -->
                <div class="flex flex-col gap-6 justify-center h-full">
                    <div
                        class="bg-[#1C1C1C] text-white p-8 rounded-2xl shadow-xl transform md:-rotate-1 hover:rotate-0 transition-transform duration-500 animate-fade-in-up delay-200 relative overflow-hidden group border border-gray-800 h-full flex flex-col justify-center">
                        <!-- Decorative Circle -->
                        <div
                            class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#a41c1c] rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity">
                        </div>

                        <h3 class="text-xl font-bold font-cairo mb-6 relative z-10 flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white">
                                <span class="material-symbols-outlined">assignment</span>
                            </div>
                            {{ __('legal_representation.requirements_title') }}
                        </h3>

                        <ul class="space-y-5 relative z-10">
                            @foreach (__('legal_representation.requirements') as $req)
                                <li class="flex items-start gap-4 group/item">
                                    <span
                                        class="material-symbols-outlined text-[#a41c1c] group-hover/item:text-white transition-colors mt-1">arrow_right</span>
                                    <span
                                        class="text-gray-300 group-hover/item:text-white transition-colors text-lg font-cairo font-light">{{ $req }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.8s ease-out forwards;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>
@endsection
