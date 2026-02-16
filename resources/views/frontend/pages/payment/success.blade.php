@extends('frontend.layouts.app')

@section('content')
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-50 font-cairo overflow-hidden">

        <!-- Confetti Background (CSS based or simple overlay) -->
        <div class="absolute inset-0 pointer-events-none opacity-50"
            style="background-image: radial-gradient(#a41c1c 1px, transparent 1px), radial-gradient(#1e3a8a 1px, transparent 1px); background-size: 20px 20px; background-position: 0 0, 10px 10px;">
        </div>

        <div class="relative z-10 w-full max-w-md p-4">
            <div
                class="bg-white rounded-3xl shadow-2xl p-8 text-center border border-gray-100 transform transition-all hover:scale-[1.01]">

                <div
                    class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-100/50">
                    <span class="material-symbols-outlined text-green-600 text-4xl">check_circle</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 mb-2">تم الدفع بنجاح!</h1>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed">شكراً لك، تم استلام طلب الاستشارة الخاص بك. سيقوم
                    فريقنا بالتواصل معك قريباً.</p>

                <!-- Receipt Card -->
                <div class="bg-gray-50 rounded-2xl p-5 mb-8 border border-gray-100">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs text-gray-400">رقم المعاملة</span>
                        <span class="font-bold text-gray-800 font-mono text-sm">{{ $payment['id'] ?? 'N/A' }}</span>
                    </div>
                    <div class="w-full h-px bg-gray-200 my-2"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-400">المبلغ المدفوع</span>
                        <div class="flex items-baseline gap-1">
                            <span class="font-bold text-[#a41c1c] text-lg">{{ $payment['amount'] ?? '575.00' }}</span>
                            <span class="text-xs font-bold text-gray-400">{{ $payment['currency'] ?? 'SAR' }}</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('home') }}"
                    class="block w-full bg-[#1C1C1C] hover:bg-black text-white font-bold py-4 rounded-xl shadow-lg transition-transform active:scale-[0.98]">
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </div>
@endsection
