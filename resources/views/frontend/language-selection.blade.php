@extends('frontend.layouts.app')

@section('content')
    <div
        class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-white font-sans selection:bg-[#a41c1c] selection:text-white">

        <!-- Global Watermark Background (Same as Home) -->
        <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center overflow-hidden">
            <div class="opacity-[0.03] transform scale-150 grayscale">
                <img src="{{ asset('img/logo.png') }}" alt="Background Logo" class="w-[80vw] h-auto object-contain">
            </div>
            <!-- Formal Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white/80"></div>
        </div>

        <!-- content -->
        <div
            class="relative z-10 w-full max-w-7xl mx-auto px-6 text-center flex flex-col items-center justify-center h-full">

            <!-- Branding Area -->
            <div class="mb-16">
                <!-- CSS Logo -->
                <div class="inline-block text-left border-l-[6px] border-[#a41c1c] pl-6 py-2 mb-8 animate-fade-in-down">
                    <h1 class="text-[80px] md:text-[100px] font-black text-[#a41c1c] leading-[0.75] tracking-tighter"
                        style="font-family: 'Montserrat', sans-serif;">
                        <span class="typewriter-text">ΛMN</span>
                    </h1>
                    <div
                        class="text-[11px] md:text-[14px] font-bold text-[#1C1C1C] uppercase tracking-[0.38em] mt-4 flex justify-between w-full ml-1">
                        GLOBAL LAW FIRM
                    </div>
                </div>

                <div class="flex items-center justify-center gap-6 mb-4 animate-fade-in-up opacity-0"
                    style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                    <span class="h-[1px] w-12 bg-gradient-to-r from-transparent to-[#a41c1c]/50"></span>
                    <p
                        class="text-xl md:text-3xl text-transparent bg-clip-text bg-gradient-to-b from-[#ff4d4d] to-[#a41c1c] font-bold tracking-wider font-cairo drop-shadow-sm uppercase">
                        Integrity . Precision . Professionalism
                    </p>
                    <span class="h-[1px] w-12 bg-gradient-to-l from-transparent to-[#a41c1c]/50"></span>
                </div>

                <p class="text-lg text-[#606060] font-light tracking-[0.3em] uppercase animate-fade-in-up opacity-0"
                    style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                    Excellence in Legal Practice
                </p>
            </div>

            <!-- Language Selection Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-6xl mx-auto">

                <!-- Arabic -->
                <a href="{{ route('home', ['lang' => 'ar']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 0.8s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#a41c1c]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-white rounded-xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-[#a41c1c]/40 transition-all duration-300 transform group-hover:-translate-y-2 flex flex-col items-center group-hover:bg-[#FAFAFA]">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-sm group-hover:grayscale-0">
                            🇸🇦</div>
                        <h2
                            class="text-3xl font-bold text-[#1C1C1C] mb-2 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            عربي</h2>
                        <span
                            class="text-xs text-gray-400 uppercase tracking-widest group-hover:text-[#606060] transition-colors">Arabic</span>
                    </div>
                </a>

                <!-- English -->
                <a href="{{ route('home', ['lang' => 'en']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.0s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-white rounded-xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-blue-500/40 transition-all duration-300 transform group-hover:-translate-y-2 flex flex-col items-center group-hover:bg-[#FAFAFA]">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-sm group-hover:grayscale-0">
                            🇬🇧</div>
                        <h2
                            class="text-3xl font-bold text-[#1C1C1C] mb-2 font-cairo group-hover:text-blue-600 transition-colors">
                            English</h2>
                        <span
                            class="text-xs text-gray-400 uppercase tracking-widest group-hover:text-[#606060] transition-colors">English</span>
                    </div>
                </a>

                <!-- French -->
                <a href="{{ route('home', ['lang' => 'fr']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.2s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-white rounded-xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-purple-500/40 transition-all duration-300 transform group-hover:-translate-y-2 flex flex-col items-center group-hover:bg-[#FAFAFA]">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-sm group-hover:grayscale-0">
                            🇫🇷</div>
                        <h2
                            class="text-3xl font-bold text-[#1C1C1C] mb-2 font-cairo group-hover:text-purple-600 transition-colors">
                            Français</h2>
                        <span
                            class="text-xs text-gray-400 uppercase tracking-widest group-hover:text-[#606060] transition-colors">French</span>
                    </div>
                </a>

                <!-- Russian -->
                <a href="{{ route('home', ['lang' => 'ru']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.4s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-red-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-white rounded-xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-red-500/40 transition-all duration-300 transform group-hover:-translate-y-2 flex flex-col items-center group-hover:bg-[#FAFAFA]">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-sm group-hover:grayscale-0">
                            🇷🇺</div>
                        <h2
                            class="text-3xl font-bold text-[#1C1C1C] mb-2 font-cairo group-hover:text-red-600 transition-colors">
                            Русский</h2>
                        <span
                            class="text-xs text-gray-400 uppercase tracking-widest group-hover:text-[#606060] transition-colors">Russian</span>
                    </div>
                </a>

            </div>

            <!-- Footer Text -->
            <div class="absolute -bottom-6 text-[#606060] text-[10px] uppercase tracking-[0.3em] animate-fade-in opacity-0"
                style="animation-delay: 2s; animation-fill-mode: forwards;">
                &copy; {{ date('Y') }} AMN GLOBAL LAW FIRM
            </div>

        </div>
    </div>

    <!-- Custom Animations styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

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
            border-right: 5px solid #a41c1c;
            max-width: 3.8ch;
            padding-left: 0.1ch;
            vertical-align: bottom;
            animation: typing-erase 6s cubic-bezier(0.4, 0, 0.2, 1) infinite, blink-caret .75s step-end infinite alternate;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -30px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-fade-in-down {
            animation-name: fadeInDown;
            animation-duration: 1s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 30px, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .animate-fade-in-up {
            animation-name: fadeInUp;
            animation-duration: 0.8s;
            animation-timing-function: cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation-name: fadeIn;
            animation-duration: 1.5s;
        }
    </style>
@endsection
