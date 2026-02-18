 <section id="why-us" class="py-24 bg-[#1C1C1C] text-white relative overflow-hidden">
     <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
     </div>

     <div class="container mx-auto px-6 relative z-10">
         <div class="text-center mb-16">
             <h2 class="text-3xl md:text-5xl font-bold font-cairo text-white mb-6 leading-tight">
                 {{ __('frontend.why_partner.title') }}
             </h2>
             <p class="text-gray-400 text-lg max-w-2xl mx-auto font-cairo">
                 {{ __('frontend.why_partner.subtitle') }}
             </p>
         </div>

         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
             <!-- One Day Service -->
             <div class="bg-[#a41c1c] p-8 text-white relative overflow-hidden group">
                 <div class="absolute top-0 right-0 p-4 opacity-10">
                     <span class="material-symbols-outlined text-9xl">timer</span>
                 </div>
                 <div class="relative z-10">
                     <div class="flex items-center gap-4 mb-6">
                         <span class="material-symbols-outlined text-3xl">timer</span>
                         <h3 class="font-bold font-cairo text-xl">{{ __('frontend.one_day_service.title') }}</h3>
                     </div>
                     <p class="text-white/90 text-sm mb-6 leading-relaxed font-cairo">
                         {{ __('frontend.one_day_service.desc') }}
                     </p>
                     <ul class="space-y-3">
                         @foreach (range(0, 2) as $i)
                             <li class="flex items-center gap-3 text-sm font-medium text-white/90 font-cairo">
                                 <span class="material-symbols-outlined text-sm">check</span>
                                 {{ __('frontend.one_day_service.items.' . $i) }}
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>

             <!-- Why Us Cards -->
             @foreach (['team', 'knowledge', 'custom', 'proactive', 'integrity'] as $idx => $key)
                 <div
                     class="bg-[#2a2a2a] p-8 border border-gray-800 hover:border-[#a41c1c] transition-all duration-300 group">
                     <div
                         class="w-10 h-10 flex items-center justify-center mb-6 bg-[#333] group-hover:bg-[#a41c1c] transition-colors">
                         <span class="font-bold font-cairo text-white">0{{ $loop->iteration }}</span>
                     </div>
                     <h3
                         class="text-lg font-bold text-white mb-3 font-cairo group-hover:text-[#a41c1c] transition-colors">
                         {{ __('frontend.why_partner.cards.' . $key . '.title') }}
                     </h3>
                     <p class="text-gray-400 text-sm leading-relaxed font-cairo">
                         {{ __('frontend.why_partner.cards.' . $key . '.desc') }}
                     </p>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
