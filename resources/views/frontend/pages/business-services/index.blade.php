@extends('frontend.layouts.app')

@section('content')
    <div class="relative min-h-screen md:h-screen bg-[#FAFAFA] font-sans flex flex-col md:overflow-hidden overflow-x-hidden overflow-y-auto"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Dynamic Background -->
        <div class="absolute inset-0 z-0 pointer-events-none fixed">
            <div
                class="absolute top-0 right-0 w-[50vw] h-[50vw] md:w-[30vh] md:h-[30vh] bg-[#a41c1c]/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[60vw] h-[60vw] md:w-[40vh] md:h-[40vh] bg-[#a41c1c]/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2">
            </div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03]">
            </div>
        </div>

        <!-- Navigation / Header -->
        <header
            class="relative z-50 px-6 py-4 md:px-12 md:py-8 flex justify-between items-center shrink-0 w-full md:h-[10vh]">
            <a href="{{ route('home') }}"
                class="group flex items-center gap-2 text-[#1C1C1C] font-bold hover:text-[#a41c1c] transition-all duration-300 font-cairo bg-white/80 backdrop-blur-md px-4 py-2 md:px-5 md:py-2 rounded-full shadow-sm border border-gray-100 hover:shadow-lg hover:border-[#a41c1c]/20">
                <span
                    class="material-symbols-outlined rtl:rotate-180 group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform text-lg md:text-xl">arrow_back</span>
                <span class="text-sm md:text-base">{{ __('frontend.nav.back_home') }}</span>
            </a>

            <!-- Logo -->
            <div class="opacity-90 hover:opacity-100 transition-opacity">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10 md:h-12 w-auto">
            </div>
        </header>

        <!-- Main Content -->
        <main
            class="flex-1 w-full max-w-[1920px] mx-auto px-4 md:px-8 relative z-10 flex flex-col md:h-[90vh] pb-8 md:pb-4 justify-start md:justify-center">

            <!-- Page Title -->
            <div class="text-center mb-8 md:mb-4 shrink-0 animate-fade-in-up pt-4 md:pt-0">
                <h1
                    class="text-3xl md:text-5xl font-black text-[#1C1C1C] mb-3 md:mb-2 font-cairo leading-none tracking-tight">
                    {{ __('business_services.index.title') }}
                </h1>
                <p
                    class="text-base md:text-xl text-gray-500 font-bold font-cairo max-w-lg md:max-w-4xl mx-auto leading-tight px-4">
                    {{ __('business_services.index.subtitle') }}
                </p>
            </div>

            <!-- Services Grid -->
            <!-- On mobile: use auto height and gap. On desktop: occupy remaining height. -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-4 pb-2 md:flex-1 md:min-h-0 w-full">
                @foreach (__('business_services.services') as $key => $service)
                    <a href="{{ route('business-services.show', $service['slug']) }}"
                        class="group relative bg-white p-6 md:p-5 rounded-2xl shadow-sm hover:shadow-xl border border-gray-200 hover:border-[#a41c1c]/40 transition-all duration-300 flex flex-col h-auto md:h-full animate-fade-in-up overflow-hidden"
                        style="animation-delay: {{ $loop->iteration * 50 }}ms">

                        <!-- Hover Gradient -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-[#a41c1c]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        <!-- Top Row: Icon & Arrow -->
                        <div class="flex justify-between items-center mb-4 md:mb-2 relative z-10">
                            <!-- Icon Container -->
                            <div
                                class="w-14 h-14 md:w-12 md:h-12 bg-[#FAFAFA] rounded-xl flex items-center justify-center group-hover:bg-[#a41c1c] transition-all duration-300 shadow-inner group-hover:shadow-[0_4px_12px_rgba(164,28,28,0.3)]">
                                <span
                                    class="material-symbols-outlined text-3xl md:text-2xl text-[#a41c1c] group-hover:text-white transition-colors duration-300">{{ $service['icon'] }}</span>
                            </div>

                            <!-- Read More Arrow -->
                            <span
                                class="flex items-center gap-1 text-[#a41c1c] opacity-100 md:opacity-0 group-hover:opacity-100 transition-all duration-300 transform md:translate-x-2 md:rtl:-translate-x-2 group-hover:translate-x-0 rtl:group-hover:translate-x-0">
                                <span
                                    class="text-xs font-bold font-cairo uppercase tracking-wider hidden md:inline">{{ __('business_services.common.read_more') }}</span>
                                <span
                                    class="material-symbols-outlined rtl:rotate-180 text-xl md:text-lg">arrow_right_alt</span>
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10 flex-1 flex flex-col justify-center">
                            <h3
                                class="text-xl md:text-2xl font-black text-[#1C1C1C] mb-3 md:mb-2 font-cairo group-hover:text-[#a41c1c] transition-colors duration-300 leading-tight">
                                {{ $service['title'] }}
                            </h3>

                            <p
                                class="text-gray-500 text-sm md:text-base font-semibold leading-relaxed font-cairo line-clamp-3 md:group-hover:text-gray-700 transition-colors">
                                {{ $service['description'] }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

        </main>
    </div>

    <style>
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

        .animate-fade-in-up {
            animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }
    </style>
@endsection
