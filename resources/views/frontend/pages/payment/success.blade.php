@extends('frontend.layouts.app')

@section('content')
    <div class="h-screen w-full bg-slate-50 font-cairo flex items-center justify-center p-4" dir="rtl">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden text-center relative">

            <!-- Confetti/Success Animation Background -->
            <div
                class="absolute inset-0 z-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/confetti.png')]">
            </div>

            <div class="relative z-10 p-8">
                <div
                    class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                    <span class="material-symbols-outlined text-green-600 text-5xl">check_circle</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-2">تم الدفع بنجاح!</h1>
                <p class="text-gray-500 mb-8">شكراً لك، تم استلام طلب الاستشارة الخاص بك بنجاح. سيتواصل معك أحد مستشارينا
                    قريباً.</p>

                <div class="bg-gray-50 rounded-xl p-4 mb-8 text-right">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-500 text-xs">رقم المعاملة</span>
                        <span class="font-bold text-gray-800 text-sm">{{ $payment['id'] ?? 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500 text-xs">المبلغ المدفوع</span>
                        <span class="font-bold text-royal-blue text-sm">{{ $payment['amount'] ?? '575.00' }}
                            {{ $payment['currency'] ?? 'SAR' }}</span>
                    </div>
                </div>

                <a href="{{ route('home') }}"
                    class="block w-full bg-royal-blue hover:bg-blue-900 text-white font-bold py-4 rounded-xl shadow-lg transition-transform active:scale-95">
                    عودة للصفحة الرئيسية
                </a>
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

        .text-royal-blue {
            color: #1e3a8a;
        }
    </style>
@endsection
