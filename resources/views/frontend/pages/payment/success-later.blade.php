@extends('frontend.layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 font-cairo"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl relative overflow-hidden">

            <!-- Success Icon -->
            <div class="flex justify-center">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mb-6 animate-bounce">
                    <span class="material-symbols-outlined text-6xl text-green-600">check_circle</span>
                </div>
            </div>

            <!-- Content -->
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                    {{ __('frontend.messages.request_sent_successfully') }}
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    {{ app()->getLocale() == 'ar' ? 'تم استلام طلبك بنجاح. سنقوم بمراجعة الطلب والتواصل معك قريباً لإتمام إجراءات الدفع وترتيب الموعد.' : 'Your request has been received successfully. We will review it and contact you shortly to finalize payment and schedule the appointment.' }}
                </p>

                <div class="mt-8 bg-blue-50 p-4 rounded-xl border border-blue-100">
                    <div class="flex items-center gap-3 text-blue-800">
                        <span class="material-symbols-outlined">info</span>
                        <p class="text-sm font-bold text-start">
                            {{ app()->getLocale() == 'ar' ? 'سيصلك إشعار عبر واتساب أو البريد الإلكتروني بتفاصيل الحساب البنكي.' : 'You will receive a notification via WhatsApp or Email with bank account details.' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="mt-8">
                <a href="{{ route('home') }}"
                    class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-medium rounded-xl text-white bg-[#a41c1c] hover:bg-[#8a1818] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#a41c1c] transition-colors shadow-lg shadow-[#a41c1c]/30">
                    {{ __('frontend.nav.back_home') }}
                </a>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-[#a41c1c]/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-[#a41c1c]/5 rounded-full blur-3xl"></div>
        </div>
    </div>
@endsection
