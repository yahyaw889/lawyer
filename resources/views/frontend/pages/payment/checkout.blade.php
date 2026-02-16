@extends('frontend.layouts.app')

@section('content')
    <div class="fixed inset-0 z-50 flex flex-col lg:flex-row bg-white font-cairo" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        
        <!-- Left Side: Form Section -->
        <div class="w-full lg:w-1/2 h-full flex flex-col bg-white relative z-10">
            <!-- Header (Mobile/Desktop) -->
            <div class="px-6 py-4 flex items-center justify-between border-b border-gray-50">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-500 hover:text-[#a41c1c] transition-colors">
                    <span class="material-symbols-outlined rtl:rotate-180">arrow_back</span>
                    <span class="text-sm font-bold">{{ __('frontend.nav.back_home') }}</span>
                </a>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8 w-auto">
            </div>

            <!-- Scrollable Form Container -->
            <div class="flex-1 overflow-y-auto custom-scrollbar px-6 py-4 lg:px-12 lg:py-8">
                <div class="max-w-lg mx-auto w-full">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ __('consultation_checkout.form_title') }}</h1>
                    <p class="text-gray-500 text-sm mb-8">{{ __('consultation_checkout.form_subtitle') }}</p>

                    <form id="consultationForm" class="space-y-5">
                        @csrf
                        
                        <!-- Name -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.name') }}</label>
                            <div class="relative">
                                <span class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-400 material-symbols-outlined text-lg">person</span>
                                <input type="text" name="name" required 
                                    class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-semibold text-gray-700 placeholder-gray-300"
                                    placeholder="{{ __('consultation_checkout.fields.name_placeholder') }}">
                            </div>
                        </div>

                        <!-- Email & Phone Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.email') }}</label>
                                <div class="relative">
                                    <span class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-400 material-symbols-outlined text-lg">mail</span>
                                    <input type="email" name="email" required 
                                        class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-semibold text-gray-700 placeholder-gray-300"
                                        placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="group">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.phone') }}</label>
                                <div class="relative">
                                    <span class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-400 material-symbols-outlined text-lg">call</span>
                                    <input type="tel" name="phone" required dir="ltr"
                                        class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-semibold text-gray-700 placeholder-gray-300 text-left"
                                        placeholder="+966 50 000 0000">
                                </div>
                            </div>
                        </div>

                        <!-- Consultation Type -->
                        <div class="space-y-3">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider">{{ __('consultation_checkout.fields.type') }}</label>
                            <div class="grid grid-cols-3 gap-3">
                                <!-- Call -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="call" class="peer sr-only" required>
                                    <div class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center h-full flex flex-col items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-2xl text-gray-400 peer-checked:text-[#a41c1c] transition-colors">call</span>
                                        <span class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('consultation_checkout.types.call') }}</span>
                                    </div>
                                    <div class="absolute top-2 right-2 rtl:left-2 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                    </div>
                                </label>

                                <!-- Video -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="video" class="peer sr-only">
                                    <div class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center h-full flex flex-col items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-2xl text-gray-400 peer-checked:text-[#a41c1c] transition-colors">videocam</span>
                                        <span class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('consultation_checkout.types.video') }}</span>
                                    </div>
                                    <div class="absolute top-2 right-2 rtl:left-2 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                    </div>
                                </label>

                                <!-- Office -->
                                <label class="cursor-pointer relative">
                                    <input type="radio" name="type" value="office" class="peer sr-only">
                                    <div class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center h-full flex flex-col items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-2xl text-gray-400 peer-checked:text-[#a41c1c] transition-colors">meeting_room</span>
                                        <span class="text-xs font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('consultation_checkout.types.office') }}</span>
                                    </div>
                                    <div class="absolute top-2 right-2 rtl:left-2 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Topic -->
                        <div class="group">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.topic') }}</label>
                            <textarea name="topic" rows="3" 
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-semibold text-gray-700 placeholder-gray-300 resize-none"
                                placeholder="{{ __('consultation_checkout.fields.topic_placeholder') }}"></textarea>
                        </div>

                        <!-- Error Message Container -->
                        <div id="errorMessage" class="hidden p-4 rounded-xl bg-red-50 text-red-600 text-sm font-bold flex items-center gap-2">
                             <span class="material-symbols-outlined text-lg">error</span>
                             <span id="errorText"></span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer / Action Area -->
            <div class="p-6 lg:p-8 border-t border-gray-50 bg-white">
                <div class="max-w-lg mx-auto w-full">
                    <button type="button" id="payBtn"
                        class="w-full relative group overflow-hidden rounded-2xl bg-[#a41c1c] text-white p-4 font-bold text-lg shadow-xl shadow-[#a41c1c]/20 hover:shadow-[#a41c1c]/40 transition-all transform active:scale-[0.98]">
                        <div class="relative z-10 flex items-center justify-center gap-3">
                            <span id="btnText">{{ __('consultation_checkout.pay_button') }} • {{ $price }} SAR</span>
                            <span id="btnSpinner" class="hidden animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                    </button>
                    <p class="text-center text-gray-400 text-xs mt-4 flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">lock_open</span>
                        {{ __('consultation_checkout.secure_payment') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side: Visual/Summary (Desktop Only, or collapse on mobile) -->
        <div class="hidden lg:flex w-1/2 h-full bg-[#1C1C1C] relative overflow-hidden items-center justify-center p-12 text-white">
            
            <!-- Abstract Background -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#a41c1c]/20 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-900/20 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 max-w-md w-full">
                <div class="mb-12">
                    <h2 class="text-4xl font-bold mb-4 leading-tight">استشارة قانونية<br><span class="text-[#a41c1c]">موثوقة وسريعة</span></h2>
                    <p class="text-gray-400 text-lg leading-relaxed">نحن هنا لتقديم الدعم القانوني الذي تحتاجه. املأ النموذج وسنقوم بتوجيهك إلى بوابة الدفع الآمنة، لنبدأ بالعمل على قضيتك فوراً.</p>
                </div>

                <!-- Summary Card -->
                <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6 pb-6 border-b border-white/10">
                        <div>
                            <p class="text-sm text-gray-400 mb-1">{{ __('consultation_checkout.service_name') }}</p>
                            <p class="text-xl font-bold">{{ __('consultation_checkout.form_title') }}</p>
                        </div>
                        <div class="w-12 h-12 bg-[#a41c1c] rounded-full flex items-center justify-center shadow-lg shadow-[#a41c1c]/30">
                            <span class="material-symbols-outlined text-2xl">gavel</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300">{{ __('consultation_checkout.payment_title') }}</span>
                        <div class="flex items-baseline gap-1">
                            <span class="text-3xl font-bold">{{ $price }}</span>
                            <span class="text-sm font-medium text-gray-400">{{ __('consultation_checkout.currency') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Trust Badges -->
                <div class="mt-8 flex items-center gap-6 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                     <!-- Add Payment Icons SVGs here if needed, or keeping it clean -->
                     <span class="text-xs text-gray-500">Powered by Tap Payments</span>
                </div>
            </div>
        </div>

    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 20px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
    </style>

    <script>
        document.getElementById('payBtn').addEventListener('click', function() {
            const form = document.getElementById('consultationForm');
            
            // Basic Validation
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const btn = this;
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const errorContainer = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');

            // Set Loading State
            btn.disabled = true;
            btn.classList.add('opacity-80', 'cursor-not-allowed');
            btnText.classList.add('opacity-0'); // Hide text but keep width
            btnSpinner.classList.remove('hidden');
            errorContainer.classList.add('hidden');

            // Prepare Data
            const formData = new FormData(form);

            // AJAX Request
            fetch('{{ route('consultation.submit') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirect_url) {
                    // Redirect to Tap
                    window.location.href = data.redirect_url;
                } else {
                    throw new Error(data.message || 'حدث خطأ غير متوقع');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Show Error
                errorText.textContent = error.message || 'فشلت عملية الاتصال، يرجى المحاولة مرة أخرى.';
                errorContainer.classList.remove('hidden');

                // Reset Button
                btn.disabled = false;
                btn.classList.remove('opacity-80', 'cursor-not-allowed');
                btnText.classList.remove('opacity-0');
                btnSpinner.classList.add('hidden');
            });
        });
    </script>
@endsection
