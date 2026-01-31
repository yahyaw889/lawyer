<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد البريد الإلكتروني</title>

    <!-- Google Font: Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        cairo: ['Cairo', 'sans-serif'],
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-white font-cairo overflow-hidden">

    <div class="flex h-screen">

        <!-- Right Section (Image Cover) -->
        <div class="hidden lg:block w-[713px] h-screen relative">
            <img src="{{ asset('img/login.png') }}" alt="Illustration"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute top-1/4 left-10 text-white w-2/3">
                <p class="text-2xl font-extrabold mb-4">
                    منصة إدارة المنشآت (إيواء)
                </p>
                <p class="text-lg leading-relaxed">
                    نظام متكامل لإدارة الفنادق، الشقق المفروشة، والوحدات السكنية من مكان واحد بسهولة.
                </p>
            </div>
        </div>

        <!-- Left Section (Form) -->
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full max-w-xl bg-white rounded-2xl p-8">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold mb-2">
                        تأكيد البريد الإلكتروني 📧
                    </h1>
                    <p class="text-gray-500 mt-2 leading-relaxed">
                        شكراً لتسجيلك! قبل البدء، يرجى تأكيد بريدك الإلكتروني بالنقر على الرابط الذي أرسلناه إليك للتو.
                        إذا لم تستلم البريد، سنرسل لك واحداً آخر بكل سرور.
                    </p>
                </div>

                <!-- Session Status -->
                @if (session('status') == 'verification-link-sent')
                    <div
                        class="mb-6 font-medium text-sm text-green-600 text-center bg-green-50 p-3 rounded-lg border border-green-200">
                        تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.
                    </div>
                @endif

                <!-- Form -->
                <div class="flex flex-col gap-5 border border-gray-600 rounded-2xl p-6">

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                            class="w-full bg-blue-900 text-white p-3 rounded-lg font-bold
                               hover:bg-blue-800 transition">
                            إعادة إرسال البريد الإلكتروني
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="text-center">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-red-600 underline">
                            تسجيل الخروج
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>

</body>

</html>
