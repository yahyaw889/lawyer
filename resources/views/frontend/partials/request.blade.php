<div id="request" class="page-section">
    <div class="min-h-screen flex items-center justify-center p-6 lg:p-12 bg-bg-gray">
        <div class="form-container w-full max-w-[800px] bg-white shadow-sm border border-border-slate">
            <header class="p-10 border-b border-gray-100 text-center relative">
                <!-- Back Button -->
                <a href="#services"
                    class="absolute top-10 left-10 text-legal-slate hover:text-legal-navy flex items-center gap-1 text-sm">
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    Back
                </a>

                <div class="mb-6">
                    <div class="inline-block border border-legal-navy p-3 mb-4">
                        <span class="text-2xl font-bold tracking-[0.2em] uppercase text-legal-navy">AL-MEZAN</span>
                    </div>
                    <div class="h-px w-24 bg-legal-gold mx-auto"></div>
                </div>
                <h1 class="text-2xl font-bold text-legal-navy mb-2">نموذج طلب الخدمات القانونية</h1>
                <p class="text-legal-slate text-sm font-light">Universal Service Request Form</p>
            </header>

            <form action="#" method="POST" class="p-10">
                <div class="space-y-8">
                    <div class="bg-slate-50 border-r-2 border-legal-gold p-4">
                        <p class="text-xs leading-relaxed text-legal-slate italic">
                            يرجى تعبئة الحقول التالية بدقة. سيتم مراجعة طلبكم من قبل الفريق المختص والرد خلال ٢٤ ساعة
                            عمل.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                        <div class="flex flex-col">
                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-legal-slate mb-2">الاسم
                                الكامل / Full Name</label>
                            <input type="text" class="py-3 px-0 border-t-0 border-x-0 border-b bg-transparent"
                                placeholder="أدخل الاسم الرباعي">
                        </div>
                        <div class="flex flex-col">
                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-legal-slate mb-2">البريد
                                الإلكتروني / Email Address</label>
                            <input type="email" class="py-3 px-0 border-t-0 border-x-0 border-b bg-transparent"
                                placeholder="example@domain.com">
                        </div>
                        <div class="flex flex-col">
                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-legal-slate mb-2">رقم
                                الهاتف / Contact Number</label>
                            <input type="tel" dir="ltr"
                                class="py-3 px-0 border-t-0 border-x-0 border-b bg-transparent text-left"
                                placeholder="+966 5x xxx xxxx">
                        </div>
                        <div class="flex flex-col">
                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-legal-slate mb-2">نوع
                                الخدمة المطلوب / Service Type</label>
                            <select class="py-3 px-0 border-t-0 border-x-0 border-b bg-transparent appearance-none">
                                <option value="">اختر الخدمة...</option>
                                <option value="litigation">التقاضي والترافع</option>
                                <option value="contracts">صياغة العقود والمراجعة</option>
                                <option value="consultancy">الاستشارات القانونية</option>
                            </select>
                        </div>
                        <div class="flex flex-col md:col-span-2">
                            <label
                                class="block text-xs font-semibold uppercase tracking-wider text-legal-slate mb-2">وصف
                                الطلب / Request Details</label>
                            <textarea rows="4" class="py-3 px-0 border-t-0 border-x-0 border-b bg-transparent resize-none"
                                placeholder="يرجى تزويدنا بموجز عن القضية..."></textarea>
                        </div>
                    </div>

                    <div class="pt-10 flex flex-col items-center">
                        <button type="submit"
                            class="w-full md:w-64 py-4 bg-legal-navy text-white text-sm font-bold tracking-widest hover:bg-legal-gold transition-all duration-300 border border-legal-navy uppercase">
                            إرسال الطلب | SUBMIT REQUEST
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
