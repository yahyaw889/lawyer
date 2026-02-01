@extends('frontend.layouts.app')

@section('content')
    <div class="h-screen bg-royal-blue text-white flex items-center justify-center p-8 overflow-hidden relative">
        <!-- Background Element -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-white/5 skew-x-12 translate-x-32"></div>

        <div class="max-w-4xl text-center relative z-10">
            <!-- Badge -->
            <div
                class="inline-flex items-center gap-2 mb-8 border border-gold-accent/30 px-4 py-2 rounded-full bg-royal-blue/50 backdrop-blur-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-gold-accent animate-pulse"></span>
                <span class="text-xs tracking-[0.2em] uppercase font-bold text-gold-accent">Legal Excellence</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                نجمع بين <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-600">الخبرة
                    العميقة</span><br>
                والابتكار المهني
            </h1>

            <p class="text-lg md:text-xl text-gray-300 leading-relaxed max-w-2xl mx-auto mb-12">
                شركة التميمي ومشاركوه للمحاماة والاستشارات القانونية، شريككم الموثوق في المملكة. نقدم حلولاً قانونية متكاملة
                تتماشى مع رؤية المملكة، مع التركيز على الجودة، السرعة، والأمان لحماية مصالح عملائنا وتنمية أعمالهم.
            </p>

            <!-- Stats -->
            <div class="flex justify-center gap-16 border-t border-white/10 pt-8">
                <div>
                    <p class="text-5xl font-bold text-white mb-2">+15</p>
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-wider">عاماً من الخبرة</p>
                </div>
                <div>
                    <p class="text-5xl font-bold text-white mb-2">500+</p>
                    <p class="text-sm font-bold text-gray-400 uppercase tracking-wider">قضية ناجحة</p>
                </div>
            </div>

            <div class="mt-12">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 text-gold-accent hover:text-white transition-colors">
                    <span class="material-symbols-outlined">arrow_forward</span>
                    عودة للرئيسية
                </a>
            </div>
        </div>
    </div>
@endsection
