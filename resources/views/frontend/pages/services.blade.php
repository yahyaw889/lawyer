@extends('frontend.layouts.app')

@section('content')
    <div class="relative h-screen w-full overflow-hidden bg-slate-900 font-cairo flex items-center justify-center selection:bg-gold-accent selection:text-white"
        dir="rtl">

        <!-- Cinematic Background -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center animate-kenburns opacity-30">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-royal-blue/90 via-slate-900/80 to-slate-900/95"></div>
            <!-- Animated Particles/Overlay -->
            <div
                class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150 mix-blend-overlay">
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 lg:px-8 h-full flex flex-col justify-center">

            <!-- Header Section -->
            <div class="text-center mb-8 lg:mb-12 animate-fade-in-down">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-4 shadow-lg shadow-gold-accent/5">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold-accent animate-pulse"></span>
                    <span class="text-gold-accent/90 text-xs font-bold tracking-[0.2em] uppercase">Premium Services</span>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-2 drop-shadow-2xl tracking-wide">
                    تأسيس الشركات ووكالات الاستثمار
                </h1>
                <p class="text-blue-100/80 text-sm lg:text-base max-w-2xl mx-auto font-light leading-relaxed">
                    نرافقك في كل خطوة لتأسيس كيانك التجاري بثقة، من التخطيط القانوني إلى الانطلاق الفعلي.
                </p>
            </div>

            <!-- Features Grid (Glassmorphism) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 w-full">

                <!-- Card 1 -->
                <div
                    class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-accent/10">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10 text-center">
                        <div
                            class="w-14 h-14 mx-auto bg-gradient-to-br from-blue-500 to-royal-blue rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 text-white">
                            <span class="material-symbols-outlined text-3xl">description</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-gold-accent transition-colors">عقود
                            التأسيس</h3>
                        <p class="text-gray-300 text-xs leading-relaxed font-light">
                            صياغة محكمة لعقود التأسيس تضمن حقوق الشركاء وتتوافق مع أحدث الأنظمة التجارية.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-accent/10">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-gold-accent/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10 text-center">
                        <div
                            class="w-14 h-14 mx-auto bg-gradient-to-br from-gold-accent to-yellow-600 rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 text-white">
                            <span class="material-symbols-outlined text-3xl">public</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-gold-accent transition-colors">
                            الاستثمار الأجنبي</h3>
                        <p class="text-gray-300 text-xs leading-relaxed font-light">
                            تسهيل إصدار تراخيص الاستثمار وحل كافة العقبات الإجرائية للمستثمرين الدوليين.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-gold-accent/10">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>

                    <div class="relative z-10 text-center">
                        <div
                            class="w-14 h-14 mx-auto bg-gradient-to-br from-blue-500 to-royal-blue rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500 text-white">
                            <span class="material-symbols-outlined text-3xl">gavel</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-gold-accent transition-colors">
                            الامتثال القانوني</h3>
                        <p class="text-gray-300 text-xs leading-relaxed font-light">
                            تسجيل كامل في الجهات الحكومية والضريبية لضمان عمل مؤسستك دون أي مخاطر قانونية.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Footer / CTA -->
            <div class="text-center animate-fade-in-up">
                <a href="{{ route('request') }}"
                    class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gold-accent text-white rounded-full overflow-hidden shadow-2xl hover:shadow-gold-accent/50 transition-all duration-300 hover:scale-105 active:scale-95">
                    <div
                        class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    </div>
                    <span class="relative font-bold text-sm tracking-wide">ابدأ طلب الخدمة الآن</span>
                    <span
                        class="relative material-symbols-outlined text-lg rtl:rotate-180 group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1">arrow_right_alt</span>
                </a>
                <p class="mt-4 text-[10px] text-gray-500 uppercase tracking-widest opacity-60">Professional • Trusted •
                    Secure</p>
            </div>

        </div>
    </div>

    <style>
        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        .bg-royal-blue {
            background-color: #002349;
        }

        .text-gold-accent {
            color: #C5A059;
        }

        .bg-gold-accent {
            background-color: #C5A059;
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

        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards 0.3s;
            opacity: 0;
        }
    </style>
@endsection
