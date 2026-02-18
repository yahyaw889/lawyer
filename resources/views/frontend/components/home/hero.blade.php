<header class="relative min-h-screen flex flex-col items-center justify-center bg-white overflow-hidden text-[#1C1C1C]">

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
                <span class="hidden md:inline">{{ __('frontend.nav.global') }}</span>
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-6 relative z-10 w-full flex flex-col items-center justify-center h-full pt-16">

        <!-- Branding Header -->
        <div class="text-center mb-8 animate-fade-in-up">
            <div class="inline-block relative mb-4">
                <h1 class="text-5xl md:text-7xl font-black text-[#a41c1c] leading-none tracking-tight font-montserrat">
                    AMN
                </h1>
                <div class="h-0.5 w-full bg-[#1C1C1C] mt-1 mb-1"></div>
                <div
                    class="text-xs md:text-sm font-bold text-[#1C1C1C] uppercase tracking-[0.4em] flex justify-between w-full font-cairo">
                    {{ __('frontend.hero.brand_subtitle') }}
                </div>
            </div>

            <p class="text-lg md:text-xl text-[#606060] font-medium font-cairo max-w-2xl mx-auto leading-relaxed mt-2">
                {{ __('frontend.hero.subtitle') }}
            </p>
        </div>

        <!-- Service Grid -->
        <div class="max-w-6xl mx-auto w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Top Row: 3 Items --}}
                @php
                    $topServices = [
                        ['icon' => 'groups', 'key' => 'about_us', 'url' => route('about')],
                        [
                            'icon' => 'balance',
                            'key' => 'business_services',
                            'url' => route('services.index'),
                            'label_override' => 'الخدمات القانونية',
                        ],
                        ['icon' => 'quiz', 'key' => 'faq', 'url' => route('faq')],
                    ];
                @endphp

                @foreach ($topServices as $service)
                    <a href="{{ $service['url'] }}"
                        class="group relative bg-white border border-gray-200 p-8 hover:border-[#a41c1c] transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex flex-col items-center text-center justify-center rounded-sm h-56">
                        <div class="mb-5 text-[#a41c1c] group-hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-6xl">{{ $service['icon'] }}</span>
                        </div>
                        <h3
                            class="font-bold text-[#1C1C1C] text-xl leading-tight font-cairo group-hover:text-[#a41c1c] transition-colors">
                            @if (isset($service['label_override']) && app()->getLocale() == 'ar')
                                {{ $service['label_override'] }}
                            @else
                                {{ __('frontend.services_list.items.' . $service['key']) }}
                            @endif
                        </h3>
                    </a>
                @endforeach

                {{-- Bottom Row: 1 Large Item --}}
                <div class="md:col-span-3">
                    <a href="{{ route('consultation-request') }}"
                        class="group relative bg-[#a41c1c] border border-[#a41c1c] p-12 hover:bg-[#8a1818] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-row items-center justify-between rounded-sm w-full overflow-hidden">

                        <div
                            class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <div
                            class="absolute -right-10 -bottom-10 opacity-10 transform scale-150 rotate-12 group-hover:rotate-0 transition-transform duration-500">
                            <span class="material-symbols-outlined text-9xl text-white">history_edu</span>
                        </div>

                        <div class="flex flex-col items-start relative z-10 w-full">
                            <h3 class="font-bold text-white text-3xl font-cairo mb-3 flex items-center gap-3">
                                <span class="material-symbols-outlined text-5xl">history_edu</span>
                                {{ __('frontend.services_list.items.consultation_request') }}
                            </h3>
                            <p class="text-white/80 font-cairo text-base max-w-2xl text-start">
                                {{ __('frontend.hero.consultation_desc') }}
                            </p>
                        </div>

                        <div
                            class="hidden md:flex items-center justify-center w-14 h-14 rounded-full bg-white/20 group-hover:bg-white text-white group-hover:text-[#a41c1c] transition-all duration-300 relative z-10 shrink-0">
                            <span class="material-symbols-outlined rtl:rotate-180 text-3xl">arrow_forward</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Simple Scroll Indicator -->
    <div class="absolute bottom-4 text-[#606060] animate-pulse">
        <span class="material-symbols-outlined text-2xl">expand_more</span>
    </div>
</header>
