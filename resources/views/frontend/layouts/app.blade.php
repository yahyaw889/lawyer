<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config('languages.supported.' . app()->getLocale() . '.dir', 'ltr') }}"
    class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @inject('seo', 'App\Services\SeoService')
    {!! $seo->generateTags() !!}
    {!! $seo->generateSchema() !!}

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

    <style>
        /* ===== Professional Page Transition ===== */

        /* Content fade */
        .transition-main {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        html.is-animating .transition-main {
            opacity: 0;
            transform: translateY(20px);
        }

        /* Overlay panels */
        .page-transition-overlay {
            position: fixed;
            inset: 0;
            z-index: 99999;
            pointer-events: none;
        }

        .page-transition-overlay .panel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: scaleX(0);
            transform-origin: left center;
        }

        .page-transition-overlay .panel-1 {
            background: #1C1C1C;
        }

        .page-transition-overlay .panel-2 {
            background: #a41c1c;
        }

        .page-transition-overlay .panel-3 {
            background: #FDFDFD;
        }

        /* Entering animation: panels sweep in then sweep out */
        html.is-changing .page-transition-overlay .panel {
            animation: panelWipe 0.9s cubic-bezier(0.77, 0, 0.175, 1) forwards;
        }

        html.is-changing .page-transition-overlay .panel-1 {
            animation-delay: 0s;
        }

        html.is-changing .page-transition-overlay .panel-2 {
            animation-delay: 0.08s;
        }

        html.is-changing .page-transition-overlay .panel-3 {
            animation-delay: 0.16s;
        }

        @keyframes panelWipe {
            0% {
                transform: scaleX(0);
                transform-origin: left center;
            }

            40% {
                transform: scaleX(1);
                transform-origin: left center;
            }

            60% {
                transform: scaleX(1);
                transform-origin: right center;
            }

            100% {
                transform: scaleX(0);
                transform-origin: right center;
            }
        }

        /* Logo spinner in center during transition */
        .page-transition-overlay .transition-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            opacity: 0;
            z-index: 10;
            width: 60px;
            height: 60px;
        }

        html.is-changing .page-transition-overlay .transition-logo {
            animation: logoReveal 0.9s cubic-bezier(0.77, 0, 0.175, 1) forwards;
        }

        @keyframes logoReveal {
            0% {
                transform: translate(-50%, -50%) scale(0) rotate(-180deg);
                opacity: 0;
            }

            30% {
                transform: translate(-50%, -50%) scale(1.1) rotate(0deg);
                opacity: 1;
            }

            60% {
                transform: translate(-50%, -50%) scale(1) rotate(0deg);
                opacity: 1;
            }

            85% {
                transform: translate(-50%, -50%) scale(0.8) rotate(90deg);
                opacity: 0.5;
            }

            100% {
                transform: translate(-50%, -50%) scale(0) rotate(180deg);
                opacity: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">

    <!-- Transition Overlay -->
    <div class="page-transition-overlay" aria-hidden="true">
        <div class="panel panel-1"></div>
        <div class="panel panel-2"></div>
        <div class="panel panel-3"></div>
        <img src="{{ asset('img/logo2.png') }}" alt="" class="transition-logo">
    </div>

    <div id="app-container">
        <main id="swup" class="transition-main">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/swup@4"></script>
    <script>
        // Global Accordion Toggle Function
        window.toggleAccordion = function(contentId, button) {
            const element = document.getElementById(contentId);
            const icon = button.querySelector('span:last-child');

            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                element.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        const swup = new Swup({
            containers: ["#swup"],
            cache: false,
            animationSelector: '[class*="transition-"]',
        });

        // Global Counter Animation Logic
        const initCounters = () => {
            const counters = document.querySelectorAll('.counter');
            if (counters.length === 0) return;

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const startTime = performance.now();

                // Reset first
                counter.innerText = '0';

                const updateCount = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                    counter.innerText = Math.floor(easeProgress * target);
                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target;
                    }
                };

                requestAnimationFrame(updateCount);
            });
        };

        // Run on initial load
        initCounters();

        // Run after every Swup page transition (Swup v4 correct API)
        swup.hooks.on('page:view', () => {
            // Delay slightly to ensure new DOM is rendered
            setTimeout(initCounters, 50);
        });
    </script>
</body>

</html>
