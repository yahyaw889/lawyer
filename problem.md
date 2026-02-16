# مشكلة الدفع عبر بوابة Tap

## وصف المشكلة
عند محاولة الدفع، تظهر رسالة خطأ في الـ Console ولا يظهر نموذج إدخال البطاقة بشكل صحيح.
رمز الخطأ هو `2107` والرسالة هي `Authorization Required`.

## السبب
هذا الخطأ يعني أن التطبيق لا يستطيع الاتصال ببوابة الدفع لأن مفاتيح الربط (API Keys) غير موجودة أو غير صحيحة في ملف `.env`.
تحديداً، مكتبة `Tap Card SDK` تحتاج إلى `TAP_PUBLIC_KEY` لتعمل في المتصفح.

## الحل
يجب إضافة المفاتيح التالية في ملف `.env`:
```env
TAP_PUBLIC_KEY=pk_test_xxxxxxxxxxxxx
TAP_SECRET_KEY=sk_test_xxxxxxxxxxxxx
TAP_MERCHANT_ID=your_merchant_id
```
يمكن الحصول على هذه المفاتيح من لوحة تحكم Tap Business.
بعد إضافتها، يجب تشغيل الأمر:
`php artisan config:clear`
