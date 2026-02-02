@extends('frontend.layouts.app')

@section('content')
    <div id="home" class="flex flex-col relative bg-soft-white font-sans"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Main Service Selection Hero -->
        <!-- Main Service Selection Hero -->
        <header
            class="relative min-h-screen flex flex-col items-center justify-center bg-white text-gray-900 py-10 overflow-hidden">

            <!-- Top Navigation Bar -->
            <nav class="absolute top-0 w-full px-8 py-6 flex justify-between items-center z-50">
                <div class="hidden md:block"></div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('index') }}"
                        class="flex items-center gap-2 px-5 py-2 rounded-full border border-gray-200 text-sm font-semibold text-[#911c24] hover:bg-[#911c24] hover:text-white transition-all duration-300 shadow-sm hover:shadow-md group">
                        <span
                            class="material-symbols-outlined text-lg group-hover:rotate-12 transition-transform duration-300">language</span>
                        <span class="hidden md:inline">Global</span>
                    </a>
                </div>
            </nav>

            <!-- Background Features -->
            <div class="absolute inset-0 z-0 pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-white z-10"></div>
                <!-- Subtle Pattern -->
                <div
                    class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] z-0 animate-pulse">
                </div>
                <!-- Decorative Blobs -->
                <style>
                    @keyframes blob {
                        0% {
                            transform: translate(0px, 0px) scale(1);
                        }

                        33% {
                            transform: translate(30px, -50px) scale(1.1);
                        }

                        66% {
                            transform: translate(-20px, 20px) scale(0.9);
                        }

                        100% {
                            transform: translate(0px, 0px) scale(1);
                        }
                    }

                    .animate-blob {
                        animation: blob 7s infinite;
                    }

                    .animation-delay-2000 {
                        animation-delay: 2s;
                    }

                    /* Fade In Animations */
                    @keyframes fadeInUp {
                        from {
                            opacity: 0;
                            transform: translateY(30px);
                        }

                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    @keyframes fadeInDown {
                        from {
                            opacity: 0;
                            transform: translateY(-30px);
                        }

                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }

                    @keyframes text-shimmer {
                        0% {
                            background-position: 0% 50%;
                        }

                        100% {
                            background-position: 200% 50%;
                        }
                    }

                    .animate-fade-in-down {
                        animation: fadeInDown 1s ease-out;
                    }

                    .animate-fade-in-up {
                        animation: fadeInUp 1s ease-out;
                    }

                    /* Global Scroll Animations */
                    .reveal {
                        opacity: 0 !important;
                        transform: translateY(30px);
                        transition: all 0.8s ease-out;
                    }

                    .reveal.active {
                        opacity: 1 !important;
                        transform: translateY(0);
                    }
                </style>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const reveals = document.querySelectorAll('.reveal');

                        const revealOnScroll = () => {
                            const windowHeight = window.innerHeight;
                            const elementVisible = 100;

                            reveals.forEach((reveal) => {
                                const elementTop = reveal.getBoundingClientRect().top;
                                if (elementTop < windowHeight - elementVisible) {
                                    reveal.classList.add('active');
                                }
                            });
                        };

                        window.addEventListener('scroll', revealOnScroll);
                        // Trigger once on load
                        revealOnScroll();
                    });
                </script>
                <div
                    class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-red-50 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
                </div>
                <div
                    class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-gray-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
                </div>
            </div>

            <div class="container mx-auto px-6 relative z-20 w-full flex flex-col items-center justify-center h-full">

                <!-- Branding Header -->
                <div class="text-center mb-8 animate-fade-in-down reveal">
                    <!-- CSS Logo -->
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap');

                        /* Typewriter Animation */
                        @keyframes typing-erase {

                            0%,
                            20% {
                                max-width: 3.8ch;
                            }

                            50% {
                                max-width: 0ch;
                            }

                            60% {
                                max-width: 3.8ch;
                            }

                            100% {
                                max-width: 3.8ch;
                            }
                        }

                        @keyframes blink-caret {
                            50% {
                                border-color: transparent;
                            }
                        }

                        .typewriter-text {
                            display: inline-block;
                            overflow: hidden;
                            white-space: nowrap;
                            border-right: 5px solid #911c24;
                            max-width: 3.8ch;
                            padding-left: 0.1ch;
                            vertical-align: bottom;
                            animation: typing-erase 6s cubic-bezier(0.4, 0, 0.2, 1) infinite, blink-caret .75s step-end infinite alternate;
                        }
                    </style>
                    <div class="inline-block text-left border-l-[6px] border-[#911c24] pl-6 py-2 mb-6">
                        <h1 class="text-[80px] font-black text-[#911c24] leading-[0.75] tracking-tighter"
                            style="font-family: 'Montserrat', sans-serif;">
                            <span class="typewriter-text">ΛMN</span>
                        </h1>
                        <div
                            class="text-[11px] font-bold text-gray-800 uppercase tracking-[0.38em] mt-3 flex justify-between w-full">
                            GLOBAL LAW FIRM
                        </div>
                    </div>
                    {{-- <h1 class="text-3xl md:text-5xl font-bold font-cairo mb-2 leading-tight text-gray-900">
                        {{ __('frontend.hero.firm_name') }}
                    </h1> --}}
                    <p class="text-lg text-gray-600 font-bold font-light">{{ __('frontend.hero.subtitle') }}</p>
                    <!-- Compact Separator -->
                    <div class="w-16 h-1 bg-[#911c24] mx-auto mt-4 rounded-full"></div>
                </div>

                <!-- Service Grid (The Main Focus) -->
                <div class="max-w-7xl mx-auto w-full">
                    <h2
                        class="text-center text-xl font-bold mb-8 text-[#911c24] font-cairo uppercase tracking-widest opacity-80">
                        {{ __('frontend.services_list.title') }}
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @php
                            $services = [
                                ['icon' => 'gavel', 'key' => 'contracts', 'delay' => '0ms'],
                                ['icon' => 'query_stats', 'key' => 'consultation', 'delay' => '100ms'],
                                ['icon' => 'verified', 'key' => 'notary', 'delay' => '200ms'],
                                ['icon' => 'public', 'key' => 'international', 'delay' => '300ms'],
                                ['icon' => 'currency_exchange', 'key' => 'saudi_invest', 'delay' => '400ms'],
                                ['icon' => 'badge', 'key' => 'residency', 'delay' => '500ms'],
                                ['icon' => 'balance', 'key' => 'litigation', 'delay' => '600ms'],
                                ['icon' => 'bolt', 'key' => 'one_day', 'delay' => '700ms'],
                            ];
                        @endphp

                        @foreach ($services as $service)
                            <a href="{{ route('request') }}"
                                style="animation-delay: {{ $service['delay'] }}; animation-fill-mode: backwards;"
                                class="animate-fade-in-up group relative bg-white border border-gray-100 rounded-2xl p-6 hover:border-[#911c24] hover:bg-[#911c24] transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl flex flex-col items-center text-center h-full justify-center shadow-lg hover:shadow-red-900/20">
                                <div
                                    class="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center mb-4 group-hover:bg-white/20 transition-all duration-300 shadow-inner">
                                    <span
                                        class="material-symbols-outlined text-3xl text-[#911c24] group-hover:text-white transition-colors duration-300">{{ $service['icon'] }}</span>
                                </div>
                                <h3
                                    class="font-bold text-gray-800 text-base group-hover:text-white leading-snug transition-colors duration-300">
                                    {{ __('frontend.services_list.items.' . $service['key']) }}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Scroll Indicator - Reduced bottom spacing -->
            <div class="absolute bottom-4 animate-bounce text-gray-500">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </div>
        </header>

        <!-- Golden Visa Section -->
        <section class="py-20 bg-white relative overflow-hidden reveal">
            <div class="container mx-auto px-6 relative z-10">

                <!-- Section Header -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-16 gap-10">
                    <div class="w-full md:w-1/2">
                        <div
                            class="inline-flex items-center gap-2 mb-4 bg-[#a41c1c]/5 px-4 py-2 rounded-full border border-[#a41c1c]/10">
                            <span class="material-symbols-outlined text-[#a41c1c] text-sm">workspace_premium</span>
                            <span
                                class="text-[#a41c1c] text-xs font-bold tracking-widest uppercase">{{ __('frontend.golden_visa.title') }}</span>
                        </div>
                        <h2 class="text-3xl md:text-5xl font-black font-cairo text-gray-900 mb-6 leading-tight">
                            {{ __('frontend.golden_visa.phases_title') }}
                        </h2>
                        <p
                            class="text-gray-600 text-lg leading-relaxed font-meduim border-l-4 border-[#a41c1c] pl-6 rtl:pl-0 rtl:border-l-0 rtl:border-r-4 rtl:pr-6">
                            {{ __('frontend.golden_visa.intro') }}
                        </p>
                    </div>

                    <!-- Benefits Card -->
                    <div
                        class="w-full md:w-1/3 bg-gray-50 rounded-2xl p-8 border border-gray-100 shadow-lg relative overflow-hidden group hover:shadow-xl transition-shadow duration-300">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-[#a41c1c]/5 rounded-bl-[100px] -mr-10 -mt-10"></div>
                        <h3 class="text-xl font-bold text-[#a41c1c] mb-6 font-cairo flex items-center gap-2">
                            <span class="material-symbols-outlined">star</span>
                            {{ __('frontend.golden_visa.benefits_title') }}
                        </h3>
                        <ul class="space-y-4">
                            @foreach (__('frontend.golden_visa.benefits') as $benefit)
                                <li class="flex items-start gap-3">
                                    <span
                                        class="material-symbols-outlined text-green-600 text-xl shrink-0 mt-0.5">check_circle</span>
                                    <span class="text-gray-700 font-medium">{{ $benefit }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Steps Grid -->
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    @foreach (__('frontend.golden_visa.steps') as $index => $step)
                        <div class="group relative bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full"
                            style="animation: fadeInUp 0.5s ease-out backwards; animation-delay: {{ $index * 150 }}ms;">
                            <h3
                                class="text-4xl font-black text-[#a41c1c] absolute top-2 left-4 rtl:left-auto rtl:right-4 group-hover:text-[#a41c1c]/80 transition-colors duration-300 font-cairo z-0 select-none">
                                0{{ $index + 1 }}
                            </h3>
                            <div class="relative z-10 pt-4">
                                <h4
                                    class="text-sm font-bold text-gray-900 mb-2 font-cairo group-hover:text-[#a41c1c] transition-colors duration-300 min-h-[40px] flex items-center">
                                    {{ $step['title'] }}
                                </h4>
                                <p class="text-gray-500 leading-relaxed text-[11px]">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section id="about"
            class="relative min-h-[70vh] flex flex-col md:flex-row items-center bg-white overflow-hidden py-10 md:py-20 reveal">
            <!-- Left Image Section with Diagonal Clip -->
            <div
                class="relative w-full md:absolute md:top-0 md:left-0 md:w-[55%] h-64 md:h-full z-0 order-1 md:order-none overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('{{ asset('img/riyadh_skyline.png') }}');">
                </div>
                <div class="absolute inset-0 bg-royal-blue/10 mix-blend-multiply"></div>
                <!-- Logo Overlay -->
                <div
                    class="absolute bottom-6 md:bottom-10 left-6 md:left-10 z-20 bg-white/90 p-3 md:p-4 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100">
                    <img src="{{ asset('img/logo.png') }}" class="h-8 md:h-12 w-auto" alt="AMN Global Law Firm">
                </div>
                <!-- Diagonal Overlay -->
                <div
                    class="absolute top-0 right-0 w-32 h-full bg-white transform skew-x-[-6deg] origin-top translate-x-16 hidden md:block">
                </div>
                <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-white to-transparent md:hidden">
                </div>
            </div>

            <!-- Right Text Section -->
            <div class="container mx-auto px-6 relative z-10 pointers-events-none order-2 md:order-none mt-6 md:mt-0">
                <div
                    class="w-full md:w-1/2 ml-auto pl-0 md:pl-12 pt-0 bg-white md:bg-transparent p-6 md:p-12 rounded-3xl md:rounded-none shadow-lg md:shadow-none relative mx-auto md:mx-0">
                    <div class="pointer-events-auto">
                        <div class="flex items-center justify-end gap-3 mb-6">
                            <span class="h-px w-10 bg-[#a41c1c]"></span>
                            <span
                                class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm">{{ __('frontend.about.title') }}</span>
                        </div>

                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 font-cairo text-right leading-relaxed">
                            {{ __('frontend.vision_mission.vision') }}
                        </h2>

                        <div class="space-y-4 text-gray-700 text-right leading-loose font-medium text-lg font-cairo"
                            dir="rtl">
                            <p>
                                {{ __('frontend.about.overview') }}
                            </p>
                            <p>
                                {{ __('frontend.about.commitment') }}
                            </p>
                        </div>

                        <!-- Learn More Button -->
                        <div class="mt-10 flex justify-end">
                            <a href="#vision"
                                class="inline-flex items-center gap-2 text-[#a41c1c] font-bold hover:gap-4 transition-all">
                                <span>{{ __('frontend.buttons.about.title') }}</span>
                                <span class="material-symbols-outlined rtl:rotate-180">arrow_right_alt</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compact Animated Features Section -->
        <section class="py-20 bg-gray-50 relative overflow-hidden flex items-center min-h-[90vh] reveal">
            <!-- Background Elements -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
            </div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#a41c1c]/5 rounded-full blur-[100px] pointer-events-none">
            </div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-900/5 rounded-full blur-[100px] pointer-events-none">
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <!-- Header -->
                <div class="text-center mb-10" style="animation: fadeInDown 0.8s ease-out;">
                    <h2
                        class="text-3xl md:text-5xl font-black font-cairo text-transparent bg-clip-text bg-gradient-to-r from-[#a41c1c] via-[#1C1C1C] to-[#a41c1c] bg-[length:200%_auto] animate-text-shimmer mb-4 py-2 leading-normal">
                        {{ __('frontend.why_partner.title') }}</h2>
                    <p class="text-gray-600 text-base max-w-2xl mx-auto">{{ __('frontend.why_partner.subtitle') }}</p>
                </div>

                <!-- Focus Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 group/grid perspective-1000">
                    <!-- One Day Service (Special Feature) -->
                    <div class="bg-gradient-to-br from-[#a41c1c] to-[#7a1515] p-6 rounded-2xl text-white transform transition-all duration-500 hover:scale-[1.03] hover:shadow-2xl hover:z-20 group/card cursor-default opacity-0 animate-fill-forwards"
                        style="animation: fadeInUp 0.5s ease-out forwards;">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <span class="material-symbols-outlined text-xl">timer</span>
                            </div>
                            <h3 class="font-bold font-cairo text-lg">{{ __('frontend.one_day_service.title') }}</h3>
                        </div>
                        <p class="text-white/80 text-xs mb-3 leading-relaxed">{{ __('frontend.one_day_service.desc') }}
                        </p>
                        <ul class="space-y-1.5">
                            @foreach (range(0, 2) as $i)
                                <li class="flex items-center gap-2 text-[10px] md:text-xs font-medium text-white/90">
                                    <span class="material-symbols-outlined text-xs">check</span>
                                    {{ __('frontend.one_day_service.items.' . $i) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Why Us Cards -->
                    @foreach (['team', 'knowledge', 'custom', 'proactive', 'integrity'] as $idx => $key)
                        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:border-[#a41c1c]/50 transition-all duration-500 hover:bg-white hover:scale-[1.03] hover:shadow-xl hover:z-20 group/card group-hover/grid:blur-[2px] group-hover/grid:hover:blur-0 opacity-0"
                            style="animation: fadeInUp 0.5s ease-out forwards; animation-delay: {{ ($idx + 1) * 100 }}ms;">
                            <div
                                class="w-8 h-8 rounded-lg bg-[#a41c1c]/5 flex items-center justify-center mb-3 group-hover/card:bg-[#a41c1c] transition-colors duration-300">
                                <span
                                    class="font-bold font-cairo text-sm text-[#a41c1c] group-hover/card:text-white transition-colors">0{{ $loop->iteration }}</span>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 mb-2 font-cairo cursor-default">
                                {{ __('frontend.why_partner.cards.' . $key . '.title') }}</h3>
                            <p class="text-gray-600 text-xs leading-relaxed cursor-default">
                                {{ __('frontend.why_partner.cards.' . $key . '.desc') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Contact Us Section -->
        <section id="contact"
            class="relative min-h-[80vh] flex flex-col md:flex-row items-center bg-white overflow-hidden py-10 md:py-20 reveal">
            <!-- Left Image Section with Diagonal Clip -->
            <div
                class="relative w-full md:absolute md:top-0 md:left-0 md:w-[55%] h-64 md:h-full z-0 order-1 md:order-none overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105"
                    style="background-image: url('{{ asset('img/contact_bg.png') }}');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#1C1C1C] via-[#a41c1c]/20 to-transparent opacity-90">
                </div>

                <!-- Contact Info Overlay -->
                <div class="absolute bottom-0 left-0 w-full p-6 md:p-10 text-white z-20" dir="rtl">
                    <div class="max-w-md ml-auto md:ml-0 md:mr-auto text-right">
                        <h3 class="text-2xl md:text-3xl font-bold font-cairo mb-8 text-white drop-shadow-md">معلومات
                            الاتصال</h3>
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4 group/item">
                                <div
                                    class="p-3 bg-white/10 rounded-lg backdrop-blur-sm group-hover/item:bg-[#a41c1c] transition-all duration-300 shadow-lg order-last md:order-first">
                                    <span class="material-symbols-outlined text-white">location_on</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-200 mb-1 font-cairo">العنوان</h4>
                                    <p class="font-cairo text-lg font-medium">الرياض - المملكة العربية السعودية</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 group/item">
                                <div
                                    class="p-3 bg-white/10 rounded-lg backdrop-blur-sm group-hover/item:bg-[#a41c1c] transition-all duration-300 shadow-lg order-last md:order-first">
                                    <span class="material-symbols-outlined text-white">mail</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-200 mb-1 font-cairo">البريد الإلكتروني</h4>
                                    <a href="mailto:info@amn-law.sa"
                                        class="font-cairo text-lg font-medium hover:text-[#a41c1c] hover:bg-white/90 px-2 rounded transition-colors -mr-2">info@amn-law.sa</a>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 group/item">
                                <div
                                    class="p-3 bg-white/10 rounded-lg backdrop-blur-sm group-hover/item:bg-[#a41c1c] transition-all duration-300 shadow-lg order-last md:order-first">
                                    <span class="material-symbols-outlined text-white">call</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-200 mb-1 font-cairo">الهاتف</h4>
                                    <a href="tel:+966555200816" dir="ltr"
                                        class="font-cairo text-lg font-medium hover:text-[#a41c1c] hover:bg-white/90 px-2 rounded transition-colors -mr-2 text-right block">+966
                                        55 520 0816</a>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 group/item">
                                <div
                                    class="p-3 bg-white/10 rounded-lg backdrop-blur-sm group-hover/item:bg-[#a41c1c] transition-all duration-300 shadow-lg order-last md:order-first">
                                    <span class="material-symbols-outlined text-white">language</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-200 mb-1 font-cairo">الموقع الإلكتروني</h4>
                                    <a href="https://www.amn-law.sa" target="_blank"
                                        class="font-cairo text-lg font-medium hover:text-[#a41c1c] hover:bg-white/90 px-2 rounded transition-colors -mr-2">www.amn-law.sa</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Diagonal Overlay -->
                <!-- Adjusted for Image on Left: Overlay on Right -->
                <div
                    class="absolute top-0 right-0 w-64 h-full bg-white transform skew-x-[-6deg] origin-top translate-x-32 hidden md:block z-10">
                </div>
                <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-white to-transparent md:hidden">
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="container mx-auto px-6 relative z-10 pointer-events-none order-2 md:order-none mt-8 md:mt-0">
                <div
                    class="w-full md:w-1/2 ml-auto pl-0 md:pl-12 pt-0 bg-white md:bg-transparent p-6 md:p-12 rounded-3xl md:rounded-none shadow-lg md:shadow-none relative mx-auto md:mx-0">
                    <div class="pointer-events-auto">
                        <!-- Header -->
                        <div class="flex items-center justify-start gap-3 mb-6">
                            <span class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm">تواصل معنا</span>
                            <span class="h-px w-10 bg-[#a41c1c]"></span>
                        </div>

                        <h2 class="text-2xl md:text-4xl font-black font-cairo text-gray-900 mb-4 leading-tight">
                            نحن هنا للمساعدة
                        </h2>

                        <p class="text-gray-600 text-base mb-8 leading-relaxed">
                            تواصل معنا عبر النموذج وسنتواصل معك في أقرب وقت ممكن
                        </p>

                        <!-- Contact Form -->
                        <form id="contactForm" class="space-y-5">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <!-- Name -->
                                <div>
                                    <label for="contact_name"
                                        class="block text-sm font-bold text-gray-700 mb-2 font-cairo">
                                        الاسم <span class="text-[#a41c1c]">*</span>
                                    </label>
                                    <input type="text" id="contact_name" name="name" required
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#a41c1c]/20 focus:border-[#a41c1c] transition-all outline-none font-cairo"
                                        placeholder="الاسم الكامل">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="contact_email"
                                        class="block text-sm font-bold text-gray-700 mb-2 font-cairo">
                                        البريد الإلكتروني <span class="text-[#a41c1c]">*</span>
                                    </label>
                                    <input type="email" id="contact_email" name="email" required
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#a41c1c]/20 focus:border-[#a41c1c] transition-all outline-none font-cairo"
                                        placeholder="البريد الإلكتروني">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <!-- Phone -->
                                <div>
                                    <label for="contact_phone"
                                        class="block text-sm font-bold text-gray-700 mb-2 font-cairo">
                                        رقم الهاتف
                                    </label>
                                    <input type="tel" id="contact_phone" name="phone"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#a41c1c]/20 focus:border-[#a41c1c] transition-all outline-none font-cairo"
                                        placeholder="+966...">
                                </div>

                                <!-- Subject -->
                                <div>
                                    <label for="contact_subject"
                                        class="block text-sm font-bold text-gray-700 mb-2 font-cairo">
                                        الموضوع
                                    </label>
                                    <input type="text" id="contact_subject" name="subject"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#a41c1c]/20 focus:border-[#a41c1c] transition-all outline-none font-cairo"
                                        placeholder="عنوان الرسالة">
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="contact_message"
                                    class="block text-sm font-bold text-gray-700 mb-2 font-cairo">
                                    الرسالة <span class="text-[#a41c1c]">*</span>
                                </label>
                                <textarea id="contact_message" name="message" rows="4" required
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-[#a41c1c]/20 focus:border-[#a41c1c] transition-all outline-none resize-none font-cairo"
                                    placeholder="اكتب استفسارك هنا..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full md:w-auto px-8 py-4 bg-gradient-to-r from-[#a41c1c] to-[#8a1818] text-white font-bold rounded-xl hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 font-cairo group">
                                <span>إرسال الرسالة</span>
                                <span
                                    class="material-symbols-outlined group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1">send</span>
                            </button>

                            <!-- Success/Error Messages -->
                            <div id="contactFormMessage" class="hidden p-4 rounded-xl text-sm font-cairo"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <footer class="bg-[#101010] text-white pt-16 pb-8 border-t border-gray-800 reveal">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                    <!-- Info -->
                    <div class="text-center md:text-start">
                        <img src="{{ asset('img/logo.png') }}" alt="AMN Logo"
                            class="h-16 mb-6 opacity-90 hover:opacity-100 transition-all mx-auto md:mx-0">
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">
                            {{ __('frontend.vision_mission.mission') }}
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="text-center md:text-start">
                        <h4 class="text-lg font-bold mb-6 text-[#a41c1c]">{{ __('frontend.buttons.services.title') }}
                        </h4>
                        <ul class="space-y-3 text-sm text-gray-400">
                            <li><a href="#"
                                    class="hover:text-white transition-colors">{{ __('frontend.services_list.items.contracts') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-white transition-colors">{{ __('frontend.services_list.items.consultation') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-white transition-colors">{{ __('frontend.services_list.items.saudi_invest') }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="text-center md:text-start">
                        <h4 class="text-lg font-bold mb-6 text-[#a41c1c]">{{ __('frontend.buttons.request.title') }}
                        </h4>
                        <ul class="space-y-4 text-sm text-gray-400 flex flex-col items-center md:items-start">
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-[#a41c1c]">location_on</span>
                                <span>Riyadh - Saudi Arabia</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-[#a41c1c]">mail</span>
                                <span>info@amn-law.sa</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-[#a41c1c]">language</span>
                                <span>www.amn-law.sa</span>
                            </li>
                            <li class="mt-4">
                                <a href="{{ route('login') }}"
                                    class="px-6 py-2 border border-[#a41c1c] text-[#a41c1c] hover:bg-[#a41c1c] hover:text-white rounded transition-colors text-xs font-bold uppercase tracking-wider">
                                    {{ __('frontend.nav.login') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8 text-center text-xs text-gray-500">
                    &copy; {{ date('Y') }} {{ __('frontend.hero.firm_name') }}. All Rights Reserved.
                </div>
            </div>
        </footer>

    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnContent = submitBtn.innerHTML;
            const messageDiv = document.getElementById('contactFormMessage');

            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML =
                '<span class="material-symbols-outlined animate-spin">refresh</span> جاري الإرسال...';

            // Collect form data
            const formData = new FormData(form);

            fetch("{{ route('contact.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    messageDiv.classList.remove('hidden', 'bg-red-50', 'text-red-700', 'bg-green-50',
                        'text-green-700');

                    if (data.success) {
                        messageDiv.classList.add('bg-green-50', 'text-green-700');
                        messageDiv.innerHTML =
                            `<div class="flex items-center gap-2"><span class="material-symbols-outlined">check_circle</span> ${data.message}</div>`;
                        form.reset();
                    } else {
                        throw new Error(data.message || 'حدث خطأ ما أثناء الإرسال');
                    }
                })
                .catch(error => {
                    messageDiv.classList.remove('hidden', 'bg-green-50', 'text-green-700');
                    messageDiv.classList.add('bg-red-50', 'text-red-700');

                    // Handle validation errors
                    if (error.status === 422) {
                        // logic for validation errors could be added here if needed, 
                        // users mostly care about the general error or explicit messages
                        messageDiv.innerHTML =
                            `<div class="flex items-center gap-2"><span class="material-symbols-outlined">error</span> يرجى التأكد من صحة البيانات المدخلة</div>`;
                    } else {
                        messageDiv.innerHTML =
                            `<div class="flex items-center gap-2"><span class="material-symbols-outlined">error</span> ${error.message}</div>`;
                    }
                })
                .finally(() => {
                    messageDiv.classList.remove('hidden');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnContent;

                    // Hide message after 5 seconds
                    setTimeout(() => {
                        messageDiv.classList.add('hidden');
                    }, 5000);
                });
        });
    </script>
@endsection
