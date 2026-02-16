<div id="consultation" class="page-section">
    <header class="bg-primary text-white py-4 px-8 border-b-4 border-secondary sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="bg-white/10 p-2 rounded">
                    <span class="material-symbols-outlined text-secondary text-3xl">gavel</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-wider uppercase">
                        {{ __('frontend.consultation_page.header.title') }}</h1>
                    <p class="text-[10px] text-secondary tracking-[0.2em] font-medium">
                        {{ __('frontend.consultation_page.header.subtitle') }}
                    </p>
                </div>
            </div>
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="#home"
                    class="hover:text-secondary transition-colors">{{ __('frontend.consultation_page.nav.home') }}</a>
                <a href="#services"
                    class="hover:text-secondary transition-colors">{{ __('frontend.consultation_page.nav.practice') }}</a>
                <a href="#consultation"
                    class="hover:text-secondary transition-colors text-secondary border-b border-secondary">{{ __('frontend.consultation_page.nav.instant') }}</a>
            </nav>
            <div class="flex items-center gap-4">
                <a href="#home"
                    class="text-sm font-semibold border border-white/30 px-4 py-1.5 rounded hover:bg-white/10 transition-all">{{ __('frontend.consultation_page.header.btn') }}</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-12 lg:px-8 bg-background-light">
        <div class="mb-10 text-center lg:text-left">
            <h2 class="text-3xl font-bold text-primary mb-2">{{ __('frontend.consultation_page.hero.title') }}</h2>
            <p class="text-gray-600 max-w-2xl">{{ __('frontend.consultation_page.hero.subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <div class="lg:col-span-7 space-y-8">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-border-slate">
                    <h3 class="text-lg font-bold text-primary mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">description</span>
                        {{ __('frontend.consultation_page.form.request_details') }}
                    </h3>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase mb-2">{{ __('frontend.consultation_page.form.labels.name') }}</label>
                                <input type="text"
                                    class="w-full rounded border-gray-300 py-2.5 text-sm form-input-focus"
                                    placeholder="{{ __('frontend.consultation_page.form.placeholders.name') }}">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase mb-2">{{ __('frontend.consultation_page.form.labels.email') }}</label>
                                <input type="email"
                                    class="w-full rounded border-gray-300 py-2.5 text-sm form-input-focus"
                                    placeholder="{{ __('frontend.consultation_page.form.placeholders.email') }}">
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase mb-2">{{ __('frontend.consultation_page.form.labels.area') }}</label>
                            <select class="w-full rounded border-gray-300 py-2.5 text-sm form-input-focus">
                                <option>{{ __('frontend.consultation_page.form.options.corporate') }}</option>
                                <option>{{ __('frontend.consultation_page.form.options.real_estate') }}</option>
                            </select>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-gray-500 uppercase mb-2">{{ __('frontend.consultation_page.form.labels.subject') }}</label>
                            <textarea rows="4" class="w-full rounded border-gray-300 py-2.5 text-sm form-input-focus"
                                placeholder="{{ __('frontend.consultation_page.form.placeholders.subject') }}"></textarea>
                        </div>
                        <button
                            class="w-full bg-primary hover:bg-primary/95 text-white font-bold py-4 rounded transition-all shadow-md flex items-center justify-center gap-2 mt-4">
                            <span class="material-symbols-outlined text-[20px]">verified_user</span>
                            <span>{{ __('frontend.consultation_page.form.submit_btn') }}</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-xl shadow-lg border border-border-slate overflow-hidden">
                        <div class="p-6 bg-slate-50 border-b border-border-slate">
                            <h3 class="text-lg font-bold text-primary">
                                {{ __('frontend.consultation_page.summary.title') }}</h3>
                            <p class="text-xs text-gray-500">{{ __('frontend.consultation_page.summary.powered_by') }}
                            </p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center text-sm">
                                <span
                                    class="text-gray-600">{{ __('frontend.consultation_page.summary.fee_label') }}</span>
                                <span class="font-bold">500.00
                                    {{ __('frontend.consultation_page.summary.currency') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span
                                    class="text-primary font-bold">{{ __('frontend.consultation_page.summary.total_label') }}</span>
                                <span class="text-2xl font-black text-primary">575.00 <span
                                        class="text-sm">{{ __('frontend.consultation_page.summary.currency') }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
