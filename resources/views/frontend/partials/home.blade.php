@extends('frontend.layouts.app')

@section('content')
    <div id="home" class="flex flex-col relative bg-white font-sans"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Hero Section -->
        <header
            class="relative min-h-screen flex flex-col items-center justify-center bg-white overflow-hidden text-[#1C1C1C]">

            <!-- Global Watermark Background -->
            <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center overflow-hidden">
                <div class="opacity-[0.03] transform scale-150 grayscale">
                    <img src="{{ asset('img/logo.png') }}" alt="Background Logo" class="w-[80vw] h-auto object-contain">
                </div>
                <!-- Formal Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white/80"></div>
            </div>

            <!-- Top Navigation Bar -->
            <nav class="absolute top-0 w-full px-8 py-4 flex justify-between items-center z-50">
                <div class="hidden md:block"></div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('index') }}"
                        class="flex items-center gap-2 px-5 py-1.5 rounded-sm border border-[#a41c1c] text-xs font-semibold text-[#a41c1c] hover:bg-[#a41c1c] hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        <span class="material-symbols-outlined text-base">language</span>
                        <span class="hidden md:inline">Global</span>
                    </a>
                </div>
            </nav>

            <div class="container mx-auto px-6 relative z-10 w-full flex flex-col items-center justify-center h-full pt-16">

                <!-- Branding Header -->
                <div class="text-center mb-8 animate-fade-in-up">
                    <div class="inline-block relative mb-4">
                        <h1
                            class="text-5xl md:text-7xl font-black text-[#a41c1c] leading-none tracking-tight font-montserrat">
                            AMN
                        </h1>
                        <div class="h-0.5 w-full bg-[#1C1C1C] mt-1 mb-1"></div>
                        <div
                            class="text-xs md:text-sm font-bold text-[#1C1C1C] uppercase tracking-[0.4em] flex justify-between w-full font-cairo">
                            GLOBAL LAW FIRM
                        </div>
                    </div>

                    <p
                        class="text-lg md:text-xl text-[#606060] font-medium font-cairo max-w-2xl mx-auto leading-relaxed mt-2">
                        {{ __('frontend.hero.subtitle') }}
                    </p>
                </div>

                <!-- Service Grid -->
                <div class="max-w-6xl mx-auto w-full">
                    <h2
                        class="text-center text-xs font-bold mb-6 text-[#a41c1c] font-cairo uppercase tracking-widest relative">
                        <span class="bg-white px-4 relative z-10">{{ __('frontend.services_list.title') }}</span>
                        <div class="absolute top-1/2 left-0 w-full h-px bg-gray-200 -z-0"></div>
                    </h2>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @php
                            $services = [
                                ['icon' => 'gavel', 'key' => 'contracts'],
                                ['icon' => 'query_stats', 'key' => 'consultation'],
                                ['icon' => 'verified', 'key' => 'notary'],
                                ['icon' => 'public', 'key' => 'international'],
                                ['icon' => 'currency_exchange', 'key' => 'saudi_invest'],
                                ['icon' => 'badge', 'key' => 'residency'],
                                ['icon' => 'balance', 'key' => 'litigation'],
                                ['icon' => 'bolt', 'key' => 'one_day'],
                            ];
                        @endphp

                        @foreach ($services as $service)
                            <a href="{{ route('request') }}"
                                class="group relative bg-white border border-gray-200 p-5 hover:border-[#a41c1c] transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 flex flex-col items-center text-center h-full justify-center rounded-sm">
                                <div class="mb-3 text-[#a41c1c] group-hover:scale-110 transition-transform duration-300">
                                    <span class="material-symbols-outlined text-3xl">{{ $service['icon'] }}</span>
                                </div>
                                <h3
                                    class="font-bold text-[#1C1C1C] text-sm leading-tight font-cairo group-hover:text-[#a41c1c] transition-colors">
                                    {{ __('frontend.services_list.items.' . $service['key']) }}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Simple Scroll Indicator -->
            <div class="absolute bottom-4 text-[#606060] animate-pulse">
                <span class="material-symbols-outlined text-2xl">expand_more</span>
            </div>
        </header>

        <!-- Golden Visa Section -->
        <section class="py-24 bg-[#FAFAFA] relative border-t border-gray-100">
            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col md:flex-row items-start justify-between mb-16 gap-12">
                    <div class="w-full md:w-1/2">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="h-px w-8 bg-[#a41c1c]"></span>
                            <span
                                class="text-[#a41c1c] text-sm font-bold tracking-widest uppercase font-cairo">{{ __('frontend.golden_visa.title') }}</span>
                        </div>
                        <h2 class="text-3xl md:text-5xl font-bold font-cairo text-[#1C1C1C] mb-8 leading-tight">
                            {{ __('frontend.golden_visa.phases_title') }}
                        </h2>
                        <p
                            class="text-[#606060] text-lg leading-loose font-cairo pl-4 border-l-2 border-[#a41c1c] rtl:pl-0 rtl:border-l-0 rtl:border-r-2 rtl:pr-4">
                            {{ __('frontend.golden_visa.intro') }}
                        </p>
                    </div>

                    <div
                        class="w-full md:w-1/3 bg-white p-8 border border-gray-200 shadow-sm relative group hover:border-[#a41c1c]/30 transition-colors">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-[#a41c1c]/5 -mr-10 -mt-10 rounded-full"></div>
                        <h3 class="text-xl font-bold text-[#a41c1c] mb-6 font-cairo flex items-center gap-3">
                            <span class="material-symbols-outlined">star</span>
                            {{ __('frontend.golden_visa.benefits_title') }}
                        </h3>
                        <ul class="space-y-4">
                            @foreach (__('frontend.golden_visa.benefits') as $benefit)
                                <li class="flex items-start gap-4">
                                    <span
                                        class="material-symbols-outlined text-[#a41c1c] text-lg shrink-0 mt-1">check_circle</span>
                                    <span class="text-[#606060] font-medium font-cairo">{{ $benefit }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                    @foreach (__('frontend.golden_visa.steps') as $index => $step)
                        <div
                            class="relative bg-white p-6 border border-gray-200 hover:border-[#a41c1c] transition-all duration-300 transform hover:-translate-y-1 group h-full">
                            <h3
                                class="text-5xl font-black text-gray-100 absolute top-2 right-4 font-cairo group-hover:text-[#a41c1c]/10 transition-colors pointer-events-none">
                                0{{ $index + 1 }}
                            </h3>
                            <div class="relative z-10 pt-6">
                                <h4
                                    class="text-lg font-bold text-[#1C1C1C] mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                                    {{ $step['title'] }}
                                </h4>
                                <p class="text-[#606060] text-sm leading-relaxed font-cairo">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="relative py-24 bg-white overflow-hidden">
            <!-- Background Logo Watermark for About Section -->
            <div
                class="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-1/4 opacity-[0.02] pointer-events-none">
                <img src="{{ asset('img/logo.png') }}" alt="" class="h-[800px] w-auto grayscale">
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="w-full md:w-1/2 relative">
                        <div class="relative overflow-hidden shadow-xl border-4 border-gray-50">
                            <img src="{{ asset('img/riyadh_skyline.png') }}" alt="Riyadh Skyline"
                                class="w-full h-auto object-cover grayscale hover:grayscale-0 transition-all duration-700">
                            <div class="absolute inset-0 bg-[#a41c1c]/10 mix-blend-multiply"></div>
                        </div>
                        <!-- Logo Badge -->
                        <div
                            class="absolute -bottom-6 -right-6 bg-white p-6 shadow-lg border border-gray-100 hidden md:block">
                            <img src="{{ asset('img/logo.png') }}" class="h-16 w-auto" alt="AMN Logo">
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="h-px w-8 bg-[#a41c1c]"></span>
                            <span
                                class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">{{ __('frontend.about.title') }}</span>
                        </div>

                        <h2 class="text-3xl md:text-4xl font-bold text-[#1C1C1C] mb-8 font-cairo leading-relaxed">
                            {{ __('frontend.vision_mission.vision') }}
                        </h2>

                        <div class="space-y-6 text-[#606060] leading-loose font-medium text-lg font-cairo text-justify">
                            <p>{{ __('frontend.about.overview') }}</p>
                            <p>{{ __('frontend.about.commitment') }}</p>
                        </div>

                        <div class="mt-10">
                            <a href="#vision"
                                class="inline-flex items-center gap-2 text-[#a41c1c] font-bold border-b-2 border-[#a41c1c] pb-1 hover:text-[#1C1C1C] hover:border-[#1C1C1C] transition-all font-cairo">
                                <span>{{ __('frontend.buttons.about.title') }}</span>
                                <span class="material-symbols-outlined rtl:rotate-180 text-sm">arrow_right_alt</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Partner / Features -->
        <section class="py-24 bg-[#1C1C1C] text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold font-cairo text-white mb-6 leading-tight">
                        {{ __('frontend.why_partner.title') }}
                    </h2>
                    <p class="text-gray-400 text-lg max-w-2xl mx-auto font-cairo">
                        {{ __('frontend.why_partner.subtitle') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- One Day Service -->
                    <div class="bg-[#a41c1c] p-8 text-white relative overflow-hidden group">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <span class="material-symbols-outlined text-9xl">timer</span>
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="material-symbols-outlined text-3xl">timer</span>
                                <h3 class="font-bold font-cairo text-xl">{{ __('frontend.one_day_service.title') }}</h3>
                            </div>
                            <p class="text-white/90 text-sm mb-6 leading-relaxed font-cairo">
                                {{ __('frontend.one_day_service.desc') }}
                            </p>
                            <ul class="space-y-3">
                                @foreach (range(0, 2) as $i)
                                    <li class="flex items-center gap-3 text-sm font-medium text-white/90 font-cairo">
                                        <span class="material-symbols-outlined text-sm">check</span>
                                        {{ __('frontend.one_day_service.items.' . $i) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Why Us Cards -->
                    @foreach (['team', 'knowledge', 'custom', 'proactive', 'integrity'] as $idx => $key)
                        <div
                            class="bg-[#2a2a2a] p-8 border border-gray-800 hover:border-[#a41c1c] transition-all duration-300 group">
                            <div
                                class="w-10 h-10 flex items-center justify-center mb-6 bg-[#333] group-hover:bg-[#a41c1c] transition-colors">
                                <span class="font-bold font-cairo text-white">0{{ $loop->iteration }}</span>
                            </div>
                            <h3
                                class="text-lg font-bold text-white mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                                {{ __('frontend.why_partner.cards.' . $key . '.title') }}
                            </h3>
                            <p class="text-gray-400 text-sm leading-relaxed font-cairo">
                                {{ __('frontend.why_partner.cards.' . $key . '.desc') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="relative py-24 bg-white">
            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col lg:flex-row gap-16">

                    <!-- Contact Info -->
                    <div class="w-full lg:w-1/3">
                        <div class="flex items-center gap-2 mb-8">
                            <span class="h-px w-8 bg-[#a41c1c]"></span>
                            <span class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">تواصل
                                معنا</span>
                        </div>
                        <h3 class="text-4xl font-bold font-cairo text-[#1C1C1C] mb-10 leading-tight">
                            معلومات الاتصال
                        </h3>

                        <div class="space-y-8">
                            <div class="flex items-start gap-4">
                                <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                                    <span class="material-symbols-outlined">location_on</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">العنوان</h4>
                                    <p class="text-[#606060] font-cairo">الرياض - المملكة العربية السعودية</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                                    <span class="material-symbols-outlined">mail</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">البريد الإلكتروني</h4>
                                    <a href="mailto:info@amn-law.sa"
                                        class="text-[#606060] font-cairo hover:text-[#a41c1c] transition-colors">info@amn-law.sa</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                                    <span class="material-symbols-outlined">call</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">الهاتف</h4>
                                    <a href="tel:+966555200816" dir="ltr"
                                        class="text-[#606060] font-cairo hover:text-[#a41c1c] transition-colors text-right block">+966
                                        55 520 0816</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                                    <span class="material-symbols-outlined">language</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">الموقع الإلكتروني</h4>
                                    <a href="https://www.amn-law.sa" target="_blank"
                                        class="text-[#606060] font-cairo hover:text-[#a41c1c] transition-colors">www.amn-law.sa</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="w-full lg:w-2/3 bg-[#FAFAFA] p-8 md:p-12 border border-gray-100">
                        <h2 class="text-2xl font-bold font-cairo text-[#1C1C1C] mb-2">
                            نحن هنا للمساعدة
                        </h2>
                        <p class="text-[#606060] mb-8 font-cairo text-sm">
                            تواصل معنا عبر النموذج وسنتواصل معك في أقرب وقت ممكن
                        </p>

                        <form id="contactForm" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">الاسم</label>
                                    <input type="text" name="name" required
                                        class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                        placeholder="الاسم الكامل">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">البريد
                                        الإلكتروني</label>
                                    <input type="email" name="email" required
                                        class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                        placeholder="example@email.com">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">رقم
                                        الهاتف</label>
                                    <input type="tel" name="phone"
                                        class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                        placeholder="+966...">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">الموضوع</label>
                                    <input type="text" name="subject"
                                        class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                        placeholder="استفسار ...">
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">الرسالة</label>
                                <textarea name="message" rows="5" required
                                    class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm resize-none"
                                    placeholder="اكتب رسالتك هنا..."></textarea>
                            </div>

                            <button type="submit"
                                class="px-10 py-4 bg-[#a41c1c] text-white font-bold text-sm uppercase tracking-wider hover:bg-[#8a1818] transition-colors font-cairo flex items-center gap-2">
                                <span>إرسال الرسالة</span>
                                <span class="material-symbols-outlined text-lg">send</span>
                            </button>

                            <div id="contactFormMessage"
                                class="hidden p-4 text-sm font-cairo bg-white border border-gray-200 mt-4"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-[#101010] text-white pt-20 pb-10 border-t border-[#1C1C1C]">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-16">
                    <!-- Info -->
                    <div class="text-center md:text-start">
                        <img src="{{ asset('img/logo.png') }}" alt="AMN Logo"
                            class="h-16 mb-8 opacity-100 mx-auto md:mx-0 filter grayscale hover:grayscale-0 transition-all">
                        <p class="text-gray-400 text-sm leading-loose mb-6 font-cairo max-w-sm">
                            {{ __('frontend.vision_mission.mission') }}
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="text-center md:text-start">
                        <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs font-cairo">
                            {{ __('frontend.buttons.services.title') }}</h4>
                        <ul class="space-y-4 text-sm text-gray-400 font-cairo">
                            <li><a href="#"
                                    class="hover:text-[#a41c1c] transition-colors">{{ __('frontend.services_list.items.contracts') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-[#a41c1c] transition-colors">{{ __('frontend.services_list.items.consultation') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-[#a41c1c] transition-colors">{{ __('frontend.services_list.items.saudi_invest') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-[#a41c1c] transition-colors">{{ __('frontend.services_list.items.litigation') }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="text-center md:text-start">
                        <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs font-cairo">
                            {{ __('frontend.buttons.request.title') }}</h4>
                        <ul class="space-y-5 text-sm text-gray-400 font-cairo flex flex-col items-center md:items-start">
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
                            <li class="mt-6">
                                <a href="{{ route('login') }}"
                                    class="px-8 py-3 border border-[#a41c1c] text-[#a41c1c] hover:bg-[#a41c1c] hover:text-white transition-colors text-xs font-bold uppercase tracking-wider">
                                    {{ __('frontend.nav.login') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-[#1C1C1C] pt-8 text-center text-xs text-gray-600 font-cairo">
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
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

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
                    messageDiv.classList.remove('hidden', 'text-red-600', 'text-green-600', 'border-red-200',
                        'border-green-200');

                    if (data.success) {
                        messageDiv.classList.add('text-green-600', 'border-green-200');
                        messageDiv.innerHTML =
                            `<div class="flex items-center gap-2"><span class="material-symbols-outlined">check_circle</span> ${data.message}</div>`;
                        form.reset();
                    } else {
                        throw new Error(data.message || 'حدث خطأ ما أثناء الإرسال');
                    }
                })
                .catch(error => {
                    messageDiv.classList.remove('hidden', 'text-green-600', 'border-green-200');
                    messageDiv.classList.add('text-red-600', 'border-red-200');

                    if (error.status === 422) {
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
                    submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');

                    // Hide message after 5 seconds
                    setTimeout(() => {
                        messageDiv.classList.add('hidden');
                    }, 5000);
                });
        });
    </script>

    <style>
        /* Custom Font Imports if not already in app.css */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Cairo:wght@400;600;700;900&display=swap');

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        /* Animation Utilities */
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
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
@endsection
