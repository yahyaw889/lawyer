<section id="contact" class="relative py-24 bg-white">
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16">

            <!-- Contact Info -->
            <div class="w-full lg:w-1/3">
                <div class="flex items-center gap-2 mb-8">
                    <span class="h-px w-8 bg-[#a41c1c]"></span>
                    <span
                        class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">{{ __('frontend.contact.info_title') }}</span>
                </div>
                <h3 class="text-4xl font-bold font-cairo text-[#1C1C1C] mb-10 leading-tight">
                    {{ __('frontend.contact.info_title') }}
                </h3>

                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">
                                {{ __('frontend.contact.address') }}</h4>
                            <p class="text-[#606060] font-cairo">{{ __('frontend.footer.address') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">
                                {{ __('frontend.contact.email') }}</h4>
                            <a href="mailto:info@amn-law.sa"
                                class="text-[#606060] font-cairo hover:text-[#a41c1c] transition-colors">info@amn-law.sa</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="bg-[#F5F5F5] p-3 text-[#a41c1c]">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">
                                {{ __('frontend.contact.phone') }}</h4>
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
                            <h4 class="font-bold text-[#1C1C1C] font-cairo mb-1">
                                {{ __('frontend.contact.website') }}</h4>
                            <a href="https://www.amn-law.sa" target="_blank"
                                class="text-[#606060] font-cairo hover:text-[#a41c1c] transition-colors">www.amn-law.sa</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="w-full lg:w-2/3 bg-[#FAFAFA] p-8 md:p-12 border border-gray-100">
                <h2 class="text-2xl font-bold font-cairo text-[#1C1C1C] mb-2">
                    {{ __('frontend.contact.form.title') }}
                </h2>
                <p class="text-[#606060] mb-8 font-cairo text-sm">
                    {{ __('frontend.contact.form.desc') }}
                </p>

                <form id="contactForm" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">{{ __('frontend.contact.form.labels.name') }}</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                placeholder="{{ __('frontend.contact.form.placeholders.name') }}">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">{{ __('frontend.contact.form.labels.email') }}</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                placeholder="{{ __('frontend.contact.form.placeholders.email') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">{{ __('frontend.contact.form.labels.phone') }}</label>
                            <input type="tel" name="phone"
                                class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                placeholder="{{ __('frontend.contact.form.placeholders.phone') }}">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">{{ __('frontend.contact.form.labels.subject') }}</label>
                            <input type="text" name="subject"
                                class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm"
                                placeholder="{{ __('frontend.contact.form.placeholders.subject') }}">
                        </div>
                    </div>

                    <div>
                        <label
                            class="block text-xs font-bold text-[#1C1C1C] mb-2 font-cairo uppercase">{{ __('frontend.contact.form.labels.message') }}</label>
                        <textarea name="message" rows="5" required
                            class="w-full px-4 py-3 bg-white border border-gray-300 focus:border-[#a41c1c] focus:ring-0 transition-colors outline-none font-cairo text-sm resize-none"
                            placeholder="{{ __('frontend.contact.form.placeholders.message') }}"></textarea>
                    </div>

                    <button type="submit"
                        class="px-10 py-4 bg-[#a41c1c] text-white font-bold text-sm uppercase tracking-wider hover:bg-[#8a1818] transition-colors font-cairo flex items-center gap-2">
                        <span>{{ __('frontend.contact.form.send_btn') }}</span>
                        <span class="material-symbols-outlined text-lg">send</span>
                    </button>

                    <div id="contactFormMessage"
                        class="hidden p-4 text-sm font-cairo bg-white border border-gray-200 mt-4"></div>
                </form>
            </div>
        </div>
    </div>
</section>
