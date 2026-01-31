<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>

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
                        إعادة تعيين كلمة المرور 🔐
                    </h1>
                    <p class="text-gray-500">
                        أدخل كلمة المرور الجديدة لحسابك
                    </p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('password.store') }}"
                    class="flex flex-col gap-5 border border-gray-600 rounded-2xl p-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            البريد الإلكتروني <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email', $request->email) }}"
                            placeholder="example@domain.com"
                            class="w-full p-3 rounded-lg border border-gray-300
                               focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900"
                            required readonly>
                        @error('email')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            كلمة المرور الجديدة <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full p-3 rounded-lg border border-gray-300
                               focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900"
                            required autocomplete="new-password">
                        @error('password')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            تأكيد كلمة المرور <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full p-3 rounded-lg border border-gray-300
                               focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900"
                            required autocomplete="new-password">
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-blue-900 text-white p-3 rounded-lg font-bold
                           hover:bg-blue-800 transition">
                        حفظ كلمة المرور الجديدة
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
