@extends('frontend.layouts.app')

@section('content')
    <div class="h-screen w-full bg-slate-50 font-cairo flex items-center justify-center p-4" dir="rtl">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden text-center relative">

            <div class="relative z-10 p-8">
                <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="material-symbols-outlined text-red-600 text-5xl">error</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-2">فشلت عملية الدفع</h1>
                <p class="text-gray-500 mb-8">عذراً، لم نتمكن من إتمام عملية الدفع. يرجى المحاولة مرة أخرى أو استخدام بطاقة
                    مختلفة.</p>

                <div class="flex gap-3">
                    <a href="{{ route('consultation') }}"
                        class="flex-1 bg-royal-blue hover:bg-blue-900 text-white font-bold py-3 rounded-xl shadow-lg transition-transform active:scale-95">
                        المحاولة مرة أخرى
                    </a>
                    <a href="{{ route('home') }}"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 rounded-xl transition-colors">
                        إلغاء
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        .bg-royal-blue {
            background-color: #1e3a8a;
        }
    </style>
@endsection
