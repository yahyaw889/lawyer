@extends('frontend.layouts.app')

@section('content')
    <div class="relative min-h-screen bg-soft-white font-sans" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Header / Hero Section -->
        <header class="relative bg-white text-[#1C1C1C] overflow-hidden border-b border-gray-100">
            <!-- Global Watermark Background -->
            <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center overflow-hidden">
                <div class="opacity-[0.03] transform scale-150 grayscale">
                    <img src="{{ asset('img/logo.png') }}" alt="Background Logo" class="w-[80vw] h-auto object-contain">
                </div>
                <!-- Formal Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white/90"></div>
            </div>

            <!-- Navbar Placeholder (if needed, or back button) -->
            <div class="relative z-50 px-8 py-6 flex justify-between items-center">
                <a href="{{ route('home') }}"
                    class="group flex items-center gap-2 text-[#a41c1c] font-bold hover:text-[#8a1818] transition-colors font-cairo">
                    <span
                        class="material-symbols-outlined rtl:rotate-180 group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform">arrow_back</span>
                    <span>{{ __('frontend.nav.back_home') }}</span>
                </a>
            </div>

            <div class="container mx-auto px-6 relative z-10 py-16 text-center">
                <h1 class="text-4xl md:text-6xl font-black text-[#a41c1c] mb-4 font-cairo leading-tight">
                    {{ __('faq.title') }}
                </h1>
                <p class="text-lg text-gray-500 font-medium font-cairo max-w-2xl mx-auto">
                    {{ __('faq.subtitle') }}
                </p>
            </div>
        </header>

        <!-- FAQ Content -->
        <main class="container mx-auto px-6 py-16 relative z-10 max-w-4xl">
            <div class="space-y-6">

                <!-- FAQ Item 1: Apostille -->
                <div
                    class="group bg-white border border-gray-200 rounded-sm overflow-hidden transition-all duration-300 hover:border-[#a41c1c] hover:shadow-md">
                    <button class="w-full flex items-center justify-between p-6 text-start focus:outline-none"
                        onclick="toggleAccordion('apostille-content', this)">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-[#F5F5F5] rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-2xl">verified</span>
                            </div>
                            <h2
                                class="text-xl font-bold text-[#1C1C1C] font-cairo group-hover:text-[#a41c1c] transition-colors">
                                {{ __('faq.apostille.title') }}
                            </h2>
                        </div>
                        <span class="material-symbols-outlined text-gray-400 transition-transform duration-300 transform"
                            id="apostille-icon">expand_more</span>
                    </button>
                    <div id="apostille-content" class="hidden border-t border-gray-100 bg-[#FAFAFA]">
                        <div
                            class="p-8 text-[#606060] leading-loose font-cairo text-lg prose prose-p:text-[#606060] prose-headings:text-[#1C1C1C] max-w-none">
                            {!! __('faq.apostille.content') !!}
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2: Premium Residency -->
                <div
                    class="group bg-white border border-gray-200 rounded-sm overflow-hidden transition-all duration-300 hover:border-[#a41c1c] hover:shadow-md">
                    <button class="w-full flex items-center justify-between p-6 text-start focus:outline-none"
                        onclick="toggleAccordion('residency-content', this)">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-[#F5F5F5] rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-2xl">badge</span>
                            </div>
                            <h2
                                class="text-xl font-bold text-[#1C1C1C] font-cairo group-hover:text-[#a41c1c] transition-colors">
                                {{ __('faq.premium_residency.title') }}
                            </h2>
                        </div>
                        <span class="material-symbols-outlined text-gray-400 transition-transform duration-300 transform"
                            id="residency-icon">expand_more</span>
                    </button>
                    <div id="residency-content" class="hidden border-t border-gray-100 bg-[#FAFAFA]">
                        <div
                            class="p-8 text-[#606060] leading-loose font-cairo text-lg prose prose-p:text-[#606060] prose-headings:text-[#1C1C1C] max-w-none">
                            {!! __('faq.premium_residency.content') !!}
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer (Simple) -->
        <footer class="bg-white border-t border-gray-200 py-8 text-center text-sm text-gray-400 font-cairo">
            &copy; {{ date('Y') }} AMN Global Law Firm.
        </footer>

    </div>

    <script>
        function toggleAccordion(contentId, button) {
            const content = document.getElementById(contentId);
            const icon = button.querySelector('span:last-child');

            // Close other accordions (optional, for one-at-a-time behavior)
            // document.querySelectorAll('[id$="-content"]').forEach(el => {
            //     if (el.id !== contentId && !el.classList.contains('hidden')) {
            //         el.classList.add('hidden');
            //         // Reset icon for others (need a way to select the button)
            //     }
            // });

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
@endsection
