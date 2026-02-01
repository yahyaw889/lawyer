@extends('frontend.layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 font-cairo" dir="rtl">

        <!-- Header (Compact) -->
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 text-royal-blue hover:text-gold-accent transition-colors">
                    <span class="material-symbols-outlined rtl:rotate-180">arrow_forward</span>
                    <span class="font-bold">عودة للرئيسية</span>
                </a>
                <div class="text-xl font-bold text-royal-blue">طلب خدمة قانونية</div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 py-12">

            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-royal-blue mb-4">نموذج الإجراءات والخدمات</h1>
                <p class="text-gray-500 max-w-2xl mx-auto">
                    يرجى تعبئة النموذج التالي بدقة لتمكين فريقنا من دراسة طلبكم وتقديم العرض المناسب. يتم الرد عادةً خلال 24
                    ساعة عمل.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Decorative Top Bar -->
                <div class="h-2 bg-gradient-to-r from-royal-blue via-gold-accent to-royal-blue"></div>

                <form class="p-8 md:p-12 space-y-8">

                    <!-- Section 1: Contact Info -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-3">بيانات التواصل</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700">الاسم الكامل / الجهة الطالبة</label>
                                <input type="text"
                                    class="w-full rounded-xl border-gray-300 py-3.5 px-4 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-royal-blue/20 focus:border-royal-blue transition-all"
                                    placeholder="الاسم هنا..." />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700">رقم الهاتف (مع مفتاح الدولة)</label>
                                <input type="tel" dir="ltr"
                                    class="w-full rounded-xl border-gray-300 py-3.5 px-4 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-royal-blue/20 focus:border-royal-blue transition-all text-right"
                                    placeholder="+966..." />
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="text-sm font-bold text-gray-700">البريد الإلكتروني الرسمي</label>
                                <input type="email"
                                    class="w-full rounded-xl border-gray-300 py-3.5 px-4 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-royal-blue/20 focus:border-royal-blue transition-all"
                                    placeholder="name@company.com" />
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Service Details -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-3">تفاصيل الطلب</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Custom Radio Cards -->
                            <label class="cursor-pointer relative group">
                                <input type="radio" name="service_type" class="peer sr-only">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gold-accent/50 peer-checked:border-royal-blue peer-checked:bg-blue-50/50 transition-all flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-royal-blue flex items-center justify-center peer-checked:bg-royal-blue peer-checked:text-white">
                                        <span class="material-symbols-outlined">gavel</span>
                                    </div>
                                    <span class="font-bold text-gray-700 peer-checked:text-royal-blue">التقاضي
                                        والترافع</span>
                                </div>
                            </label>

                            <label class="cursor-pointer relative group">
                                <input type="radio" name="service_type" class="peer sr-only">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gold-accent/50 peer-checked:border-royal-blue peer-checked:bg-blue-50/50 transition-all flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-royal-blue flex items-center justify-center peer-checked:bg-royal-blue peer-checked:text-white">
                                        <span class="material-symbols-outlined">history_edu</span>
                                    </div>
                                    <span class="font-bold text-gray-700 peer-checked:text-royal-blue">صياغة العقود</span>
                                </div>
                            </label>

                            <label class="cursor-pointer relative group">
                                <input type="radio" name="service_type" class="peer sr-only">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gold-accent/50 peer-checked:border-royal-blue peer-checked:bg-blue-50/50 transition-all flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-royal-blue flex items-center justify-center peer-checked:bg-royal-blue peer-checked:text-white">
                                        <span class="material-symbols-outlined">domain</span>
                                    </div>
                                    <span class="font-bold text-gray-700 peer-checked:text-royal-blue">تأسيس شركات</span>
                                </div>
                            </label>

                            <label class="cursor-pointer relative group">
                                <input type="radio" name="service_type" class="peer sr-only">
                                <div
                                    class="p-4 rounded-xl border-2 border-gray-100 bg-white hover:border-gold-accent/50 peer-checked:border-royal-blue peer-checked:bg-blue-50/50 transition-all flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 text-royal-blue flex items-center justify-center peer-checked:bg-royal-blue peer-checked:text-white">
                                        <span class="material-symbols-outlined">more_horiz</span>
                                    </div>
                                    <span class="font-bold text-gray-700 peer-checked:text-royal-blue">أخرى</span>
                                </div>
                            </label>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700">شرح تفاصيل الطلب</label>
                            <textarea rows="6"
                                class="w-full rounded-xl border-gray-300 py-3.5 px-4 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-royal-blue/20 focus:border-royal-blue transition-all"
                                placeholder="يرجى كتابة كافة التفاصيل المهمة هنا..."></textarea>
                        </div>

                        <!-- File Upload -->
                        <div
                            class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:bg-gray-50 transition-colors cursor-pointer group">
                            <span
                                class="material-symbols-outlined text-4xl text-gray-300 group-hover:text-royal-blue mb-2 transition-colors">cloud_upload</span>
                            <p class="text-sm font-bold text-gray-600">انقر لرفع ملفات (اختياري)</p>
                            <p class="text-xs text-gray-400 mt-1">يسمح بملفات PDF, Images حتى 10 ميجا</p>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button
                            class="w-full bg-royal-blue hover:bg-blue-900 text-white font-bold py-5 rounded-xl shadow-lg shadow-blue-900/20 transition-all transform hover:-translate-y-1 active:scale-95 text-lg">
                            إرسال الطلب
                        </button>
                        <p class="text-xs text-center text-gray-400 mt-4">بإرسال هذا الطلب أنت توافق على سياسة الخصوصية
                            وسرية المعلومات الخاصة بنا.</p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <style>
        .font-cairo {
            font-family: 'Cairo', sans-serif;
        }

        .bg-royal-blue {
            background-color: #1e3a8a;
        }

        .text-royal-blue {
            color: #1e3a8a;
        }

        .bg-gold-accent {
            background-color: #d4af37;
        }

        .text-gold-accent {
            color: #d4af37;
        }
    </style>
@endsection
