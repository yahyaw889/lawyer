@extends('frontend.layouts.app')

@section('content')
    <div class="relative my-5 flex flex-col items-center justify-center bg-white overflow-hidden font-cairo"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Background Logo Watermark -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-[0.03] pointer-events-none">
            <img src="{{ asset('img/logo.png') }}" alt="" class="h-[800px] w-auto grayscale">
        </div>

        <!-- Main Container -->
        <div class="container mx-auto px-6 relative z-10 h-full flex flex-col justify-center">

            {{-- Back Button --}}
            <div class="absolute top-0 w-full flex justify-start pt-4 animate-fade-in-down z-20">
                <a href="{{ route('services.index') }}"
                    class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-bold text-sm">
                    <span class="material-symbols-outlined rtl:rotate-180 text-base">arrow_back</span>
                    {{ __('frontend.nav.back_home') }}
                </a>
            </div>

            {{-- Header --}}
            <div class="text-center mb-4 animate-fade-in-down pt-12">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                    <span
                        class="text-[#a41c1c] font-bold tracking-widest uppercase text-sm font-cairo shadow-gray-400">{{ __('frontend.services_page.cards.attestation.title') }}</span>
                    <span class="h-px w-12 bg-[#a41c1c]"></span>
                </div>
                <h1 class="text-4xl md:text-5xl font-black text-[#1C1C1C] mb-4 leading-tight">
                    {{ __('document_attestation.title') }}
                </h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto w-full items-center">

                {{-- Left Side: Details & Action --}}
                <div class="flex flex-col space-y-8 animate-fade-in-left">

                    <div
                        class="bg-white border-l-4 rtl:border-l-0 rtl:border-r-4 border-[#a41c1c] pl-6 rtl:pl-0 rtl:pr-6 py-2 shadow-sm rounded-r-lg rtl:rounded-r-none rtl:rounded-l-lg">
                        <p class="text-gray-600 text-lg leading-loose text-justify">
                            {{ __('document_attestation.description') }}
                        </p>
                    </div>

                    {{-- Duration & Requirements --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Duration Highlight --}}
                        <div
                            class="flex items-center gap-4 bg-gray-50 p-6 rounded-xl border border-gray-100 hover:border-[#a41c1c]/20 transition-colors">
                            <div
                                class="w-12 h-12 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                                <span class="material-symbols-outlined text-2xl">schedule</span>
                            </div>
                            <div>
                                <span
                                    class="block text-xs uppercase tracking-wider text-gray-500 font-bold mb-1">{{ __('document_attestation.duration_label') }}</span>
                                <span
                                    class="text-lg font-bold text-[#1C1C1C]">{{ __('document_attestation.duration') }}</span>
                            </div>
                        </div>

                        {{-- Requirements Highlight --}}
                        <div
                            class="flex items-center gap-4 bg-gray-50 p-6 rounded-xl border border-gray-100 hover:border-[#a41c1c]/20 transition-colors">
                            <div
                                class="w-12 h-12 bg-[#a41c1c]/10 rounded-full flex items-center justify-center text-[#a41c1c]">
                                <span class="material-symbols-outlined text-2xl">attach_file</span>
                            </div>
                            <div>
                                <span
                                    class="block text-xs uppercase tracking-wider text-gray-500 font-bold mb-1">{{ __('document_attestation.requirements_title') }}</span>
                                <ul class="text-sm font-bold text-[#1C1C1C]">
                                    @foreach (__('document_attestation.requirements') as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>


                    {{-- Action Button --}}
                    <div class="pt-4">
                        <a href="{{ route('request') }}?service=document_attestation"
                            class="group relative w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-[#1C1C1C] text-white px-8 py-5 rounded-xl font-bold text-lg overflow-hidden transition-all hover:bg-[#a41c1c] hover:shadow-xl hover:shadow-[#a41c1c]/20 hover:-translate-y-1">
                            <span class="z-10">{{ __('document_attestation.request_button') }}</span>
                            <span
                                class="material-symbols-outlined z-10 rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>

                {{-- Right Side: Features List --}}
                <div
                    class="bg-gray-50 p-10 rounded-2xl border border-gray-100 shadow-lg animate-fade-in-up relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-[#a41c1c]/5 rounded-bl-full -mr-10 -mt-10 transition-transform group-hover:scale-110">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-24 h-24 bg-[#1C1C1C]/5 rounded-tr-full -ml-8 -mb-8 transition-transform group-hover:scale-110">
                    </div>

                    <h3 class="text-2xl font-bold text-[#1C1C1C] mb-8 flex items-center gap-3 relative z-10">
                        <span class="material-symbols-outlined text-[#a41c1c]">verified</span>
                        {{ __('document_attestation.services_title') }}
                    </h3>

                    <ul class="space-y-2 relative z-10">
                        @foreach (__('document_attestation.services') as $service)
                            <li
                                class="flex items-start gap-3 bg-white p-4 rounded-lg border border-gray-100 shadow-sm hover:border-[#a41c1c]/30 hover:shadow-md transition-all">
                                <div
                                    class="mt-1 w-6 h-6 rounded-full bg-[#a41c1c]/10 flex items-center justify-center text-[#a41c1c] shrink-0">
                                    <span class="material-symbols-outlined text-sm">check</span>
                                </div>
                                <span class="text-gray-700 font-bold text-base leading-relaxed">{{ $service }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
