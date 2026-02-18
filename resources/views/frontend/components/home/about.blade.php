<section id="about" class="relative  flex items-center justify-center bg-white overflow-hidden">
    <!-- Background Logo Watermark for About Section -->
    <div class="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-1/4 opacity-[0.02] pointer-events-none">
        <img src="{{ asset('img/logo.png') }}" alt="" class="h-[800px] w-auto grayscale">
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-16">

            <!-- Text Section (Now First) -->
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

                <div class="mt-10 flex gap-4">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 text-[#1C1C1C] font-bold border-b-2 border-transparent hover:border-[#a41c1c] pb-1 hover:text-[#a41c1c] transition-all font-cairo">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        <span>{{ __('frontend.nav.back_home') }}</span>
                    </a>
                </div>
            </div>

            <!-- Image Section (Now Second) -->
            <div class="w-full md:w-1/2 relative">
                <div class="relative overflow-hidden shadow-xl border-4 border-gray-50">
                    <img src="{{ asset('img/riyadh_skyline.png') }}" alt="Riyadh Skyline"
                        class="w-full h-auto object-cover grayscale hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-[#a41c1c]/10 mix-blend-multiply"></div>
                </div>
                <!-- Logo Badge -->
                <div class="absolute -bottom-6 -right-6 bg-white p-6 shadow-lg border border-gray-100 hidden md:block">
                    <img src="{{ asset('img/logo.png') }}" class="h-16 w-auto" alt="AMN Logo">
                </div>
            </div>

        </div>
    </div>
</section>
