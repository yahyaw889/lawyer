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
                    {{ __('frontend.footer.contact_us') }}</h4>
                <ul class="space-y-5 text-sm text-gray-400 font-cairo flex flex-col items-center md:items-start">
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-[#a41c1c]">location_on</span>
                        <span>{{ __('frontend.footer.address') }}</span>
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
                        <a href="{{ route('login') }}" data-no-swup
                            class="px-8 py-3 border border-[#a41c1c] text-[#a41c1c] hover:bg-[#a41c1c] hover:text-white transition-colors text-xs font-bold uppercase tracking-wider">
                            {{ __('frontend.nav.login') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-[#1C1C1C] pt-8 text-center text-xs text-gray-600 font-cairo">
            &copy; {{ date('Y') }} {{ __('frontend.hero.firm_name') }}. {{ __('frontend.footer.reserved') }}.
        </div>
    </div>
</footer>
