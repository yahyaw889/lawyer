<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config('languages.supported.' . app()->getLocale() . '.dir', 'ltr') }}"
    class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AMN Global Law Firm | {{ __('frontend.hero.slogan') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif+Arabic:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&family=Noto+Sans+Arabic:wght@300;400;500;600;700;900&family=Public+Sans:wght@300;400;500;600;700;900&family=Noto+Kufi+Arabic:wght@100..900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#002349",
                        "secondary": "#C5A059",
                        "legal-gold": "#C5A059",
                        "legal-navy": "#1A2433",
                        "royal-blue": "#002349",
                        "gold-accent": "#C5A059",
                        "soft-white": "#FDFDFD",
                        "background-light": "#F8F9FA",
                        "border-slate": "#E2E8F0",
                    },
                    fontFamily: {
                        "arabic": ["Cairo", "sans-serif"],
                        "serif": ["Playfair Display", "serif"],
                        "sans": ["Public Sans", "sans-serif"],
                        "amiri": ["Amiri", "serif"],
                    },
                },
            },
        }
    </script>

    <style type="text/tailwindcss">
        :root {
            --legal-navy: #0c2340;
            --legal-gold: #c5a059;
            --legal-beige: #f9f7f2;
            --legal-slate: #4a5568;
            --primary: #002349;
            --accent: #C5A059;
            --soft-white: #FDFDFD;
        }

        @layer base {
            body {
                @apply bg-soft-white font-arabic text-royal-blue;
            }
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    @stack('styles')
</head>

<body class="antialiased">

    <div id="app-container">
        @yield('content')
    </div>

</body>

</html>
