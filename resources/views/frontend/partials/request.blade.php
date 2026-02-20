<div id="request" class="min-h-screen w-full flex flex-col md:flex-row bg-white relative overflow-x-hidden font-cairo">

    <!-- Left Panel: Branding & Info (40%) -->
    <div class="hidden md:flex w-full md:w-[40%] relative overflow-hidden flex-col justify-between p-8 text-white">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-[url('{{ asset('img/hero-law.jpg') }}')] bg-cover bg-center z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-[#a41c1c]/95 via-[#911c24]/90 to-black/80 z-0"></div>

        <!-- Decoration -->
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 z-0 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-64 h-64 bg-black/20 rounded-full blur-3xl -ml-16 -mb-16 z-0 pointer-events-none">
        </div>

        <!-- Logo -->
        <div class="relative z-10 animate-fade-in-down mt-4">
            <div class="inline-block text-left border-l-[4px] border-white/30 pl-4 py-1">
                <h1 class="text-[50px] font-black text-white leading-[0.75] tracking-tighter"
                    style="font-family: 'Montserrat', sans-serif;">
                    <span class="typewriter-text border-white">ΛMN</span>
                </h1>
                <div class="text-[9px] font-bold text-white/80 uppercase tracking-[0.38em] mt-2 ml-1">
                    GLOBAL LAW FIRM
                </div>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="relative z-10 space-y-4 animate-fade-in-up mb-4" style="animation-delay: 0.2s;">
            <div>
                <h3 class="text-lg font-bold mb-2">{{ __('frontend.about.title') }}</h3>
                <div class="space-y-2 text-white/80 text-xs leading-relaxed max-w-sm text-justify">
                    <p>{{ __('frontend.about.overview') }}</p>
                    <p>{{ __('frontend.about.commitment') }}</p>
                </div>
            </div>

            <ul class="space-y-2 text-xs text-white/80">
                <li class="flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5"><span
                            class="material-symbols-outlined text-sm">call</span></span>
                    <div>
                        <span
                            class="block text-[9px] uppercase opacity-60">{{ __('frontend.request_page.contact_info.call') }}</span>
                        <span class="font-bold">+966 50 000 0000</span>
                    </div>
                </li>
                <li class="flex items-center gap-3">
                    <span
                        class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm border border-white/5"><span
                            class="material-symbols-outlined text-sm">mail</span></span>
                    <div>
                        <span
                            class="block text-[9px] uppercase opacity-60">{{ __('frontend.request_page.contact_info.email') }}</span>
                        <span class="font-bold">info@amn-law.sa</span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Copyright -->
        <div class="relative z-10 text-[9px] text-white/40 font-light">
            &copy; {{ date('Y') }} {{ __('frontend.hero.firm_name') }}
        </div>
    </div>

    <!-- Right Panel: Form (60%) -->
    <div class="w-full md:w-[60%] flex flex-col relative bg-[#f8f9fa] min-h-screen md:h-screen md:overflow-y-auto">
        <!-- Back Button -->
        <a href="{{ route('home') }}"
            class="absolute top-6 right-6 md:top-4 md:right-6 z-20 flex items-center gap-1 text-gray-400 hover:text-[#a41c1c] transition-colors text-[10px] font-bold rtl:flex-row-reverse uppercase tracking-wider pb-4 md:pb-0">
            <span>{{ __('frontend.nav.home') }}</span>
            <span class="material-symbols-outlined text-sm rtl:rotate-180">arrow_right_alt</span>
        </a>

        <div class="flex-1 flex flex-col justify-center px-4 py-16 md:py-8 md:px-12 relative z-10 min-h-full">
            <div
                class="w-full max-w-3xl mx-auto bg-white p-5 md:p-8 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 my-auto">

                <div class="mb-4 text-center">
                    <h2 class="text-2xl md:text-3xl font-black text-gray-900 mb-1 font-cairo text-center">
                        {{ __('frontend.request_page.form.title') }}</h2>
                    <p class="text-gray-500 text-xs text-center">{{ __('frontend.one_day_service.desc') }}</p>
                </div>

                <form action="{{ route('request.submit') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4" id="requestForm">
                    @csrf

                    <!-- Base Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm"
                            placeholder="{{ __('frontend.consultation.form.name') }}">
                        <input type="email" id="email" name="email" required dir="ltr"
                            class="w-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm text-left"
                            placeholder="{{ __('frontend.consultation.form.email') }}">
                        <input type="tel" id="phone" name="phone" required dir="ltr"
                            class="w-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm text-left"
                            placeholder="{{ __('frontend.request_page.form.phone_label') }}">
                    </div>

                    <!-- Service Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div class="md:col-span-1">
                            @if (isset($selectedService) && $selectedService === \App\Enums\ServiceType::DOCUMENT_ATTESTATION)
                                <select name="service_type" id="service_type" required
                                    class="w-full h-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all text-sm rounded-xl text-gray-600">
                                    <option value="" disabled selected>
                                        {{ __('frontend.consultation.form.service_type') }}</option>
                                    @php
                                        $attestationServices = [
                                            \App\Enums\ServiceType::ATTESTATION_INTL_CONTRACT,
                                            \App\Enums\ServiceType::ATTESTATION_SIGNATURES,
                                            \App\Enums\ServiceType::ATTESTATION_POA_ISSUANCE,
                                            \App\Enums\ServiceType::ATTESTATION_DEBT_ACK,
                                            \App\Enums\ServiceType::ATTESTATION_MOFA,
                                            \App\Enums\ServiceType::ATTESTATION_MOJ,
                                        ];
                                    @endphp
                                    @foreach ($attestationServices as $service)
                                        <option value="{{ $service->value }}"
                                            {{ isset($selectedService) && $selectedService === $service ? 'selected' : '' }}>
                                            {{ $service->label() }}</option>
                                    @endforeach
                                </select>
                            @elseif (isset($selectedService) && $selectedService)
                                <input type="text" disabled value="{{ $selectedService->label() }}"
                                    class="w-full h-full px-4 py-2.5 border border-gray-200 bg-gray-100 text-gray-700 text-sm rounded-xl font-bold cursor-not-allowed">
                                <input type="hidden" name="service_type" id="service_type"
                                    value="{{ $selectedService->value }}">
                            @else
                                <select name="service_type" id="service_type" required
                                    class="w-full h-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all text-sm rounded-xl text-gray-600">
                                    <option value="" disabled selected>
                                        {{ __('frontend.consultation.form.service_type') }}</option>
                                    @foreach (\App\Enums\ServiceType::options() as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="md:col-span-2">
                            <textarea id="message" name="message" rows="2" required
                                class="w-full px-4 py-2.5 border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm resize-none"
                                placeholder="اذكر الاستشارة بالتفاصيل"></textarea>
                        </div>
                    </div>

                    <!-- General Additional Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-3">
                        <!-- Political Activity -->
                        <div
                            class="bg-white px-3 py-2 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
                            <span
                                class="text-xs font-bold text-gray-700">{{ __('frontend.request_page.form.political_activity') }}</span>
                            <div class="flex gap-4">
                                <label class="flex items-center gap-1.5 cursor-pointer text-xs text-gray-600">
                                    <input type="radio" name="has_political_activity" value="1"
                                        class="w-3.5 h-3.5 text-[#a41c1c] focus:ring-[#a41c1c]">
                                    {{ __('frontend.request_page.form.yes') }}
                                </label>
                                <label class="flex items-center gap-1.5 cursor-pointer text-xs text-gray-600">
                                    <input type="radio" name="has_political_activity" value="0" checked
                                        class="w-3.5 h-3.5 text-[#a41c1c] focus:ring-[#a41c1c]">
                                    {{ __('frontend.request_page.form.no') }}
                                </label>
                            </div>
                        </div>

                        <!-- General Attachment -->
                        <label
                            class="relative flex items-center p-3 border border-dashed border-gray-300 rounded-xl hover:border-[#a41c1c]/60 hover:bg-[#a41c1c]/5 transition-all cursor-pointer bg-white group shadow-sm overflow-hidden h-full">
                            <input type="file" name="attachments[]" id="attachments" multiple
                                accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="hidden">
                            <div
                                class="w-10 h-10 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-[#a41c1c] transition-colors shrink-0 ml-3 shadow-sm">
                                <span class="material-symbols-outlined text-[22px]">attach_file</span>
                            </div>
                            <div class="flex flex-col flex-1 overflow-hidden pointer-events-none">
                                <span
                                    class="text-xs font-bold text-gray-800">{{ __('frontend.request_page.form.general_attachment') }}</span>
                                <span class="text-[10px] text-gray-400 truncate w-full mt-0.5"
                                    id="attachments_name">{{ __('frontend.request_page.form.choose_file') }}</span>
                            </div>
                        </label>
                    </div>

                    {{-- Business Fields Section --}}
                    @php
                        $isBusinessService = false;
                        if (isset($selectedService)) {
                            $businessServices = [
                                \App\Enums\ServiceType::BUSINESS_SERVICES,
                                \App\Enums\ServiceType::GOVERNMENT_PLATFORMS,
                                \App\Enums\ServiceType::COMMERCIAL_LICENSE,
                                \App\Enums\ServiceType::PREMIUM_RESIDENCY,
                                \App\Enums\ServiceType::INTELLECTUAL_PROPERTY,
                                \App\Enums\ServiceType::COMPANY_FORMATION,
                                \App\Enums\ServiceType::COMPANY_LIQUIDATION,
                            ];
                            $isBusinessService = in_array($selectedService, $businessServices);
                        }
                    @endphp

                    <div id="businessFieldsSection"
                        class="bg-gray-50/50 p-4 rounded-2xl border border-[#a41c1c]/10 space-y-3 {{ $isBusinessService ? '' : 'hidden' }}">
                        <div class="flex items-center gap-2">
                            <div class="w-1 h-5 bg-[#a41c1c] rounded-full"></div>
                            <span
                                class="text-sm font-bold text-gray-800">{{ __('frontend.request_page.form.business_info') }}</span>
                        </div>

                        <!-- Company Core details -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <input type="text" id="company_name" name="company_name"
                                placeholder="{{ __('frontend.request_page.form.company_name') }}"
                                class="w-full px-4 py-2.5 border border-gray-200 bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm">
                            <input type="url" id="company_website" name="company_website" dir="ltr"
                                placeholder="{{ __('frontend.request_page.form.company_website') }}"
                                class="w-full px-4 py-2.5 border border-gray-200 bg-white focus:border-[#a41c1c] outline-none transition-all rounded-xl text-sm text-left">
                            <select name="company_capital" id="company_capital"
                                class="w-full px-4 py-2.5 border border-gray-200 bg-white focus:border-[#a41c1c] outline-none transition-all text-sm rounded-xl text-gray-600">
                                <option value="" disabled selected>
                                    {{ __('frontend.request_page.form.company_capital') }}</option>
                                <option value="50000_to_500000">
                                    {{ __('frontend.request_page.form.capital_ranges.tier1') }}</option>
                                <option value="500000_to_10000000">
                                    {{ __('frontend.request_page.form.capital_ranges.tier2') }}</option>
                                <option value="more_than_10000000">
                                    {{ __('frontend.request_page.form.capital_ranges.tier3') }}</option>
                            </select>
                        </div>

                        <!-- Booleans & Uploads inline -->
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                            <!-- Radios -->
                            <div class="md:col-span-5 grid grid-cols-1 gap-2">
                                <div
                                    class="bg-white px-3 py-2 rounded-xl border border-gray-200 flex items-center justify-between shadow-sm">
                                    <span
                                        class="text-xs font-bold text-gray-700">{{ __('frontend.request_page.form.premium_residency') }}</span>
                                    <div class="flex gap-4">
                                        <label class="flex items-center gap-1.5 cursor-pointer text-xs text-gray-600">
                                            <input type="radio" name="premium_residency" value="1"
                                                class="w-3.5 h-3.5 text-[#a41c1c] focus:ring-[#a41c1c]">
                                            {{ __('frontend.request_page.form.yes') }}
                                        </label>
                                        <label class="flex items-center gap-1.5 cursor-pointer text-xs text-gray-600">
                                            <input type="radio" name="premium_residency" value="0" checked
                                                class="w-3.5 h-3.5 text-[#a41c1c] focus:ring-[#a41c1c]">
                                            {{ __('frontend.request_page.form.no') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- File inputs Custom (Images style) -->
                            <div class="md:col-span-7 grid grid-cols-2 gap-3">
                                <label
                                    class="relative flex items-center p-3 border border-dashed border-gray-300 rounded-xl hover:border-[#a41c1c]/60 hover:bg-[#a41c1c]/5 transition-all cursor-pointer bg-white group shadow-sm overflow-hidden h-full">
                                    <input type="file" name="commercial_record" id="commercial_record"
                                        accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-[#a41c1c] transition-colors shrink-0 ml-3 shadow-sm">
                                        <span class="material-symbols-outlined text-[22px]">add_photo_alternate</span>
                                    </div>
                                    <div class="flex flex-col flex-1 overflow-hidden pointer-events-none">
                                        <span
                                            class="text-xs font-bold text-gray-800">{{ __('frontend.request_page.form.commercial_record') }}</span>
                                        <span class="text-[10px] text-gray-400 truncate w-full mt-0.5"
                                            id="commercial_record_name">{{ __('frontend.request_page.form.choose_file') }}</span>
                                    </div>
                                </label>

                                <label
                                    class="relative flex items-center p-3 border border-dashed border-gray-300 rounded-xl hover:border-[#a41c1c]/60 hover:bg-[#a41c1c]/5 transition-all cursor-pointer bg-white group shadow-sm overflow-hidden h-full">
                                    <input type="file" name="incorporation_contract" id="incorporation_contract"
                                        accept=".pdf,.jpg,.jpeg,.png" class="hidden">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 group-hover:text-[#a41c1c] transition-colors shrink-0 ml-3 shadow-sm">
                                        <span class="material-symbols-outlined text-[22px]">add_photo_alternate</span>
                                    </div>
                                    <div class="flex flex-col flex-1 overflow-hidden pointer-events-none">
                                        <span
                                            class="text-xs font-bold text-gray-800">{{ __('frontend.request_page.form.incorporation_contract') }}</span>
                                        <span class="text-[10px] text-gray-400 truncate w-full mt-0.5"
                                            id="incorporation_contract_name">{{ __('frontend.request_page.form.choose_file') }}</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submitBtn"
                        class="w-full bg-[#a41c1c] text-white font-bold py-3.5 rounded-xl hover:bg-[#8a1616] transition-all duration-300 shadow-lg shadow-[#a41c1c]/20 hover:shadow-[#a41c1c]/40 group flex items-center justify-center gap-2 text-base disabled:opacity-70 disabled:cursor-not-allowed">
                        <span id="btnText">{{ __('frontend.buttons.request.title') }}</span>
                        <span id="btnSpinner" class="hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="3"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                        <span id="btnIcon"
                            class="material-symbols-outlined text-base group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">send</span>
                    </button>
                    <p class="text-xs text-center text-gray-400 mt-2">
                        {{ __('frontend.request_page.form.terms_agree') }} <a href="#"
                            class="text-[#a41c1c] underline font-bold">{{ __('frontend.request_page.form.terms_link') }}</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include iziToast CSS/JS if not already globally included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

<script>
    // Update file input names when file selected
    document.getElementById('attachments')?.addEventListener('change', function(e) {
        const fileCount = e.target.files.length;
        let displayText = '{{ __('frontend.request_page.form.choose_file') }}';

        if (fileCount === 1) {
            displayText = e.target.files[0].name;
        } else if (fileCount > 1) {
            displayText = `تم تحديد ${fileCount} ملفات`;
        }

        document.getElementById('attachments_name').textContent = displayText;

        if (fileCount > 0) {
            this.closest('label').classList.add(
                'text-[#a41c1c]'); // Use closest('label') to target the parent label
        } else {
            this.closest('label').classList.remove('text-[#a41c1c]');
        }
    });

    document.getElementById('commercial_record')?.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || '{{ __('frontend.request_page.form.choose_file') }}';
        document.getElementById('commercial_record_name').textContent = fileName;
        if (e.target.files[0]) {
            this.closest('label').classList.add('text-[#a41c1c]');
        } else {
            this.closest('label').classList.remove('text-[#a41c1c]');
        }
    });

    document.getElementById('incorporation_contract').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || '{{ __('frontend.request_page.form.choose_file') }}';
        document.getElementById('incorporation_contract_name').textContent = fileName;
        if (e.target.files[0]) {
            this.closest('label').classList.add('text-[#a41c1c]');
        } else {
            this.closest('label').classList.remove('text-[#a41c1c]');
        }
    });

    // Form submission via AJAX
    document.getElementById('requestForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const btn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnSpinner = document.getElementById('btnSpinner');
        const btnIcon = document.getElementById('btnIcon');

        // Loading State
        btn.disabled = true;
        btnText.classList.add('hidden');
        btnIcon.classList.add('hidden');
        btnSpinner.classList.remove('hidden');

        const formData = new FormData(form);

        fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    iziToast.success({
                        title: '{{ __('frontend.hero.firm_name') }}',
                        message: data.message,
                        position: 'topRight',
                        rtl: true
                    });
                    form.reset();
                    if (document.getElementById('attachments_name')) document.getElementById(
                            'attachments_name').textContent =
                        '{{ __('frontend.request_page.form.choose_file') }}';
                    if (document.getElementById('commercial_record_name')) document.getElementById(
                            'commercial_record_name').textContent =
                        '{{ __('frontend.request_page.form.choose_file') }}';
                    if (document.getElementById('incorporation_contract_name')) document.getElementById(
                            'incorporation_contract_name').textContent =
                        '{{ __('frontend.request_page.form.choose_file') }}';

                    const businessSection = document.getElementById('businessFieldsSection');
                    // Check if hidden field exists (meaning service was pre-selected from URL)
                    const hiddenServiceType = document.querySelector(
                        'input[name="service_type"][type="hidden"]');
                    if (!hiddenServiceType && businessSection) {
                        businessSection.classList.add('hidden');
                    }
                } else {
                    throw new Error(data.message || 'حدث خطأ غير متوقع');
                }
            })
            .catch(error => {
                iziToast.error({
                    title: 'خطأ',
                    message: error.message || 'فشل إرسال الطلب. يرجى المحاولة مرة أخرى.',
                    position: 'topRight',
                    rtl: true
                });
                console.error('Error:', error);
            })
            .finally(() => {
                // Reset State
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnIcon.classList.remove('hidden');
                btnSpinner.classList.add('hidden');
            });
    });

    // Dynamic display of business fields based on dropdown selection
    const serviceTypeSelect = document.getElementById('service_type');
    const hiddenServiceType = document.getElementById('service_type'); // if input type=hidden
    const businessFieldsSection = document.getElementById('businessFieldsSection');

    // Only run this if we are using the dropdown and it exists
    if (serviceTypeSelect && serviceTypeSelect.tagName === 'SELECT' && businessFieldsSection) {
        serviceTypeSelect.addEventListener('change', function() {
            const businessServices = [
                'business_services',
                'government_platforms',
                'commercial_license',
                'premium_residency',
                'intellectual_property',
                'company_formation',
                'company_liquidation'
            ];

            if (businessServices.includes(this.value)) {
                businessFieldsSection.classList.remove('hidden');
            } else {
                businessFieldsSection.classList.add('hidden');
            }
        });
    }
</script>
