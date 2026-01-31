<div id="home" class="h-screen flex flex-col overflow-hidden bg-white">
    <!-- Header (Compact) -->
    <header class="bg-white border-b border-gray-100 h-16 flex-none z-50 transition-all duration-300 hover:shadow-md">
        <div class="h-full px-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="border-r border-gold-accent pr-4 h-8 flex items-center">
                    <h1
                        class="text-xl font-bold tracking-tight text-royal-blue leading-none hover:opacity-80 transition-opacity cursor-pointer">
                        AL-TAMIMI & CO
                    </h1>
                </div>
                <!-- Hover effect on subtitle -->
                <p
                    class="text-[10px] uppercase tracking-[0.2em] text-gold-accent font-sans hidden md:block transition-all duration-300 hover:tracking-[0.3em]">
                    Legal Excellence
                </p>
            </div>
            <nav class="flex items-center gap-6 text-xs font-medium">
                <!-- Nav Link Hover -->
                <a href="#home"
                    class="text-gold-accent border-b border-gold-accent pb-0.5 transition-all duration-300 hover:text-royal-blue hover:border-royal-blue hover:-translate-y-0.5">العربية</a>
                <span class="text-gray-300">|</span>
                <span
                    class="text-gray-500 font-sans tracking-widest hover:text-gold-accent transition-colors duration-300 cursor-default">+966-11-000-0000</span>
            </nav>
        </div>
    </header>

    <!-- Main Content (Split Layout) -->
    <main class="flex-1 flex flex-col lg:flex-row h-[calc(100vh-4rem)]">

        <!-- Left Section: Information (60% width on Desktop) -->
        <section
            class="relative lg:w-3/5 bg-royal-blue text-white p-8 lg:p-16 flex flex-col justify-center overflow-hidden group">
            <!-- Background element -->
            <div
                class="absolute top-0 right-0 w-64 h-full bg-white/5 skew-x-12 translate-x-32 animate-flow-bg group-hover:translate-x-24 transition-transform duration-700">
            </div>

            <div class="relative z-10 max-w-2xl">
                <!-- Badge Hover -->
                <div
                    class="inline-flex items-center gap-2 mb-6 border border-gold-accent/30 px-3 py-1 rounded-full bg-royal-blue/50 backdrop-blur-sm w-fit transition-all duration-300 hover:bg-royal-blue/80 hover:border-gold-accent hover:shadow-[0_0_15px_rgba(197,160,89,0.3)] cursor-default">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold-accent animate-pulse"></span>
                    <span class="text-[10px] tracking-[0.2em] uppercase font-sans text-metallic-shine font-bold">Premium
                        Legal
                        Services</span>
                </div>

                <h2 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight tracking-wide">
                    نجمع بين <span class="text-metallic-shine">الخبرة العميقة</span> <br><br>
                    والابتكار المهني
                </h2>

                <p
                    class="text-gray-300 text-sm md:text-base leading-relaxed font-bold mb-10 max-w-lg text-justify hover:text-white transition-colors duration-500">
                    شريككم الموثوق في المملكة. نقدم حلولاً قانونية متكاملة تتماشى مع الرؤية، مع التركيز على الجودة،
                    السرعة، والأمان لحماية مصالح عملائنا وتنمية أعمالهم.
                </p>

                <!-- Stats Grid (Compact) -->
                <div class="grid grid-cols-2 gap-8 border-t border-white/10 pt-8 max-w-md">
                    <div class="group/stat cursor-default">
                        <p
                            class="text-4xl font-extrabold text-white mb-1 group-hover/stat:text-gold-accent transition-colors duration-300">
                            +15</p>
                        <p
                            class="text-xs font-bold text-gray-400 uppercase tracking-wider group-hover/stat:text-gray-200 transition-colors">
                            عاماً من الخبرة</p>
                    </div>
                    <div class="group/stat cursor-default">
                        <p
                            class="text-4xl font-extrabold text-white mb-1 group-hover/stat:text-gold-accent transition-colors duration-300">
                            500+</p>
                        <p
                            class="text-xs font-bold text-gray-400 uppercase tracking-wider group-hover/stat:text-gray-200 transition-colors">
                            قضية ناجحة</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Right Section: Navigation Grid (40% width on Desktop) -->
        <section class="lg:w-2/5 grid grid-cols-2 grid-rows-2 h-full bg-gray-50">

            <style>
                @keyframes float-diagonal {

                    0%,
                    100% {
                        transform: translate(0, 0);
                    }

                    50% {
                        transform: translate(-3px, -3px);
                    }
                }

                .animate-float-diagonal {
                    animation: float-diagonal 2s ease-in-out infinite;
                }

                @keyframes shimmer-y {
                    0% {
                        transform: translateY(-100%);
                    }

                    100% {
                        transform: translateY(100%);
                    }
                }

                .animate-shimmer-y {
                    animation: shimmer-y 2s linear infinite;
                }

                @keyframes flow-bg {
                    0% {
                        transform: translate(128px, 0) skewX(12deg);
                    }

                    50% {
                        transform: translate(100px, 20px) skewX(12deg);
                    }

                    100% {
                        transform: translate(128px, 0) skewX(12deg);
                    }
                }

                .animate-flow-bg {
                    animation: flow-bg 8s ease-in-out infinite;
                }

                @keyframes shine-metallic {
                    0% {
                        background-position: 0% 50%;
                    }

                    100% {
                        background-position: 200% 50%;
                    }
                }

                .animate-shimmer-metallic {
                    /* User defined gradient: Blue -> Gold -> Blue */
                    background: linear-gradient(135deg, #1e3a8a 0%, #d4af37 50%, #1e3a8a 100%);
                    background-size: 200% 200%;
                    animation: shimmer-y 2s linear infinite, shine-metallic 3s linear infinite;
                    box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
                }

                .text-metallic-shine {
                    background: linear-gradient(135deg, #997b2f 0%, #d4af37 25%, #f7ef8a 50%, #d4af37 75%, #997b2f 100%);
                    background-size: 200% auto;
                    color: transparent;
                    background-clip: text;
                    -webkit-background-clip: text;
                    animation: shine-metallic 3s linear infinite;
                }
            </style>

            <!-- Button 1 -->
            <a href="#home"
                class="relative group border-l border-b border-gray-200 bg-white hover:bg-gold-accent transition-all duration-500 ease-out flex flex-col items-center justify-center p-6 text-center overflow-hidden hover:-translate-y-1 hover:shadow-2xl z-0 hover:z-10">
                <!-- Metallic Shine Line Animation -->
                <div class="absolute right-0 top-0 w-1.5 h-full bg-gray-50 group-hover:bg-white/10 overflow-hidden">
                    <div class="absolute inset-0 w-full h-1/2 animate-shimmer-metallic"></div>
                </div>

                <div
                    class="absolute inset-0 bg-gold-accent transform origin-bottom-right scale-0 transition-transform duration-500 ease-out group-hover:scale-105 opacity-10">
                </div>

                <!-- Animated Arrow -->
                <div
                    class="absolute top-4 left-4 text-gray-300 group-hover:text-royal-blue transition-colors duration-300 animate-float-diagonal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 transform -rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>

                <span
                    class="text-sm font-black absolute top-4 right-4 group-hover:text-royal-blue transition-colors duration-300 text-metallic-shine">01</span>
                <h3
                    class="text-xl font-black text-royal-blue group-hover:text-white mb-2 transition-colors duration-300 relative z-10">
                    من نحن</h3>
                <p
                    class="text-xs font-bold text-gray-600 group-hover:text-white/90 transition-colors duration-300 relative z-10">
                    نبذة عن خبراتنا وفريقنا</p>
            </a>

            <!-- Button 2 -->
            <a href="#services"
                class="relative group border-b border-gray-200 bg-white hover:bg-gold-accent transition-all duration-500 ease-out flex flex-col items-center justify-center p-6 text-center overflow-hidden hover:-translate-y-1 hover:shadow-2xl z-0 hover:z-10">
                <!-- Metallic Shine Line Animation -->
                <div class="absolute right-0 top-0 w-1.5 h-full bg-gray-50 group-hover:bg-white/10 overflow-hidden">
                    <div class="absolute inset-0 w-full h-1/2 animate-shimmer-metallic" style="animation-delay: 0.6s;">
                    </div>
                </div>

                <div
                    class="absolute inset-0 bg-gold-accent transform origin-bottom-left scale-0 transition-transform duration-500 ease-out group-hover:scale-105 opacity-10">
                </div>

                <!-- Animated Arrow -->
                <div
                    class="absolute top-4 left-4 text-gray-300 group-hover:text-royal-blue transition-colors duration-300 animate-float-diagonal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 transform -rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>

                <span
                    class="text-sm font-black absolute top-4 right-4 group-hover:text-royal-blue transition-colors duration-300 text-metallic-shine">02</span>
                <h3
                    class="text-xl font-black text-royal-blue group-hover:text-white mb-2 transition-colors duration-300 relative z-10">
                    تأسيس الشركات</h3>
                <p
                    class="text-xs font-bold text-gray-600 group-hover:text-white/90 transition-colors duration-300 relative z-10">
                    خدمات المستثمرين والشركات</p>
            </a>

            <!-- Button 3 (Primary Focus) -->
            <a href="#consultation"
                class="relative group border-l border-gray-200 bg-royal-blue hover:bg-royal-blue/90 transition-all duration-500 ease-out flex flex-col items-center justify-center p-6 text-center overflow-hidden hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(30,58,138,0.5)] z-0 hover:z-10">
                <!-- Metallic Shine Line Animation -->
                <div class="absolute right-0 top-0 w-1.5 h-full bg-white/5 overflow-hidden">
                    <div class="absolute inset-0 w-full h-1/2 animate-shimmer-metallic" style="animation-delay: 1.2s;">
                    </div>
                </div>

                <div
                    class="absolute inset-0 bg-white/5 transform origin-top-right scale-0 transition-transform duration-500 ease-out group-hover:scale-100">
                </div>

                <!-- Animated Arrow -->
                <div
                    class="absolute top-4 left-4 text-gold-accent group-hover:text-white transition-colors duration-300 animate-float-diagonal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 transform -rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>

                <span class="text-sm font-black absolute top-4 right-4 text-metallic-shine">03</span>
                <h3 class="text-2xl font-black text-gold-accent mb-2 relative z-10 text-metallic-shine">استشارة فورية
                </h3>
                <p
                    class="text-xs font-bold text-gray-300 relative z-10 transition-colors duration-300 group-hover:text-white">
                    تواصل مباشر مع المستشار</p>
            </a>

            <!-- Button 4 -->
            <a href="#request"
                class="relative group bg-white hover:bg-gold-accent transition-all duration-500 ease-out flex flex-col items-center justify-center p-6 text-center overflow-hidden hover:-translate-y-1 hover:shadow-2xl z-0 hover:z-10">
                <!-- Metallic Shine Line Animation -->
                <div class="absolute right-0 top-0 w-1.5 h-full bg-gray-50 group-hover:bg-white/10 overflow-hidden">
                    <div class="absolute inset-0 w-full h-1/2 animate-shimmer-metallic" style="animation-delay: 1.8s;">
                    </div>
                </div>

                <div
                    class="absolute inset-0 bg-gold-accent transform origin-top-left scale-0 transition-transform duration-500 ease-out group-hover:scale-105 opacity-10">
                </div>

                <!-- Animated Arrow -->
                <div
                    class="absolute top-4 left-4 text-gray-300 group-hover:text-royal-blue transition-colors duration-300 animate-float-diagonal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 transform -rotate-45">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>

                <span
                    class="text-sm font-black absolute top-4 right-4 group-hover:text-royal-blue transition-colors duration-300 text-metallic-shine">04</span>
                <h3
                    class="text-xl font-black text-royal-blue group-hover:text-white mb-2 transition-colors duration-300 relative z-10">
                    طلب خدمة</h3>
                <p
                    class="text-xs font-bold text-gray-600 group-hover:text-white/90 transition-colors duration-300 relative z-10">
                    نموذج الإجراءات القانونية</p>
            </a>

        </section>
    </main>
</div>
