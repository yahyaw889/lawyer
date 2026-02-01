<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>

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
                <p class="text-3xl font-extrabold mb-4">
                    شركة التميمي ومشاركوه للمحاماة
                </p>
                <p class="text-lg leading-relaxed font-bold">
                    شريككم القانوني الموثوق. نقدم استشارات قانونية متكاملة وحلول مبتكرة لحماية مصالحك وتنمية أعمالك
                    بكفاءة واحترافية.
                </p>
            </div>
        </div>

        <!-- Left Section (Form) -->
        <div class="flex-1 flex items-center justify-center">
            <div class="w-full max-w-xl bg-white rounded-2xl  p-8">

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold mb-2 text-primary">
                        بوابة الموكلين والموظفين
                    </h1>
                    <p class="text-gray-500 font-semibold">
                        تسجيل الدخول لمتابعة القضايا والاستشارات
                    </p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}"
                    class="flex flex-col gap-5 border border-gray-600 rounded-2xl p-6">
                    @csrf
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            البريد الإلكتروني <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" placeholder="admin@gmail.com"
                            class="w-full p-3 rounded-lg border border-gray-300
                               focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            كلمة السر <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full p-3 rounded-lg border border-gray-300
                                   focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900">
                            <span class="absolute right-3 top-3 text-gray-400 cursor-pointer">
                                👁️
                            </span>
                        </div>
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="w-full p-3 flex items-center justify-between bg-gray-100 rounded-lg">

                        <label for="remember" class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                            <input id="remember" type="checkbox"
                                class="w-5 h-5 rounded-full border border-gray-400
                                   appearance-none cursor-pointer
                                   checked:bg-blue-900 checked:border-blue-900
                                   focus:outline-none focus:ring-2 focus:ring-blue-900
                                   relative
                                   checked:after:content-['✓']
                                   checked:after:text-white
                                   checked:after:absolute
                                   checked:after:top-1/2
                                   checked:after:left-1/2
                                   checked:after:-translate-x-1/2
                                   checked:after:-translate-y-1/2">
                            <span>تذكر كلمة السر</span>
                        </label>

                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                            نسيت كلمة المرور؟
                        </a>

                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-blue-900 text-white p-3 rounded-lg font-bold
                           hover:bg-blue-800 transition">
                        تسجيل الدخول
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
