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
