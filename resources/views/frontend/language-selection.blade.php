@extends('frontend.layouts.app')

@section('content')
    <div
        class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-black font-sans selection:bg-[#a41c1c] selection:text-white">

        <!-- Animated Background -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div
                class="absolute inset-0 bg-[url('{{ asset('img/hero-law.jpg') }}')] bg-cover bg-center opacity-30 animate-kenburns">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-black via-slate-900/80 to-black"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#a41c1c]/10 via-transparent to-transparent opacity-50">
            </div>
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
                        class="text-[11px] md:text-[14px] font-bold text-white uppercase tracking-[0.38em] mt-4 flex justify-between w-full ml-1">
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

                <p class="text-lg text-gray-400 font-light tracking-[0.3em] uppercase animate-fade-in-up opacity-0"
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
                        class="absolute inset-0 bg-gradient-to-br from-[#a41c1c]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-slate-900/40 backdrop-blur-md rounded-2xl p-8 border border-white/5 hover:border-[#a41c1c]/50 transition-all duration-500 transform group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-[#a41c1c]/20 flex flex-col items-center">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-lg">
                            🇸🇦</div>
                        <h2
                            class="text-3xl font-bold text-white mb-2 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            عربي</h2>
                        <span
                            class="text-xs text-gray-500 uppercase tracking-widest group-hover:text-white/60 transition-colors">Arabic</span>
                    </div>
                </a>

                <!-- English -->
                <a href="{{ route('home', ['lang' => 'en']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.0s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-slate-900/40 backdrop-blur-md rounded-2xl p-8 border border-white/5 hover:border-blue-500/50 transition-all duration-500 transform group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-blue-900/20 flex flex-col items-center">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-lg">
                            🇬🇧</div>
                        <h2
                            class="text-3xl font-bold text-white mb-2 font-cairo group-hover:text-blue-400 transition-colors">
                            English</h2>
                        <span
                            class="text-xs text-gray-500 uppercase tracking-widest group-hover:text-white/60 transition-colors">English</span>
                    </div>
                </a>

                <!-- French -->
                <a href="{{ route('home', ['lang' => 'fr']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.2s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-slate-900/40 backdrop-blur-md rounded-2xl p-8 border border-white/5 hover:border-purple-500/50 transition-all duration-500 transform group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-purple-900/20 flex flex-col items-center">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-lg">
                            🇫🇷</div>
                        <h2
                            class="text-3xl font-bold text-white mb-2 font-cairo group-hover:text-purple-400 transition-colors">
                            Français</h2>
                        <span
                            class="text-xs text-gray-500 uppercase tracking-widest group-hover:text-white/60 transition-colors">French</span>
                    </div>
                </a>

                <!-- Russian -->
                <a href="{{ route('home', ['lang' => 'ru']) }}" class="group relative block opacity-0 animate-fade-in-up"
                    style="animation-delay: 1.4s; animation-fill-mode: forwards;">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl blur-xl">
                    </div>
                    <div
                        class="relative h-full bg-slate-900/40 backdrop-blur-md rounded-2xl p-8 border border-white/5 hover:border-red-500/50 transition-all duration-500 transform group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-red-900/20 flex flex-col items-center">
                        <div
                            class="text-6xl mb-6 transform group-hover:scale-110 transition-transform duration-500 drop-shadow-lg">
                            🇷🇺</div>
                        <h2
                            class="text-3xl font-bold text-white mb-2 font-cairo group-hover:text-red-400 transition-colors">
                            Русский</h2>
                        <span
                            class="text-xs text-gray-500 uppercase tracking-widest group-hover:text-white/60 transition-colors">Russian</span>
                    </div>
                </a>

            </div>

            <!-- Footer Text -->
            <div class="absolute -bottom-6 text-gray-600 text-[10px] uppercase tracking-[0.3em] animate-fade-in opacity-0"
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

        @keyframes kenburns {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .animate-kenburns {
            animation: kenburns 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
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

        /* Glassmorphism Enhancements */
        .backdrop-blur-md {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
@endsection
