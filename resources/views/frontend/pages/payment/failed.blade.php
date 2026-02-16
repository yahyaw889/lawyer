@extends('frontend.layouts.app')

@section('content')
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-50 font-cairo overflow-hidden">

        <div class="relative z-10 w-full max-w-md p-4">
            <div class="bg-white rounded-3xl shadow-2xl p-8 text-center border border-gray-100">

                <div
                    class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg shadow-red-50/50">
                    <span class="material-symbols-outlined text-red-600 text-4xl">error</span>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 mb-2">فشلت عملية الدفع</h1>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed">عذراً، لم نتمكن من إتمام عملية الدفع. يرجى التأكد من
                    بيانات البطاقة والمحاولة مرة أخرى.</p>

                <div class="flex flex-col gap-3">
                    <a href="{{ route('consultation') }}"
                        class="w-full bg-[#a41c1c] hover:bg-[#8a1818] text-white font-bold py-3.5 rounded-xl shadow-lg shadow-[#a41c1c]/20 transition-transform active:scale-[0.98]">
                        المحاولة مرة أخرى
                    </a>

                    <a href="{{ route('home') }}"
                        class="w-full bg-white hover:bg-gray-50 text-gray-600 font-bold py-3.5 rounded-xl border border-gray-200 transition-colors">
                        إلغاء والعودة
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
