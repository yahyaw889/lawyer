@extends('frontend.layouts.app')

@section('content')
    <div class="relative h-screen w-full overflow-hidden bg-slate-900 font-cairo flex items-center justify-center selection:bg-gold-accent selection:text-white"
        dir="rtl">

        <!-- Cinematic Background -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1505664194779-8beaceb93744?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center animate-kenburns opacity-20">
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/95 to-royal-blue/80"></div>
            <!-- Grain Overlay -->
            <div
                class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 brightness-100 contrast-150 mix-blend-overlay">
            </div>
        </div>

        <!-- Main Glass Container -->
        <div
            class="relative z-10 w-full max-w-7xl mx-auto px-4 lg:px-6 h-[95vh] flex flex-col lg:flex-row gap-6 items-center lg:items-stretch">

            <!-- Left Panel: Info & Branding (Fixed) -->
            <div class="lg:w-1/3 flex flex-col justify-center h-full py-8 text-white space-y-8 animate-fade-in-left">
                <div>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-accent/10 border border-gold-accent/20 backdrop-blur-md mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-accent animate-pulse"></span>
                        <span class="text-gold-accent text-[10px] font-bold tracking-[0.2em] uppercase">Premium
                            Consultation</span>
                    </div>
                    <h1 class="text-3xl lg:text-5xl font-bold mb-4 drop-shadow-2xl leading-tight">
                        طلب استشارة<br><span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-gold-accent to-yellow-600">فورية</span>
                    </h1>
                    <p class="text-blue-100/70 text-sm font-light leading-relaxed max-w-sm">
                        تواصل مباشرة مع نخبة من المستشارين القانونيين للحصول على رأي قانوني دقيق وموثوق في سرية تامة.
                    </p>
                </div>

                <!-- Trust Points -->
                <div class="space-y-4">
                    <div
                        class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 backdrop-blur-sm group hover:bg-white/10 transition-colors">
                        <div
                            class="w-10 h-10 rounded-full bg-gold-accent/20 flex items-center justify-center text-gold-accent group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-xl">verified_user</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">سرية تامة</h4>
                            <p class="text-[10px] text-gray-400">بياناتك ومستنداتك مشفرة وآمنة</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/5 backdrop-blur-sm group hover:bg-white/10 transition-colors">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-xl">timelapse</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">سرعة الرد</h4>
                            <p class="text-[10px] text-gray-400">تواصل سريع خلال ساعات العمل</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Info -->
                <div
                    class="mt-auto pt-6 border-t border-white/5 flex items-center justify-between text-[10px] text-gray-500 uppercase tracking-widest">
                    <span>© {{ date('Y') }} Al Tamimi</span>
                    <span>Secure SSL 256-bit</span>
                </div>
            </div>

            <!-- Right Panel: Form (Scrollable Container) -->
            <div class="lg:w-2/3 h-full py-4 animate-fade-in-up flex flex-col">
                <div
                    class="bg-white/95 backdrop-blur-2xl rounded-3xl h-full shadow-2xl overflow-hidden flex flex-col border border-white/10">

                    <!-- Form Header -->
                    <div class="px-6 py-4 border-b border-gray-100 bg-white/50 flex items-center justify-between shrink-0">
                        <h3 class="text-royal-blue font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-gold-accent">edit_document</span>
                            تفاصيل الطلب
                        </h3>
                        <div class="text-xs font-bold text-royal-blue bg-blue-50 px-3 py-1 rounded-full">
                            الإجمالي: 575 ر.س
                        </div>
                    </div>

                    <!-- Scrollable Form Content -->
                    <div
                        class="flex-1 overflow-y-auto p-6 scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-transparent">
                        <form id="consultation-form" action="{{ route('consultation.submit') }}" method="POST"
                            class="space-y-6">
                            @csrf
                            <!-- Section 1: Personal Info -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2 md:col-span-1">
                                    <label class="block text-xs font-bold text-gray-500 mb-1">الاسم الكامل</label>
                                    <input type="text" name="name" required
                                        class="w-full bg-gray-50 border-gray-200 rounded-lg text-sm focus:border-royal-blue focus:ring-0 transition-colors"
                                        placeholder="الاسم ثلاثي">
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <label class="block text-xs font-bold text-gray-500 mb-1">رقم الجوال</label>
                                    <input type="tel" name="phone" required dir="ltr"
                                        class="w-full bg-gray-50 border-gray-200 rounded-lg text-sm focus:border-royal-blue focus:ring-0 transition-colors text-right"
                                        placeholder="+966 50...">
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-xs font-bold text-gray-500 mb-1">البريد الإلكتروني</label>
                                    <input type="email" name="email" required dir="ltr"
                                        class="w-full bg-gray-50 border-gray-200 rounded-lg text-sm focus:border-royal-blue focus:ring-0 transition-colors text-right"
                                        placeholder="example@mail.com">
                                </div>
                            </div>

                            <!-- Section 2: Consultation Type -->
                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-2">نوع الاستشارة</label>
                                <div class="grid grid-cols-3 gap-3">
                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="type" value="call" class="peer sr-only" checked>
                                        <div
                                            class="p-3 rounded-xl border border-gray-200 bg-white peer-checked:bg-royal-blue peer-checked:text-white peer-checked:border-royal-blue transition-all text-center h-full flex flex-col items-center justify-center gap-1 hover:border-royal-blue/50">
                                            <span class="material-symbols-outlined text-xl">call</span>
                                            <span class="text-[10px] font-bold">هاتفياً</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="type" value="video" class="peer sr-only">
                                        <div
                                            class="p-3 rounded-xl border border-gray-200 bg-white peer-checked:bg-royal-blue peer-checked:text-white peer-checked:border-royal-blue transition-all text-center h-full flex flex-col items-center justify-center gap-1 hover:border-royal-blue/50">
                                            <span class="material-symbols-outlined text-xl">video_camera_front</span>
                                            <span class="text-[10px] font-bold">مرئي (Zoom)</span>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="type" value="office" class="peer sr-only">
                                        <div
                                            class="p-3 rounded-xl border border-gray-200 bg-white peer-checked:bg-royal-blue peer-checked:text-white peer-checked:border-royal-blue transition-all text-center h-full flex flex-col items-center justify-center gap-1 hover:border-royal-blue/50">
                                            <span class="material-symbols-outlined text-xl">apartment</span>
                                            <span class="text-[10px] font-bold">مكتبي</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Section 3: Details -->
                            <div>
                                <label class="block text-xs font-bold text-gray-500 mb-1">موضوع الاستشارة</label>
                                <textarea name="topic" rows="3"
                                    class="w-full bg-gray-50 border-gray-200 rounded-lg text-sm focus:border-royal-blue focus:ring-0 transition-colors resize-none"
                                    placeholder="اشرح مشكلتك باختصار..."></textarea>
                            </div>

                        </form>
                    </div>

                    <!-- Footer Action (Fixed) -->
                    <div class="p-4 border-t border-gray-100 bg-gray-50 shrink-0">
                        <button type="submit" form="consultation-form"
                            class="w-full group relative flex items-center justify-center gap-3 bg-gold-accent hover:bg-yellow-600 text-white py-3 rounded-xl font-bold shadow-lg shadow-gold-accent/20 transition-all transform active:scale-95">
                            <span>الانتقال للدفع الآمن</span>
                            <span
                                class="material-symbols-outlined text-sm rtl:rotate-180 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <style>
        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        .text-gold-accent {
            color: #C5A059;
        }

        .bg-gold-accent {
            background-color: #C5A059;
        }

        .bg-royal-blue {
            background-color: #002349;
        }

        .text-royal-blue {
            color: #002349;
        }

        /* Custom Scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 4px;
        }

        .scrollbar-track-transparent::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thumb-gray-200::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 20px;
        }

        .scrollbar-thumb-gray-200::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
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

        @keyframes fade-in-left {
            0% {
                opacity: 0;
                transform: translateX(20px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-left {
            animation: fade-in-left 0.8s ease-out forwards;
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
            animation: fade-in-up 0.8s ease-out forwards 0.2s;
            opacity: 0;
        }
    </style>
@endsection
