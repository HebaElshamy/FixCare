<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question_ar' => 'كيف يمكنني إنشاء حساب جديد؟',
                'question_en' => 'How can I create a new account?',
                'answer_ar' => 'تسجيل خروج من الحساب الحالي ثم النقر على انشاء حساب وإدخال البيانات.',
                'answer_en' => 'Log out of the current account, click on create account, and enter the details.',
            ],
            [
                'question_ar' => 'نسيت كلمة المرور، كيف يمكنني استعادتها؟',
                'question_en' => 'I forgot my password, how can I recover it?',
                'answer_ar' => 'انقر على "نسيت كلمة المرور"، تحقق من الرقم أو البريد عبر إرسال رمز ومطابقته، ثم إعادة تعيين كلمة مرور جديدة.',
                'answer_en' => 'Click on "Forgot password", verify via phone number or email by sending a code and matching it, then reset the password.',
            ],
            [
                'question_ar' => 'ما هي ساعات عمل فريق الدعم الفني؟',
                'question_en' => 'What are the working hours of the technical support team?',
                'answer_ar' => 'من الساعة 8:15 صباحًا إلى 12:30 مساءً، ومن الساعة 3:30 مساءً إلى 8:30 مساءً.',
                'answer_en' => 'From 8:15 AM to 12:30 PM, and from 3:30 PM to 8:30 PM.',
            ],
            [
                'question_ar' => 'هل يمكنني التواصل مع الدعم الفني عبر الهاتف؟',
                'question_en' => 'Can I contact technical support via phone?',
                'answer_ar' => 'نعم، كل فني دعم أو خبير أو متدرب يسجل رقمه للتواصل.',
                'answer_en' => 'Yes, each technical support, expert, or trainee registers their phone number for communication.',
            ],
            [
                'question_ar' => 'كيف يمكنني تحديث بياناتي الشخصية؟',
                'question_en' => 'How can I update my personal information?',
                'answer_ar' => 'انقر على اسم المستخدم الخاص بك، ستظهر البيانات، ثم اضغط على الحقل الذي تريد تعديله.',
                'answer_en' => 'Click on your username, your data will appear, then click on the field you want to edit.',
            ],
            [
                'question_ar' => 'لماذا لا أستطيع تسجيل الدخول إلى حسابي؟',
                'question_en' => 'Why can’t I log in to my account?',
                'answer_ar' => 'تأكد من إدخال بياناتك الصحيحة، جرّب إعادة تعيين كلمة المرور، أو تحقق مما إذا كان هناك عطل عام.',
                'answer_en' => 'Make sure to enter your correct details, try resetting your password, or check if there is a general outage.',
            ],
            [
                'question_ar' => 'التطبيق/الموقع لا يعمل، ماذا أفعل؟',
                'question_en' => 'The app/website isn’t working, what should I do?',
                'answer_ar' => 'تأكد من اتصال الإنترنت، أعد تشغيل الجهاز، أو تحقق من وجود تحديثات للتطبيق.',
                'answer_en' => 'Check your internet connection, restart your device, or check for app updates.',
            ],
            [
                'question_ar' => 'كيف يمكنني حل مشكلة بطء تحميل الموقع؟',
                'question_en' => 'How can I fix the slow loading issue of the site?',
                'answer_ar' => 'تأكد من اتصال الإنترنت، أعد تشغيل الجهاز، أو تحقق من وجود تحديثات للتطبيق.',
                'answer_en' => 'Check your internet connection, restart your device, or check for app updates.',
            ],
            [
                'question_ar' => 'تظهر لي رسالة خطأ، كيف يمكنني إصلاحها؟',
                'question_en' => 'I’m getting an error message, how can I fix it?',
                'answer_ar' => 'انسخ رسالة الخطأ وابحث عن حل في الدعم الفني أو جرّب إعادة تشغيل التطبيق.',
                'answer_en' => 'Copy the error message and look for a solution in the support section or try restarting the app.',
            ],
            [
                'question_ar' => 'ما هي طرق الدفع المتاحة؟',
                'question_en' => 'What are the available payment methods?',
                'answer_ar' => 'تشمل الطرق المتاحة البطاقة الائتمانية، PayPal، الدفع الإلكتروني، وغيرها حسب الخدمة.',
                'answer_en' => 'Available methods include credit cards, PayPal, electronic payments, and others depending on the service.',
            ],
            [
                'question_ar' => 'كيف يمكنني استرداد الأموال بعد الدفع؟',
                'question_en' => 'How can I request a refund after payment?',
                'answer_ar' => 'راجع سياسة الاسترداد، ثم تواصل مع الدعم لطلب استرداد الأموال إذا كنت مؤهلاً.',
                'answer_en' => 'Check the refund policy, then contact support to request a refund if you are eligible.',
            ],
            [
                'question_ar' => 'لماذا تم رفض عملية الدفع الخاصة بي؟',
                'question_en' => 'Why was my payment rejected?',
                'answer_ar' => 'تأكد من صحة بيانات الدفع، توفر الرصيد، أو جرّب طريقة دفع أخرى.',
                'answer_en' => 'Ensure your payment details are correct, check if there are sufficient funds, or try another payment method.',
            ],
            [
                'question_ar' => 'كيف يمكنني الحصول على فاتورة شراء؟',
                'question_en' => 'How can I get a purchase invoice?',
                'answer_ar' => 'يمكنك تنزيل الفاتورة من حسابك أو طلبها من خدمة العملاء.',
                'answer_en' => 'You can download the invoice from your account or request it from customer service.',
            ],
            [
                'question_ar' => 'هل يمكنني تغيير طريقة الدفع الخاصة بي؟',
                'question_en' => 'Can I change my payment method?',
                'answer_ar' => 'نعم، من خلال إعدادات الحساب أو التواصل مع الدعم الفني.',
                'answer_en' => 'Yes, through your account settings or by contacting technical support.',
            ],
            [
                'question_ar' => 'كيف يمكنني تأمين حسابي من الاختراق؟',
                'question_en' => 'How can I secure my account from hacking?',
                'answer_ar' => 'استخدم كلمة مرور قوية، فعّل المصادقة الثنائية، ولا تشارك بياناتك مع أي شخص.',
                'answer_en' => 'Use a strong password, enable two-factor authentication, and do not share your data with anyone.',
            ],
            [
                'question_ar' => 'هل يتم تخزين بياناتي بشكل آمن؟',
                'question_en' => 'Is my data stored securely?',
                'answer_ar' => 'نعم، يتم تخزين البيانات باستخدام تقنيات التشفير والحماية المتقدمة.',
                'answer_en' => 'Yes, data is stored using encryption techniques and advanced security measures.',
            ],
            [
                'question_ar' => 'كيف يمكنني حذف حسابي نهائيًا؟',
                'question_en' => 'How can I permanently delete my account?',
                'answer_ar' => 'يمكنك حذف حسابك من الإعدادات أو عبر التواصل مع الدعم.',
                'answer_en' => 'You can delete your account from settings or by contacting support.',
            ],
            [
                'question_ar' => 'كيف أبلغ عن نشاط مشبوه أو احتيالي؟',
                'question_en' => 'How can I report suspicious or fraudulent activity?',
                'answer_ar' => 'أبلغ عن النشاط المشبوه من خلال خيار "الإبلاغ" أو تواصل مع الدعم فورًا.',
                'answer_en' => 'Report suspicious activity via the "Report" option or contact support immediately.',
            ],
            [
                'question_ar' => 'هل يمكنني تفعيل المصادقة الثنائية لحسابي؟',
                'question_en' => 'Can I enable two-factor authentication for my account?',
                'answer_ar' => 'نعم، يمكنك تفعيل المصادقة الثنائية من إعدادات الأمان في حسابك.',
                'answer_en' => 'Yes, you can enable two-factor authentication from your account security settings.',
            ]
        ]);
    }
}
