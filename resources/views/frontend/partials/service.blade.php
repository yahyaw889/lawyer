<div id="services" class="page-section">
    <header class="bg-white border-b-2 border-[var(--legal-gold)] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 flex items-center justify-center bg-[var(--legal-navy)] text-[var(--legal-gold)]">
                        <span class="material-symbols-outlined text-3xl">gavel</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-[var(--legal-navy)] leading-none mb-1">
                            {{ __('frontend.service_page.header.firm_name') }}</h1>
                        <p class="text-[10px] text-[var(--legal-gold)] uppercase tracking-widest font-bold font-serif">
                            {{ __('frontend.service_page.header.slogan') }}</p>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-reverse space-x-8 text-sm font-medium">
                    <a href="#home"
                        class="text-[var(--legal-navy)] hover:text-[var(--legal-gold)]">{{ __('frontend.service_page.nav.home') }}</a>
                    <a href="#services"
                        class="text-[var(--legal-navy)] border-b-2 border-[var(--legal-gold)] pb-1">{{ __('frontend.service_page.nav.services') }}</a>
                    <a href="#consultation"
                        class="bg-[var(--legal-navy)] text-white px-5 py-2 text-sm font-bold flex items-center gap-2 hover:bg-[#1a365d] rounded">
                        <span class="material-symbols-outlined text-lg">login</span>
                        {{ __('frontend.service_page.nav.login') }}
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <section class="bg-royal-blue text-white py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <nav class="flex text-xs text-gray-300 mb-4 gap-2">
                <a href="#home" class="hover:text-white">{{ __('frontend.service_page.nav.home') }}</a>
                <span>/</span>
                <span class="text-[var(--legal-gold)]">{{ __('frontend.service_page.hero.breadcrumb') }}</span>
            </nav>
            <h2 class="text-4xl font-bold mb-4">{{ __('frontend.service_page.hero.title') }}</h2>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-sm text-gray-200">
                    <span class="material-symbols-outlined text-lg text-[var(--legal-gold)]">category</span>
                    <span>{{ __('frontend.service_page.hero.category') }}</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-200">
                    <span class="material-symbols-outlined text-lg text-[var(--legal-gold)]">history</span>
                    <span>{{ __('frontend.service_page.hero.duration') }}</span>
                </div>
            </div>
        </div>
    </section>

    <main class="max-w-5xl mx-auto px-4 py-12 space-y-8">
        <section class="bg-white border border-gray-200 p-8 shadow-sm transition-all duration-300">
            <h3
                class="text-xl font-bold text-[var(--legal-navy)] mb-6 flex items-center gap-3 border-r-4 border-[var(--legal-gold)] pr-4">
                <span class="material-symbols-outlined">info</span>
                {{ __('frontend.service_page.description.title') }}
            </h3>
            <div class="text-lg leading-relaxed text-[var(--legal-slate)] space-y-4">
                <p>{{ __('frontend.service_page.description.content') }}</p>
            </div>
        </section>

        <section class="bg-white border border-gray-200 p-8 shadow-sm transition-all duration-300">
            <h3
                class="text-xl font-bold text-[var(--legal-navy)] mb-6 flex items-center gap-3 border-r-4 border-[var(--legal-gold)] pr-4">
                <span class="material-symbols-outlined">description</span>
                {{ __('frontend.service_page.details.title') }}
            </h3>
            <div class="space-y-6 text-[var(--legal-slate)]">
                <p class="font-medium text-[var(--legal-navy)]">{{ __('frontend.service_page.details.subtitle') }}</p>
                <ul class="grid md:grid-cols-2 gap-4">
                    <li class="flex gap-3"><span
                            class="material-symbols-outlined text-[var(--legal-gold)]">check_circle</span><span>{{ __('frontend.service_page.details.items.contract') }}</span>
                    </li>
                    <li class="flex gap-3"><span
                            class="material-symbols-outlined text-[var(--legal-gold)]">check_circle</span><span>{{ __('frontend.service_page.details.items.tax') }}</span>
                    </li>
                    <li class="flex gap-3"><span
                            class="material-symbols-outlined text-[var(--legal-gold)]">check_circle</span><span>{{ __('frontend.service_page.details.items.files') }}</span>
                    </li>
                </ul>
            </div>
        </section>

        <div class="pt-8 pb-16 text-center">
            <a href="#request"
                class="bg-[var(--legal-gold)] text-white px-16 py-5 text-xl font-bold shadow-xl hover:bg-[#b08d4a] transition-all transform hover:-translate-y-1 active:scale-95 flex items-center gap-4 mx-auto w-fit rounded">
                <span>{{ __('frontend.service_page.cta.button') }}</span>
                <span class="material-symbols-outlined">arrow_back_ios</span>
            </a>
            <p class="mt-4 text-sm text-[var(--legal-slate)]">{{ __('frontend.service_page.cta.notice') }}</p>
        </div>
    </main>
</div>
