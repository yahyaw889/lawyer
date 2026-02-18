@extends('frontend.layouts.app')

@section('content')
    <div class="relative h-screen flex flex-col items-center justify-center bg-white overflow-hidden">
        <!-- Background Logo Watermark -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-[0.03] pointer-events-none">
            <img src="{{ asset('img/logo.png') }}" alt="" class="h-[800px] w-auto grayscale">
        </div>

        <div class="container mx-auto px-6 relative z-10 h-full flex flex-col justify-center">

            {{-- Header --}}
            <div class="text-center mb-12 animate-fade-in-down">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                    <span
                        class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo">{{ __('frontend.nav.services') }}</span>
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold font-cairo text-[#1C1C1C] mb-4">
                    {{ __('frontend.services_page.title') }}
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-cairo">
                    {{ __('frontend.services_page.subtitle') }}
                </p>
            </div>

            {{-- Cards Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-7xl mx-auto">

                {{-- 1. Business Services --}}
                <a href="{{ route('business-services.index') }}"
                    class="group relative bg-white border border-gray-100 p-8 rounded-sm shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center overflow-hidden h-full justify-between">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#a41c1c] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="mb-6 w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors duration-500 group-hover:scale-110 shadow-sm">
                        <span class="material-symbols-outlined text-4xl">domain</span>
                    </div>

                    <div class="flex-grow flex flex-col justify-center">
                        <h3
                            class="text-xl font-bold text-[#1C1C1C] mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            {{ __('frontend.services_page.cards.business.title') }}
                        </h3>
                        <p class="text-sm text-gray-500 font-cairo leading-relaxed mb-6">
                            {{ __('frontend.services_page.cards.business.desc') }}
                        </p>
                    </div>

                    <span
                        class="flex items-center gap-2 text-xs font-bold text-[#a41c1c] uppercase tracking-wider opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                        {{ __('frontend.buttons.more_details') ?? 'More Details' }}
                        <span class="material-symbols-outlined text-base rtl:rotate-180">arrow_forward</span>
                    </span>
                </a>

                {{-- 2. Consultation --}}
                <a href="{{ route('consultation-request') }}"
                    class="group relative bg-white border border-gray-100 p-8 rounded-sm shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center overflow-hidden h-full justify-between">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#a41c1c] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="mb-6 w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors duration-500 group-hover:scale-110 shadow-sm">
                        <span class="material-symbols-outlined text-4xl">support_agent</span>
                    </div>

                    <div class="flex-grow flex flex-col justify-center">
                        <h3
                            class="text-xl font-bold text-[#1C1C1C] mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            {{ __('frontend.services_page.cards.consultation.title') }}
                        </h3>
                        <p class="text-sm text-gray-500 font-cairo leading-relaxed mb-6">
                            {{ __('frontend.services_page.cards.consultation.desc') }}
                        </p>
                    </div>

                    <span
                        class="flex items-center gap-2 text-xs font-bold text-[#a41c1c] uppercase tracking-wider opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                        {{ __('frontend.buttons.more_details') ?? 'More Details' }}
                        <span class="material-symbols-outlined text-base rtl:rotate-180">arrow_forward</span>
                    </span>
                </a>

                {{-- 3. Document Attestation --}}
                <a href="{{ route('document-attestation') }}"
                    class="group relative bg-white border border-gray-100 p-8 rounded-sm shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center overflow-hidden h-full justify-between">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#a41c1c] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="mb-6 w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors duration-500 group-hover:scale-110 shadow-sm">
                        <span class="material-symbols-outlined text-4xl">verified</span>
                    </div>

                    <div class="flex-grow flex flex-col justify-center">
                        <h3
                            class="text-xl font-bold text-[#1C1C1C] mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            {{ __('frontend.services_page.cards.attestation.title') }}
                        </h3>
                        <p class="text-sm text-gray-500 font-cairo leading-relaxed mb-6">
                            {{ __('frontend.services_page.cards.attestation.desc') }}
                        </p>
                    </div>

                    <span
                        class="flex items-center gap-2 text-xs font-bold text-[#a41c1c] uppercase tracking-wider opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                        {{ __('frontend.buttons.more_details') ?? 'More Details' }}
                        <span class="material-symbols-outlined text-base rtl:rotate-180">arrow_forward</span>
                    </span>
                </a>

                {{-- 4. Legal Representation --}}
                <a href="{{ route('legal-representation') }}"
                    class="group relative bg-white border border-gray-100 p-8 rounded-sm shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 flex flex-col items-center text-center overflow-hidden h-full justify-between">
                    <div
                        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-[#a41c1c] to-transparent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                    </div>

                    <div
                        class="mb-6 w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-[#a41c1c] group-hover:bg-[#a41c1c] group-hover:text-white transition-colors duration-500 group-hover:scale-110 shadow-sm">
                        <span class="material-symbols-outlined text-4xl">gavel</span>
                    </div>

                    <div class="flex-grow flex flex-col justify-center">
                        <h3
                            class="text-xl font-bold text-[#1C1C1C] mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                            {{ __('frontend.services_page.cards.representation.title') }}
                        </h3>
                        <p class="text-sm text-gray-500 font-cairo leading-relaxed mb-6">
                            {{ __('frontend.services_page.cards.representation.desc') }}
                        </p>
                    </div>

                    <span
                        class="flex items-center gap-2 text-xs font-bold text-[#a41c1c] uppercase tracking-wider opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                        {{ __('frontend.buttons.more_details') ?? 'More Details' }}
                        <span class="material-symbols-outlined text-base rtl:rotate-180">arrow_forward</span>
                    </span>
                </a>

            </div>

            <div class="mt-12 text-center animate-fade-in-up">
                <a href="{{ route('index') }}"
                    class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-cairo font-bold text-sm">
                    <span class="material-symbols-outlined rtl:rotate-180 text-base">arrow_back</span>
                    {{ __('frontend.nav.back_home') }}
                </a>
            </div>
        </div>
    </div>
@endsection
