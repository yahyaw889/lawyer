@extends('frontend.layouts.app')

@section('content')
    <div class="w-full h-screen flex flex-col lg:flex-row bg-white font-cairo overflow-hidden"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Left Side: Form Section (Scrollable) -->
        <div class="w-full lg:w-2/3 h-full flex flex-col bg-white relative z-10">

            <!-- Back Button (Absolute Top) -->
            <div class="absolute top-0 w-full z-20 px-6 py-4">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 text-gray-400 hover:text-[#a41c1c] transition-colors font-bold text-sm">
                    <span class="material-symbols-outlined rtl:rotate-180 text-xl">arrow_back</span>
                    <span>{{ __('frontend.nav.back_home') }}</span>
                </a>
            </div>

            <!-- Scrollable Form Container -->
            <div class="flex-1 overflow-y-auto custom-scrollbar px-6 py-16 lg:px-20 lg:py-12">
                <div class="max-w-3xl mx-auto w-full">

                    <!-- Header -->
                    <div class="mb-10 pt-4">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="h-px w-8 bg-[#a41c1c]"></span>
                            <span
                                class="text-[#a41c1c] font-bold tracking-widest uppercase text-xs">{{ __('consultation_checkout.service_name') ?? 'Consultation' }}</span>
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-black text-[#1C1C1C] mb-2">
                            {{ __('consultation_checkout.form_title') }}</h1>
                        <p class="text-gray-500 font-medium">{{ __('consultation_checkout.form_subtitle') }}</p>
                    </div>

                    <form id="consultationForm" class="space-y-8">
                        @csrf

                        <!-- Personal Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="group md:col-span-2">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.name') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-4 rtl:right-4 text-gray-400 material-symbols-outlined text-lg">person</span>
                                    <input type="text" name="name" required
                                        class="w-full pl-12 rtl:pr-12 rtl:pl-4 pr-4 py-4 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-bold text-gray-700 placeholder-gray-300"
                                        placeholder="{{ __('consultation_checkout.fields.name_placeholder') }}">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="group">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.email') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-4 rtl:right-4 text-gray-400 material-symbols-outlined text-lg">mail</span>
                                    <input type="email" name="email" required
                                        class="w-full pl-12 rtl:pr-12 rtl:pl-4 pr-4 py-4 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-bold text-gray-700 placeholder-gray-300"
                                        placeholder="example@mail.com">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="group">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.phone') }}</label>
                                <div class="relative">
                                    <span
                                        class="absolute top-1/2 -translate-y-1/2 left-4 rtl:right-4 text-gray-400 material-symbols-outlined text-lg">call</span>
                                    <input type="tel" name="phone" required dir="ltr"
                                        class="w-full pl-12 rtl:pr-12 rtl:pl-4 pr-4 py-4 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-bold text-gray-700 placeholder-gray-300 text-left"
                                        placeholder="+966 50 000 0000">
                                </div>
                            </div>
                        </div>

                        <!-- Consultation Type -->
                        <div class="space-y-3">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider">{{ __('consultation_checkout.fields.type') }}</label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                @foreach (['call' => 'call', 'video' => 'videocam', 'office' => 'meeting_room'] as $type => $icon)
                                    <label class="cursor-pointer relative group">
                                        <input type="radio" name="type" value="{{ $type }}"
                                            class="peer sr-only" {{ $loop->first ? 'required' : '' }}>
                                        <div
                                            class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gray-100 peer-checked:bg-[#a41c1c] peer-checked:text-white flex items-center justify-center text-gray-400 transition-colors">
                                                <span class="material-symbols-outlined text-xl">{{ $icon }}</span>
                                            </div>
                                            <span
                                                class="text-sm font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('consultation_checkout.types.' . $type) }}</span>
                                        </div>
                                        <div
                                            class="absolute top-1/2 -translate-y-1/2 right-4 rtl:left-4 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                            <span class="material-symbols-outlined text-lg">check_circle</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Topic -->
                        <div class="group">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">{{ __('consultation_checkout.fields.topic') }}</label>
                            <textarea name="topic" rows="3"
                                class="w-full px-4 py-4 bg-gray-50 border-2 border-transparent focus:bg-white focus:border-[#a41c1c]/20 focus:ring-4 focus:ring-[#a41c1c]/5 rounded-xl outline-none transition-all font-bold text-gray-700 placeholder-gray-300 resize-none"
                                placeholder="{{ __('consultation_checkout.fields.topic_placeholder') }}"></textarea>
                        </div>

                        <!-- Payment Method -->
                        <div class="space-y-3">
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase tracking-wider">{{ __('frontend.consultation_checkout.payment_method.title') }}</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{-- Pay Now --}}
                                <label class="cursor-pointer relative group">
                                    <input type="radio" name="payment_method" value="pay_now" class="peer sr-only"
                                        checked>
                                    <div
                                        class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all flex items-center gap-3 h-full">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-100 peer-checked:bg-[#a41c1c] peer-checked:text-white flex items-center justify-center text-gray-400 transition-colors">
                                            <span class="material-symbols-outlined text-xl">credit_card</span>
                                        </div>
                                        <span
                                            class="text-sm font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.consultation_checkout.payment_method.pay_now') }}</span>
                                    </div>
                                    <div
                                        class="absolute top-1/2 -translate-y-1/2 right-4 rtl:left-4 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                        <span class="material-symbols-outlined text-lg">check_circle</span>
                                    </div>
                                </label>

                                {{-- Pay Later --}}
                                <label class="cursor-pointer relative group">
                                    <input type="radio" name="payment_method" value="pay_later" class="peer sr-only">
                                    <div
                                        class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gray-200 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all flex items-center gap-3 h-full">
                                        <div
                                            class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-100 peer-checked:bg-[#a41c1c] peer-checked:text-white flex items-center justify-center text-gray-400 transition-colors">
                                            <span class="material-symbols-outlined text-xl">schedule</span>
                                        </div>
                                        <span
                                            class="text-sm font-bold text-gray-600 peer-checked:text-[#a41c1c]">{{ __('frontend.consultation_checkout.payment_method.pay_later') }}</span>
                                    </div>
                                    <div
                                        class="absolute top-1/2 -translate-y-1/2 right-4 rtl:left-4 opacity-0 peer-checked:opacity-100 transition-opacity text-[#a41c1c]">
                                        <span class="material-symbols-outlined text-lg">check_circle</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Mobile Pay Button (Visible only on small screens) -->
                        <div class="lg:hidden pt-4">
                            <button type="button" id="payBtnMobile"
                                class="w-full bg-[#1C1C1C] text-white py-4 rounded-xl font-bold flex items-center justify-center gap-2">
                                <span>{{ __('consultation_checkout.pay_button') }} • {{ $price }} SAR</span>
                            </button>
                        </div>

                        <!-- Error Message Container (Placed near button on mobile, or bottom of form on desktop) -->
                        <div id="errorMessage"
                            class="hidden p-4 rounded-xl bg-red-50 text-red-600 text-sm font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">error</span>
                            <span id="errorText"></span>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Right Side: Summary Section (Fixed Desktop) -->
        <div
            class="hidden lg:flex w-1/3 h-full bg-[#1C1C1C] relative flex-col justify-center p-12 overflow-hidden text-white border-l border-white/5 rtl:border-l-0 rtl:border-r">

            <!-- Abstract Shapes -->
            <div class="absolute inset-0 z-0">
                <div
                    class="absolute top-0 right-0 w-[400px] h-[400px] bg-[#a41c1c]/20 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-blue-900/20 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/2">
                </div>
            </div>

            <div class="relative z-10 w-full max-w-sm mx-auto flex flex-col h-full justify-center">

                <div class="mb-auto pt-12">
                    <div
                        class="w-16 h-16 bg-white/5 rounded-2xl flex items-center justify-center mb-6 backdrop-blur-sm border border-white/10">
                        <img src="{{ asset('img/logo.png') }}" class="h-10 w-auto" alt="Logo">
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold mb-2 leading-tight">
                        {{ __('frontend.consultation_checkout.prompt_title') }}
                    </h2>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        {{ __('frontend.consultation_checkout.prompt_subtitle') }}
                    </p>
                </div>

                <!-- Price Card -->
                <div
                    class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 mb-8 group hover:bg-white/10 transition-colors">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-sm text-gray-400 mb-1">{{ __('consultation_checkout.service_name') }}</p>
                            <p class="text-lg font-bold text-white">{{ __('consultation_checkout.form_title') }}</p>
                        </div>
                        <div class="p-2 bg-[#a41c1c] rounded-lg">
                            <span class="material-symbols-outlined text-white text-xl">gavel</span>
                        </div>
                    </div>
                    <div class="h-px bg-white/10 w-full my-4"></div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300">{{ __('consultation_checkout.payment_title') }}</span>
                        <div class="text-right">
                            <div class="flex items-baseline gap-1 justify-end">
                                <span class="text-3xl font-bold text-white">{{ $price }}</span>
                                <span class="text-xs text-gray-400">{{ __('consultation_checkout.currency') }}</span>
                            </div>
                            <p class="text-[10px] text-gray-500 mt-1">{{ __('consultation_checkout.secure_payment') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Pay Button (Desktop) -->
                <button type="button" id="payBtnDesktop"
                    class="w-full group relative overflow-hidden rounded-xl bg-[#a41c1c] text-white py-5 font-bold text-lg shadow-xl shadow-[#a41c1c]/20 hover:shadow-[#a41c1c]/40 transition-all transform hover:-translate-y-1 active:translate-y-0">
                    <div class="relative z-10 flex items-center justify-center gap-3">
                        <span>{{ __('consultation_checkout.pay_button') }}</span>
                        <span
                            class="material-symbols-outlined group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">arrow_forward</span>
                    </div>
                    <span id="btnSpinnerDesktop"
                        class="hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-spin h-6 w-6 border-2 border-white border-t-transparent rounded-full"></span>
                </button>

                <div class="mt-auto pb-8 flex items-center justify-center gap-4 opacity-40 grayscale pointer-events-none">
                    <span class="text-xs text-gray-500">Powered by Tap Payments & SSL Secure</span>
                </div>
            </div>
        </div>

    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #f3f4f6;
            border-radius: 20px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #e5e7eb;
        }
    </style>

    <script>
        function handlePayment(btnId) {
            const btn = document.getElementById(btnId);
            const form = document.getElementById('consultationForm');

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // UI Feedback
            const originalContent = btn.innerHTML;
            btn.disabled = true;
            btn.classList.add('opacity-80', 'cursor-not-allowed');

            // Toggle spinner visibility if it exists within the button structure
            const spinner = btn.querySelector('.animate-spin.absolute');
            const content = btn.querySelector('.relative.z-10');

            if (spinner && content) {
                spinner.classList.remove('hidden');
                content.classList.add('opacity-0');
            } else {
                // Fallback for mobile button or if structure differs
                btn.innerHTML =
                    '<span class="animate-spin h-6 w-6 border-2 border-white border-t-transparent rounded-full"></span>';
            }

            const errorContainer = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            errorContainer.classList.add('hidden');

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
                    } else {
                        throw new Error(data.message ||
                            '{{ __('frontend.consultation_checkout.errors.unexpected') }}');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    errorText.textContent = error.message ||
                        '{{ __('frontend.consultation_checkout.errors.connection') }}';
                    errorContainer.classList.remove('hidden');

                    // Restore Button
                    btn.disabled = false;
                    btn.classList.remove('opacity-80', 'cursor-not-allowed');

                    if (spinner && content) {
                        spinner.classList.add('hidden');
                        content.classList.remove('opacity-0');
                    } else {
                        btn.innerHTML = originalContent;
                    }
                });
        }

        document.getElementById('payBtnDesktop').addEventListener('click', () => handlePayment('payBtnDesktop'));
        document.getElementById('payBtnMobile').addEventListener('click', () => handlePayment('payBtnMobile'));
    </script>
@endsection
