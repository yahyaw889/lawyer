<div id="request" class="h-screen flex flex-col md:flex-row bg-white relative overflow-hidden font-cairo">

    <!-- Left Panel: Branding & Info (40%) -->
    <div class="hidden md:flex w-full md:w-[40%] relative overflow-hidden flex-col justify-between p-12 text-white">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[url('{{ asset('img/hero-law.jpg') }}')] bg-cover bg-center z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-[#a41c1c]/95 via-[#911c24]/90 to-black/80 z-0"></div>

        <!-- Decoration -->
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 z-0 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-64 h-64 bg-black/20 rounded-full blur-3xl -ml-16 -mb-16 z-0 pointer-events-none">
        </div>

        <!-- Logo -->
        <div class="relative z-10 animate-fade-in-down">
            <div class="inline-block text-left border-l-[6px] border-white/30 pl-6 py-2">
                <h1 class="text-[60px] lg:text-[80px] font-black text-white leading-[0.75] tracking-tighter"
                    style="font-family: 'Montserrat', sans-serif;">
                    <span class="typewriter-text border-white">ΛMN</span>
                </h1>
                <div class="text-[10px] lg:text-[12px] font-bold text-white/80 uppercase tracking-[0.38em] mt-3 ml-1">
                    GLOBAL LAW FIRM
                </div>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="relative z-10 space-y-6 animate-fade-in-up" style="animation-delay: 0.2s;">
            <div>
                <h3 class="text-xl font-bold mb-2">{{ __('frontend.buttons.request.title') }}</h3>
                <p class="text-white/70 text-sm leading-relaxed max-w-sm">
                    {{ __('frontend.about.commitment') }}
                </p>
            </div>

            <ul class="space-y-3 text-sm text-white/80">
                <li class="flex items-center gap-4">
                    <span
                        class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5">
                        <span class="material-symbols-outlined text-lg">call</span>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase opacity-60">Call Us</span>
                        <span class="font-bold">+966 50 000 0000</span>
                    </div>
                </li>
                <li class="flex items-center gap-4">
                    <span
                        class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5">
                        <span class="material-symbols-outlined text-lg">mail</span>
                    </span>
                    <div>
                        <span class="block text-[10px] uppercase opacity-60">Email Us</span>
                        <span class="font-bold">info@amn-law.sa</span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Copyright -->
        <div class="relative z-10 text-[10px] text-white/40 font-light">
            &copy; {{ date('Y') }} {{ __('frontend.hero.firm_name') }}
        </div>
    </div>

    <!-- Right Panel: Form (60%) -->
    <div class="w-full md:w-[60%] bg-white flex flex-col relative h-full">
        <!-- Back Button -->
        <a href="{{ route('home') }}"
            class="absolute top-6 right-8 z-20 flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors text-xs font-bold rtl:flex-row-reverse uppercase tracking-wider">
            <span>{{ __('frontend.nav.home') }}</span>
            <span class="material-symbols-outlined text-lg rtl:rotate-180">arrow_right_alt</span>
        </a>

        <div class="flex-1 flex flex-col justify-center px-8 md:px-16 lg:px-24 h-full overflow-hidden">
            <div class="w-full max-w-lg mx-auto">
                <div class="mb-8">
                    <h2 class="text-2xl md:text-3xl font-black text-gray-900 mb-2 font-cairo">
                        {{ __('frontend.buttons.request.title') }}</h2>
                    <p class="text-gray-500 text-sm">{{ __('frontend.one_day_service.desc') }}</p>
                </div>

                <form action="#" method="POST" class="space-y-5">
                    <!-- Personal Info -->
                    <div class="grid grid-cols-2 gap-5">
                        <div class="relative group">
                            <input type="text" id="name" name="name" placeholder=" "
                                class="peer w-full px-4 py-2.5 border-b border-gray-200 bg-gray-50/50 focus:bg-white focus:border-[#a41c1c] focus:outline-none transition-all duration-300 placeholder-transparent text-sm rounded-t-lg">
                            <label for="name"
                                class="absolute right-3 left-auto rtl:right-3 rtl:left-auto top-2.5 text-gray-400 text-xs transition-all duration-300 peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-focus:-top-2 peer-focus:text-[10px] peer-focus:text-[#a41c1c]">
                                {{ __('frontend.consultation.form.name') }}
                            </label>
                        </div>
                        <div class="relative group">
                            <input type="email" id="email" name="email" placeholder=" "
                                class="peer w-full px-4 py-2.5 border-b border-gray-200 bg-gray-50/50 focus:bg-white focus:border-[#a41c1c] focus:outline-none transition-all duration-300 placeholder-transparent text-sm rounded-t-lg">
                            <label for="email"
                                class="absolute right-3 left-auto rtl:right-3 rtl:left-auto top-2.5 text-gray-400 text-xs transition-all duration-300 peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-focus:-top-2 peer-focus:text-[10px] peer-focus:text-[#a41c1c]">
                                {{ __('frontend.consultation.form.email') }}
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="relative group">
                            <input type="tel" id="phone" name="phone" placeholder=" " dir="ltr"
                                class="peer w-full px-4 py-2.5 border-b border-gray-200 bg-gray-50/50 focus:bg-white focus:border-[#a41c1c] focus:outline-none transition-all duration-300 placeholder-transparent text-left text-sm rounded-t-lg">
                            <label for="phone"
                                class="absolute right-3 left-auto rtl:right-3 rtl:left-auto top-2.5 text-gray-400 text-xs transition-all duration-300 peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-focus:-top-2 peer-focus:text-[10px] peer-focus:text-[#a41c1c]">
                                Phone
                            </label>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-gray-400 mb-3 uppercase tracking-wider">
                                {{ __('frontend.consultation.form.service_type') }}
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Option 1 -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="service_type" value="litigation" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-lg border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-[#a41c1c]/30 peer-checked:bg-white peer-checked:border-[#a41c1c] peer-checked:text-[#a41c1c] transition-all duration-300 flex items-center gap-3 group">
                                        <span
                                            class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 peer-checked:bg-[#a41c1c]/10 peer-checked:text-[#a41c1c] group-hover:text-[#a41c1c]">
                                            <span class="material-symbols-outlined text-lg">gavel</span>
                                        </span>
                                        <span
                                            class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.services_list.items.litigation') }}</span>
                                    </div>
                                </label>

                                <!-- Option 2 -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="service_type" value="contracts" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-lg border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-[#a41c1c]/30 peer-checked:bg-white peer-checked:border-[#a41c1c] peer-checked:text-[#a41c1c] transition-all duration-300 flex items-center gap-3 group">
                                        <span
                                            class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 peer-checked:bg-[#a41c1c]/10 peer-checked:text-[#a41c1c] group-hover:text-[#a41c1c]">
                                            <span class="material-symbols-outlined text-lg">history_edu</span>
                                        </span>
                                        <span
                                            class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.services_list.items.contracts') }}</span>
                                    </div>
                                </label>

                                <!-- Option 3 -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="service_type" value="consultation" class="peer sr-only">
                                    <div
                                        class="p-3 rounded-lg border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-[#a41c1c]/30 peer-checked:bg-white peer-checked:border-[#a41c1c] peer-checked:text-[#a41c1c] transition-all duration-300 flex items-center gap-3 group">
                                        <span
                                            class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 peer-checked:bg-[#a41c1c]/10 peer-checked:text-[#a41c1c] group-hover:text-[#a41c1c]">
                                            <span class="material-symbols-outlined text-lg">support_agent</span>
                                        </span>
                                        <span
                                            class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.services_list.items.consultation') }}</span>
                                    </div>
                                </label>

                                <!-- Option 4 -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="service_type" value="golden_visa"
                                        class="peer sr-only">
                                    <div
                                        class="p-3 rounded-lg border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-[#a41c1c]/30 peer-checked:bg-white peer-checked:border-[#a41c1c] peer-checked:text-[#a41c1c] transition-all duration-300 flex items-center gap-3 group">
                                        <span
                                            class="w-8 h-8 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 peer-checked:bg-[#a41c1c]/10 peer-checked:text-[#a41c1c] group-hover:text-[#a41c1c]">
                                            <span class="material-symbols-outlined text-lg">stars</span>
                                        </span>
                                        <span
                                            class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.golden_visa.title') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="relative group">
                        <textarea id="message" name="message" rows="3" placeholder=" "
                            class="peer w-full px-4 py-2.5 border-b border-gray-200 bg-gray-50/50 focus:bg-white focus:border-[#a41c1c] focus:outline-none transition-all duration-300 placeholder-transparent resize-none text-sm rounded-t-lg"></textarea>
                        <label for="message"
                            class="absolute right-3 left-auto rtl:right-3 rtl:left-auto top-2.5 text-gray-400 text-xs transition-all duration-300 peer-placeholder-shown:top-2.5 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-focus:-top-2 peer-focus:text-[10px] peer-focus:text-[#a41c1c]">
                            {{ __('frontend.consultation.form.details') }}
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#a41c1c] text-white font-bold py-3.5 rounded-xl hover:bg-[#8a1616] transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 mt-6 group flex items-center justify-center gap-2 text-sm">
                        <span>{{ __('frontend.buttons.request.title') }}</span>
                        <span
                            class="material-symbols-outlined text-lg group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">send</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
