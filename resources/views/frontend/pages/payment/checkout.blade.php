@extends('frontend.layouts.app')

@section('content')
    <div class="w-full h-[calc(100vh-80px)] lg:h-screen flex flex-col lg:flex-row bg-white font-cairo overflow-hidden"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Background Logo Watermark (Global) -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-[0.02] pointer-events-none z-0">
            <img src="{{ asset('img/logo.png') }}" class="h-[600px] w-auto grayscale">
        </div>

        <!-- Left Side: Form Section -->
        <div class="w-full lg:w-7/12 h-full flex flex-col bg-white relative z-10 shadow-2xl">

            <!-- Back Button -->
            <div class="absolute top-6 left-6 rtl:right-6 rtl:left-auto z-20">
                <a href="{{ route('services.index') }}"
                    class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-bold text-sm">
                    <span class="material-symbols-outlined rtl:rotate-180 text-xl">arrow_back</span>
                    <span>{{ __('frontend.nav.back_home') }}</span>
                </a>
            </div>

            <!-- Form Container -->
            <div class="flex-1 flex flex-col justify-center px-8 lg:px-16 py-8 overflow-y-auto lg:overflow-hidden">
                <div class="max-w-2xl mx-auto w-full">

                    <!-- Header -->
                    <div class="mb-6 text-center lg:text-start">
                        <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                            <span class="h-px w-8 bg-[#a41c1c]"></span>
                            <span
                                class="text-[#a41c1c] font-bold tracking-widest uppercase text-xs">{{ __('consultation_checkout.service_name') ?? 'Consultation' }}</span>
                        </div>
                        <h1 class="text-2xl lg:text-3xl font-black text-[#1C1C1C] mb-1">
                            {{ __('consultation_checkout.form_title') }}</h1>
                        <p class="text-gray-500 font-medium text-sm">{{ __('consultation_checkout.form_subtitle') }}</p>
                    </div>

                    <form id="consultationForm" class="space-y-5">
                        @csrf

                        <!-- Row 1: Name & Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="group relative">
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('consultation_checkout.fields.name') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-300 material-symbols-outlined text-lg pointer-events-none">person</span>
                                    <input type="text" name="name" required
                                        class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border border-gray-100 focus:bg-white focus:border-[#a41c1c]/30 focus:ring-2 focus:ring-[#a41c1c]/10 rounded-lg outline-none transition-all font-bold text-gray-700 text-sm placeholder-gray-300"
                                        placeholder="{{ __('consultation_checkout.fields.name_placeholder') }}">
                                </div>
                            </div>

                            <div class="group relative">
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('consultation_checkout.fields.email') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-300 material-symbols-outlined text-lg pointer-events-none">mail</span>
                                    <input type="email" name="email" required
                                        class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border border-gray-100 focus:bg-white focus:border-[#a41c1c]/30 focus:ring-2 focus:ring-[#a41c1c]/10 rounded-lg outline-none transition-all font-bold text-gray-700 text-sm placeholder-gray-300"
                                        placeholder="example@mail.com">
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: Phone & Topic -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="group relative">
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('consultation_checkout.fields.phone') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-3 rtl:right-3 text-gray-300 material-symbols-outlined text-lg pointer-events-none">call</span>
                                    <input type="tel" name="phone" required dir="ltr"
                                        class="w-full pl-10 rtl:pr-10 rtl:pl-3 pr-3 py-3 bg-gray-50 border border-gray-100 focus:bg-white focus:border-[#a41c1c]/30 focus:ring-2 focus:ring-[#a41c1c]/10 rounded-lg outline-none transition-all font-bold text-gray-700 text-sm placeholder-gray-300 text-left"
                                        placeholder="+966 50 000 0000">
                                </div>
                            </div>

                            <div class="group relative">
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">{{ __('consultation_checkout.fields.topic') }}</label>
                                <input type="text" name="topic"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-100 focus:bg-white focus:border-[#a41c1c]/30 focus:ring-2 focus:ring-[#a41c1c]/10 rounded-lg outline-none transition-all font-bold text-gray-700 text-sm placeholder-gray-300"
                                    placeholder="{{ __('consultation_checkout.fields.topic_placeholder') }}">
                            </div>
                        </div>

                        <div class="h-px bg-gray-100 w-full my-1"></div>

                        <!-- Compact Selectors Grid -->
                        <div class="grid grid-cols-1 gap-6">

                            <!-- Consultation Type -->
                            <div class="space-y-2">
                                <label
                                    class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider">{{ __('consultation_checkout.fields.type') }}</label>
                                <div class="flex flex-row gap-2">
                                    @foreach (['call' => 'call', 'video' => 'videocam', 'office' => 'meeting_room'] as $type => $icon)
                                        <label class="cursor-pointer relative flex-1">
                                            <input type="radio" name="type" value="{{ $type }}"
                                                class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                                            <div
                                                class="py-3 px-1 rounded-lg border border-gray-100 bg-white hover:bg-gray-50 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c] peer-checked:text-white transition-all flex flex-col items-center justify-center gap-1 h-full text-center shadow-sm">
                                                <span
                                                    class="material-symbols-outlined text-2xl text-gray-400 peer-checked:text-white">{{ $icon }}</span>
                                                <span
                                                    class="text-xs font-bold text-gray-500 peer-checked:text-white leading-tight mt-1">{{ __('consultation_checkout.types.' . $type) }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <input type="hidden" name="payment_method" id="paymentMethodInput" value="pay_now">

                        </div>

                        <!-- Mobile Pay Buttons -->
                        <div class="lg:hidden flex flex-col gap-3 mt-4">
                            <button type="button" id="payBtnMobileNow"
                                class="w-full bg-[#a41c1c] text-white py-4 rounded-xl font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-[#a41c1c]/20 hover:shadow-[#a41c1c]/40 transition-all hover:-translate-y-1 relative overflow-hidden group">
                                <span
                                    class="material-symbols-outlined text-lg group-hover:scale-110 transition-transform">credit_card</span>
                                <span>{{ __('frontend.consultation_checkout.payment_method.pay_now') ?? 'دفع الان' }} •
                                    {{ $price }} SAR</span>
                                <span class="spinner hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                            </button>

                            <button type="button" id="payBtnMobileLater"
                                class="w-full bg-white text-gray-800 border-2 border-gray-200 py-4 rounded-xl font-bold text-sm flex items-center justify-center gap-2 transition-all hover:-translate-y-1 hover:border-[#a41c1c] hover:text-[#a41c1c] hover:bg-red-50 relative overflow-hidden group">
                                <span
                                    class="material-symbols-outlined text-lg group-hover:scale-110 transition-transform">schedule</span>
                                <span>{{ __('frontend.consultation_checkout.payment_method.pay_later') ?? 'دفع لاحقا' }}</span>
                                <span class="spinner hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    <svg class="animate-spin h-6 w-6 text-[#a41c1c]" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <!-- Error Message -->
                        <div id="errorMessage"
                            class="hidden p-3 rounded-lg bg-red-50 text-red-600 text-xs font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-base">error</span>
                            <span id="errorText"></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Right Side: Summary Section (Desktop) -->
        <div
            class="hidden lg:flex w-5/12 h-full bg-[#1C1C1C] relative flex-col justify-center px-12 py-12 text-white border-l border-white/5 rtl:border-l-0 rtl:border-r">

            <!-- Abstract Shapes -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#a41c1c]/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-900/10 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2">
                </div>
            </div>

            <div class="relative z-10 w-full max-w-sm mx-auto flex flex-col h-full justify-between py-12">

                <!-- Logo -->
                <div>
                    <div
                        class="w-14 h-14 bg-white/5 rounded-xl flex items-center justify-center mb-6 backdrop-blur-sm border border-white/10">
                        <img src="{{ asset('img/logo.png') }}" class="h-8 w-auto" alt="Logo">
                    </div>
                    <h2 class="text-3xl font-bold mb-3 leading-tight">
                        {{ __('frontend.consultation_checkout.prompt_title') }}
                    </h2>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        {{ __('frontend.consultation_checkout.prompt_subtitle') }}
                    </p>
                </div>

                <!-- Price & Pay -->
                <div class="space-y-6">
                    <!-- Price Card -->
                    <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-xl p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <p class="text-xs text-gray-400 mb-1 uppercase tracking-wider">
                                    {{ __('consultation_checkout.service_name') }}</p>
                                <p class="text-base font-bold text-white">{{ __('consultation_checkout.form_title') }}</p>
                            </div>
                            <div class="p-2 bg-[#a41c1c] rounded-lg shadow-lg shadow-[#a41c1c]/20">
                                <span class="material-symbols-outlined text-white text-lg">gavel</span>
                            </div>
                        </div>
                        <div class="h-px bg-white/10 w-full my-3"></div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-300 text-sm">{{ __('consultation_checkout.payment_title') }}</span>
                            <div class="text-right">
                                <span class="text-3xl font-black text-white tracking-tight">{{ $price }}</span>
                                <span
                                    class="text-[10px] text-gray-400 uppercase ml-1">{{ __('consultation_checkout.currency') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Pay Buttons -->
                    <div class="flex flex-col gap-3">
                        <button type="button" id="payBtnDesktopNow"
                            class="w-full group relative overflow-hidden rounded-xl bg-[#a41c1c] text-white py-4 font-bold text-base shadow-xl shadow-[#a41c1c]/20 hover:shadow-[#a41c1c]/40 transition-all transform hover:-translate-y-1 active:translate-y-0">
                            <div class="relative z-10 flex items-center justify-center gap-3">
                                <span>{{ __('frontend.consultation_checkout.payment_method.pay_now') ?? 'دفع الان' }} •
                                    {{ $price }} SAR</span>
                                <span
                                    class="material-symbols-outlined group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                            </div>
                            <span class="spinner hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </span>
                        </button>

                        <button type="button" id="payBtnDesktopLater"
                            class="w-full group relative overflow-hidden rounded-xl bg-transparent border-2 border-white/20 text-white hover:bg-white/10 hover:border-white py-4 font-bold text-base transition-all transform hover:-translate-y-1 active:translate-y-0 backdrop-blur-sm shadow-sm hover:shadow-xl hover:shadow-white/5">
                            <div class="relative z-10 flex items-center justify-center gap-3">
                                <span>{{ __('frontend.consultation_checkout.payment_method.pay_later') ?? 'دفع لاحقا' }}</span>
                                <span
                                    class="material-symbols-outlined group-hover:scale-110 transition-transform">schedule</span>
                            </div>
                            <span class="spinner hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <div class="flex items-center justify-center gap-2 opacity-50 grayscale">
                        <span class="material-symbols-outlined text-sm">lock</span>
                        <span class="text-[10px] text-gray-400">Secured via Tap Payments</span>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function handlePayment(btnId, paymentMethod) {
                const btn = document.getElementById(btnId);
                const form = document.getElementById('consultationForm');

                // Set payment method
                const paymentMethodInput = document.getElementById('paymentMethodInput');
                if (paymentMethodInput) paymentMethodInput.value = paymentMethod;

                // Check HTML5 validity
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                // UI Feedback
                const originalContentItems = btn.querySelectorAll('span:not(.spinner), div');

                // Disable all buttons to prevent double submission
                const allBtns = document.querySelectorAll('button[id^="payBtn"]');
                allBtns.forEach(b => {
                    b.disabled = true;
                    b.classList.add('opacity-80', 'cursor-wait');
                });

                // Toggle spinner visibility
                const spinner = btn.querySelector('.spinner');

                if (spinner) {
                    spinner.classList.remove('hidden');
                    originalContentItems.forEach(el => el.classList.add('opacity-0'));
                }

                const errorContainer = document.getElementById('errorMessage');
                const errorText = document.getElementById('errorText');
                if (errorContainer) errorContainer.classList.add('hidden');

                const formData = new FormData(form);

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
                            window.location.href = data.redirect_url;
                        } else if (data.success) {
                            window.location.href = "{{ route('consultation.success.later') }}";
                        } else {
                            throw new Error(data.message ||
                                '{{ __('frontend.consultation_checkout.errors.unexpected') }}');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        if (errorText) errorText.textContent = error.message ||
                            '{{ __('frontend.consultation_checkout.errors.connection') }}';
                        if (errorContainer) errorContainer.classList.remove('hidden');

                        // Restore Buttons
                        allBtns.forEach(b => {
                            b.disabled = false;
                            b.classList.remove('opacity-80', 'cursor-wait');
                        });

                        if (spinner) {
                            spinner.classList.add('hidden');
                            originalContentItems.forEach(el => el.classList.remove('opacity-0'));
                        }
                    });
            }

            const buttons = {
                'payBtnDesktopNow': 'pay_now',
                'payBtnDesktopLater': 'pay_later',
                'payBtnMobileNow': 'pay_now',
                'payBtnMobileLater': 'pay_later'
            };

            for (const [btnId, method] of Object.entries(buttons)) {
                const btn = document.getElementById(btnId);
                if (btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        handlePayment(btnId, method);
                    });
                }
            }
        });
    </script>
@endsection
