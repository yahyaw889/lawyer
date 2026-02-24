@extends('frontend.layouts.app')

@section('content')
    <!-- Team Section -->
    <section class="relative bg-white overflow-hidden md:h-screen flex flex-col md:flex-row items-stretch">
        <!-- Background Logo Watermark for About Section -->
        <div
            class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none overflow-hidden z-0">
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-[70%] md:w-[50%] lg:w-[40%] h-auto grayscale">
        </div>

        <!-- Text Column -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12 lg:p-20 relative z-20">
            <div class="max-w-xl">
                <div class="flex items-center gap-2 mb-4">
                    <span class="h-px w-8 bg-[#a41c1c]"></span>
                    <span class="text-[#a41c1c] font-bold tracking-widest text-xs lg:text-sm font-cairo uppercase">
                        {{ __('frontend.about_page_custom.team.title') }}
                    </span>
                </div>

                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#1C1C1C] mb-6 font-cairo leading-tight">
                    {{ __('frontend.about_page_custom.team.title') }}
                </h2>

                <div
                    class="space-y-4 text-[#606060] leading-relaxed font-medium text-base lg:text-lg font-cairo text-justify">
                    <p>{{ __('frontend.about_page_custom.team.desc') }}</p>
                </div>

                <div class="mt-8">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 text-[#1C1C1C] font-bold border-b-2 border-transparent hover:border-[#a41c1c] pb-1 hover:text-[#a41c1c] transition-all font-cairo text-sm">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        <span>{{ __('frontend.nav.back_home') }}</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Image Column -->
        <div class="w-full md:w-1/2 relative min-h-[400px] md:min-h-0">
            <img src="{{ asset('img/riyadh_skyline.png') }}" alt="Team"
                class="absolute inset-0 w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
            <div class="absolute inset-0 bg-[#a41c1c]/10 mix-blend-multiply"></div>

            <!-- Logo Badge inside image -->
            <div
                class="absolute bottom-10 right-10 bg-white p-6 shadow-lg border border-gray-100 hidden lg:block rounded-xl">
                <img src="{{ asset('img/logo.png') }}" class="h-16 w-auto" alt="AMN Logo">
            </div>
        </div>
    </section>

    <!-- Merged Achievements & Clients Section -->
    <section id="stats-clients" class="py-16 bg-gray-50 relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Logo Watermark -->
        <div class="absolute inset-0 flex items-center justify-center opacity-[0.03] pointer-events-none z-0">
            <img src="{{ asset('img/logo.png') }}" alt="" class="w-[70%] md:w-[50%] lg:w-[40%] h-auto grayscale">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Achievements Header -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span
                    class="text-[#a41c1c] font-bold tracking-widest text-xs lg:text-sm font-cairo block mb-2 uppercase">{{ __('frontend.about_page_custom.achievements.title') }}</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#1C1C1C] font-cairo mb-4">
                    {{ __('frontend.about_page_custom.achievements.title') }}</h2>
                <p class="text-[#606060] text-base lg:text-lg font-cairo leading-relaxed">
                    {{ __('frontend.about_page_custom.achievements.desc') }}
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-20">
                @foreach (__('frontend.about_page_custom.achievements.stats') as $index => $stat)
                    @php
                        // Extract numeric value for animation (removing +)
                        $targetNumber = preg_replace('/[^0-9]/', '', $stat['number']);
                        $hasPlus = str_contains($stat['number'], '+');
                    @endphp
                    <div
                        class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow group">
                        <div
                            class="text-3xl md:text-4xl font-bold text-[#a41c1c] mb-3 font-cairo group-hover:scale-110 transition-transform duration-300 flex items-center justify-center">
                            @if ($hasPlus)
                                <span>+</span>
                            @endif
                            <span class="counter" data-target="{{ $targetNumber }}">0</span>
                        </div>
                        <div class="text-gray-600 font-medium font-cairo text-base lg:text-lg">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            <hr class="border-gray-200 mb-20">

            <!-- Clients Header -->
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span
                    class="text-[#a41c1c] font-bold tracking-widest text-xs lg:text-sm font-cairo block mb-2 uppercase">{{ __('frontend.about_page_custom.clients.title') }}</span>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#1C1C1C] font-cairo mb-4">
                    {{ __('frontend.about_page_custom.clients.title') }}</h2>
                <p class="text-[#606060] text-base lg:text-lg font-cairo leading-relaxed">
                    {{ __('frontend.about_page_custom.clients.desc') }}
                </p>
            </div>

            <!-- Clients Grid (Large Circular Logos) -->
            <div class="flex flex-wrap justify-center gap-8 md:gap-12 lg:gap-16">
                @for ($i = 1; $i <= 4; $i++)
                    @php
                        $ext = $i == 4 ? 'jpg' : 'png';
                    @endphp
                    <div class="group">
                        <div
                            class="w-32 h-32 md:w-40 md:h-40 lg:w-48 lg:h-48 rounded-full bg-white border-2 border-gray-100 shadow-sm hover:shadow-2xl hover:border-[#a41c1c]/30 transition-all duration-500 flex items-center justify-center p-6 md:p-8 overflow-hidden">
                            <img src="{{ asset('img/clients/client_' . $i . '.' . $ext) }}"
                                alt="Client {{ $i }}"
                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110"
                                onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'text-gray-300 font-bold font-cairo text-sm md:text-base\'>Client {{ $i }}</span>'">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const animateCounter = (counter) => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const increment = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 10);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            };

            const observerOptions = {
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => observer.observe(counter));
        });
    </script>
@endsection
