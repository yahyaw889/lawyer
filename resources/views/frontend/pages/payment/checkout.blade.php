@extends('frontend.layouts.app')

@section('content')
    <div class="fixed inset-0 bg-gradient-to-br from-[#fafafa] via-white to-[#f5f0f0] font-cairo overflow-hidden"
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Subtle Background Pattern -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div
                class="absolute top-0 left-1/2 w-[800px] h-[800px] -translate-x-1/2 -translate-y-1/2 bg-[#a41c1c]/[0.03] rounded-full blur-3xl">
            </div>
            <div
                class="absolute bottom-0 right-0 w-[400px] h-[400px] translate-x-1/4 translate-y-1/4 bg-[#a41c1c]/[0.02] rounded-full blur-3xl">
            </div>
        </div>

        <!-- Full-Height Layout -->
        <div class="relative z-10 h-full flex flex-col">

            <!-- Compact Header -->
            <header
                class="shrink-0 px-4 md:px-6 py-3 flex justify-between items-center border-b border-gray-100/80 bg-white/60 backdrop-blur-sm">
                <a href="{{ route('consultation-request') }}"
                    class="group flex items-center gap-1.5 text-[#a41c1c] font-bold text-sm hover:text-[#8a1818] transition-colors">
                    <span
                        class="material-symbols-outlined text-lg rtl:rotate-180 group-hover:-translate-x-0.5 rtl:group-hover:translate-x-0.5 transition-transform">arrow_back</span>
                    <span>{{ __('frontend.nav.back_home') }}</span>
                </a>
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-green-600 text-sm">lock</span>
                    <span
                        class="text-xs text-gray-400 font-semibold">{{ __('consultation_checkout.secure_payment') }}</span>
                </div>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8 w-auto hidden md:block">
            </header>

            <!-- Main Content - Fills remaining space -->
            <main class="flex-1 flex items-center justify-center px-3 md:px-6 py-3 overflow-hidden">
                <div
                    class="w-full max-w-[1100px] grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-6 h-full max-h-[calc(100vh-80px)]">

                    <!-- LEFT: Request Form (Compact) -->
                    <div class="lg:col-span-5 flex flex-col min-h-0">
                        <div
                            class="bg-white rounded-xl shadow-sm border border-gray-100 flex flex-col flex-1 min-h-0 overflow-hidden">
                            <!-- Header -->
                            <div class="shrink-0 bg-[#1C1C1C] px-4 py-3 flex items-center gap-2.5">
                                <div class="w-7 h-7 bg-white/10 rounded-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-sm">assignment</span>
                                </div>
                                <div>
                                    <h2 class="text-white font-bold text-sm">{{ __('consultation_checkout.form_title') }}
                                    </h2>
                                    <p class="text-gray-400 text-[10px]">{{ __('consultation_checkout.form_subtitle') }}</p>
                                </div>
                            </div>

                            <!-- Form Content -->
                            <div class="flex-1 overflow-y-auto p-4 space-y-3" id="formContent">
                                <form id="consultationForm">
                                    @csrf

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label
                                            class="block text-[10px] font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('consultation_checkout.fields.name') }}</label>
                                        <input type="text" name="name" required id="inp_name"
                                            class="w-full px-3 py-2 bg-gray-50/80 border border-gray-200 rounded-lg focus:bg-white focus:border-[#a41c1c] focus:ring-1 focus:ring-[#a41c1c]/10 outline-none transition-all text-sm"
                                            placeholder="{{ __('consultation_checkout.fields.name_placeholder') }}">
                                    </div>

                                    <!-- Email & Phone -->
                                    <div class="grid grid-cols-2 gap-3 mb-3">
                                        <div>
                                            <label
                                                class="block text-[10px] font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('consultation_checkout.fields.email') }}</label>
                                            <input type="email" name="email" required id="inp_email"
                                                class="w-full px-3 py-2 bg-gray-50/80 border border-gray-200 rounded-lg focus:bg-white focus:border-[#a41c1c] focus:ring-1 focus:ring-[#a41c1c]/10 outline-none transition-all text-sm"
                                                placeholder="{{ __('consultation_checkout.fields.email_placeholder') }}">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-[10px] font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('consultation_checkout.fields.phone') }}</label>
                                            <input type="tel" name="phone" required dir="ltr" id="inp_phone"
                                                class="w-full px-3 py-2 bg-gray-50/80 border border-gray-200 rounded-lg focus:bg-white focus:border-[#a41c1c] focus:ring-1 focus:ring-[#a41c1c]/10 outline-none transition-all text-sm text-left"
                                                placeholder="{{ __('consultation_checkout.fields.phone_placeholder') }}">
                                        </div>
                                    </div>

                                    <!-- Consultation Type (Compact) -->
                                    <div class="mb-3">
                                        <label
                                            class="block text-[10px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">{{ __('consultation_checkout.fields.type') }}</label>
                                        <div class="grid grid-cols-3 gap-2">
                                            <label class="cursor-pointer">
                                                <input type="radio" name="type" value="call" class="peer sr-only"
                                                    required>
                                                <div
                                                    class="py-2 px-1 rounded-lg border border-gray-200 bg-gray-50/80 hover:border-[#a41c1c]/30 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-gray-400 peer-checked:text-[#a41c1c] block mx-auto">call</span>
                                                    <span
                                                        class="text-[10px] font-bold text-gray-500 block mt-0.5">{{ __('consultation_checkout.types.call') }}</span>
                                                </div>
                                            </label>
                                            <label class="cursor-pointer">
                                                <input type="radio" name="type" value="video" class="peer sr-only">
                                                <div
                                                    class="py-2 px-1 rounded-lg border border-gray-200 bg-gray-50/80 hover:border-[#a41c1c]/30 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-gray-400 peer-checked:text-[#a41c1c] block mx-auto">videocam</span>
                                                    <span
                                                        class="text-[10px] font-bold text-gray-500 block mt-0.5">{{ __('consultation_checkout.types.video') }}</span>
                                                </div>
                                            </label>
                                            <label class="cursor-pointer">
                                                <input type="radio" name="type" value="office" class="peer sr-only">
                                                <div
                                                    class="py-2 px-1 rounded-lg border border-gray-200 bg-gray-50/80 hover:border-[#a41c1c]/30 peer-checked:border-[#a41c1c] peer-checked:bg-[#a41c1c]/5 transition-all text-center">
                                                    <span
                                                        class="material-symbols-outlined text-lg text-gray-400 peer-checked:text-[#a41c1c] block mx-auto">meeting_room</span>
                                                    <span
                                                        class="text-[10px] font-bold text-gray-500 block mt-0.5">{{ __('consultation_checkout.types.office') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Topic -->
                                    <div>
                                        <label
                                            class="block text-[10px] font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('consultation_checkout.fields.topic') }}</label>
                                        <textarea name="topic" rows="2" id="inp_topic"
                                            class="w-full px-3 py-2 bg-gray-50/80 border border-gray-200 rounded-lg focus:bg-white focus:border-[#a41c1c] focus:ring-1 focus:ring-[#a41c1c]/10 outline-none transition-all text-sm resize-none"
                                            placeholder="{{ __('consultation_checkout.fields.topic_placeholder') }}"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Payment Section -->
                    <div class="lg:col-span-7 flex flex-col min-h-0 gap-3">

                        <!-- Price Summary (Compact) -->
                        <div class="shrink-0 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                            <div
                                class="bg-gradient-to-r from-[#a41c1c] to-[#c42828] px-4 py-3 flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-7 h-7 bg-white/20 rounded-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-sm">receipt_long</span>
                                    </div>
                                    <h2 class="text-white font-bold text-sm">
                                        {{ __('consultation_checkout.payment_title') }}</h2>
                                </div>
                                <div>
                                    <span class="text-2xl font-black text-white">{{ $price }}</span>
                                    <span
                                        class="text-white/70 text-xs font-bold mr-1 rtl:ml-1">{{ __('consultation_checkout.currency') }}</span>
                                </div>
                            </div>
                            <div
                                class="px-4 py-2.5 flex items-center justify-between border-t border-gray-100 bg-gray-50/50">
                                <span class="text-xs text-gray-500 flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[#a41c1c] text-sm">gavel</span>
                                    {{ __('consultation_checkout.service_name') }}
                                </span>
                                <span class="text-xs font-bold text-gray-700">{{ $price }}
                                    {{ __('consultation_checkout.currency') }}</span>
                            </div>
                        </div>

                        <!-- Tap Card SDK Form -->
                        <div
                            class="flex-1 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col min-h-0">
                            <div class="shrink-0 px-4 py-3 border-b border-gray-100 flex items-center gap-2">
                                <span class="material-symbols-outlined text-[#a41c1c] text-lg">credit_card</span>
                                <h3 class="font-bold text-sm text-gray-800">
                                    {{ __('consultation_checkout.payment_methods') }}</h3>
                            </div>

                            <!-- Tap Card Element Container -->
                            <div class="flex-1 flex flex-col justify-center p-4 min-h-0">
                                <div id="card-sdk-id" class="w-full"></div>

                                <!-- Card status message -->
                                <div id="cardStatus" class="hidden mt-2 text-xs text-center py-1.5 rounded-lg"></div>
                            </div>
                        </div>

                        <!-- Pay Button -->
                        <button type="button" id="payBtn" disabled
                            class="shrink-0 w-full group relative px-6 py-3.5 bg-gradient-to-r from-[#a41c1c] to-[#c42828] text-white font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-[#a41c1c]/40 transition-all transform hover:-translate-y-0.5 active:translate-y-0 text-center disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 disabled:hover:shadow-lg">
                            <span class="relative z-10 flex items-center justify-center gap-3" id="payBtnText">
                                <span class="material-symbols-outlined">lock</span>
                                {{ __('consultation_checkout.pay_button') }} - {{ $price }} SAR
                            </span>
                            <span class="relative z-10 items-center justify-center gap-2 hidden" id="payBtnSpinner">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span class="text-sm">{{ __('consultation_checkout.processing') }}</span>
                            </span>
                            <div
                                class="absolute inset-0 bg-white/10 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left rtl:origin-right">
                            </div>
                        </button>

                        <!-- Trust Badges -->
                        <div class="shrink-0 flex items-center justify-center gap-4 text-[10px] text-gray-400">
                            <span class="flex items-center gap-1"><span
                                    class="material-symbols-outlined text-xs">shield</span>
                                {{ __('consultation_checkout.secure_payment') }}</span>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- Tap Card SDK v2 -->
    <script src="https://tap-sdks.b-cdn.net/card/1.0.2/index.js"></script>

    <style>
        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        /* Hide any scrollbar from the page itself */
        html,
        body {
            overflow: hidden !important;
            height: 100% !important;
        }

        /* Custom scrollbar for form only */
        #formContent::-webkit-scrollbar {
            width: 3px;
        }

        #formContent::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }

        #formContent::-webkit-scrollbar-track {
            background: transparent;
        }
    </style>

    <script>
        let cardReady = false;
        let cardValid = false;

        // Initialize Tap Card SDK
        document.addEventListener('DOMContentLoaded', function() {
            if (!window.CardSDK) {
                console.error('Tap Card SDK not loaded');
                return;
            }

            const {
                renderTapCard,
                Theme,
                Currencies,
                Direction,
                Edges,
                Locale
            } = window.CardSDK;

            const locale = '{{ app()->getLocale() }}' === 'ar' ? Locale.AR : Locale.EN;
            const direction = '{{ app()->getLocale() }}' === 'ar' ? Direction.RTL : Direction.LTR;

            renderTapCard('card-sdk-id', {
                publicKey: '{{ config('payment.tap.public_key') }}',
                merchant: {
                    id: '{{ config('payment.tap.merchant_id', '') }}'
                },
                transaction: {
                    amount: {{ $price }},
                    currency: Currencies.SAR
                },
                customer: {
                    editable: true,
                    name: [{
                        lang: Locale.EN,
                        first: '',
                        last: ''
                    }],
                    nameOnCard: '',
                    contact: {
                        email: '',
                        phone: {
                            countryCode: '20',
                            number: ''
                        }
                    }
                },
                acceptance: {
                    supportedBrands: ['AMERICAN_EXPRESS', 'VISA', 'MASTERCARD', 'MADA'],
                    supportedCards: 'ALL'
                },
                fields: {
                    cardHolder: true
                },
                addons: {
                    displayPaymentBrands: true,
                    loader: true,
                    saveCard: false
                },
                interface: {
                    locale: locale,
                    theme: Theme.LIGHT,
                    edges: Edges.CURVED,
                    direction: direction
                },
                onReady: () => {
                    cardReady = true;
                    console.log('Tap Card Ready');
                },
                onValidInput: (data) => {
                    cardValid = true;
                    updatePayButton();
                },
                onInvalidInput: (data) => {
                    cardValid = false;
                    updatePayButton();
                },
                onError: (data) => {
                    console.error('Tap Card Error:', data);
                    showCardStatus('error', data?.error?.message || 'حدث خطأ في بيانات البطاقة');
                    resetPayButton();
                },
                onSuccess: (data) => {
                    // Token received! Send to server
                    console.log('Tap Token:', data);
                    processPayment(data.id);
                }
            });
        });

        function updatePayButton() {
            const form = document.getElementById('consultationForm');
            const btn = document.getElementById('payBtn');
            btn.disabled = !(cardValid && form.checkValidity());
        }

        // Monitor form changes to update button state
        document.querySelectorAll('#consultationForm input, #consultationForm textarea').forEach(el => {
            el.addEventListener('input', updatePayButton);
            el.addEventListener('change', updatePayButton);
        });

        function showCardStatus(type, message) {
            const statusEl = document.getElementById('cardStatus');
            statusEl.classList.remove('hidden', 'bg-red-50', 'text-red-600', 'bg-green-50', 'text-green-600');
            if (type === 'error') {
                statusEl.classList.add('bg-red-50', 'text-red-600');
            } else {
                statusEl.classList.add('bg-green-50', 'text-green-600');
            }
            statusEl.textContent = message;
        }

        function resetPayButton() {
            const btn = document.getElementById('payBtn');
            btn.disabled = false;
            document.getElementById('payBtnText').classList.remove('hidden');
            document.getElementById('payBtnSpinner').classList.add('hidden');
            document.getElementById('payBtnSpinner').classList.remove('flex');
        }

        // Pay button click: validate form → tokenize card
        document.getElementById('payBtn').addEventListener('click', function() {
            const form = document.getElementById('consultationForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            if (!cardReady) {
                showCardStatus('error', 'يرجى الانتظار حتى يتم تحميل نموذج الدفع');
                return;
            }

            // Show loading
            this.disabled = true;
            document.getElementById('payBtnText').classList.add('hidden');
            document.getElementById('payBtnSpinner').classList.remove('hidden');
            document.getElementById('payBtnSpinner').classList.add('flex');

            // Tokenize the card — onSuccess callback will handle the rest
            window.CardSDK.tokenize();
        });

        // Process payment with token
        function processPayment(tokenId) {
            const form = document.getElementById('consultationForm');
            const formData = new FormData(form);
            formData.append('token', tokenId);

            fetch('{{ route('consultation.submit') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect_url) {
                        window.location.href = data.redirect_url;
                    } else if (data.success) {
                        window.location.href = '{{ route('home') }}';
                    } else {
                        showCardStatus('error', data.message || 'حدث خطأ أثناء المعالجة');
                        resetPayButton();
                    }
                })
                .catch(error => {
                    console.error('Payment Error:', error);
                    showCardStatus('error', 'حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى.');
                    resetPayButton();
                });
        }
    </script>
@endsection
