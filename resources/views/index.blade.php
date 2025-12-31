<x-layouts.base>
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex flex-col items-center justify-center px-4 pt-24 pb-12">
        <div class="absolute inset-0 z-0 overflow-hidden opacity-10 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary rounded-full blur-[128px]"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary rounded-full blur-[128px]"></div>
        </div>
        <div class="relative z-10 max-w-5xl mx-auto text-center flex flex-col gap-8 items-center">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#e9e8ce] dark:border-[#3a392a] bg-white/50 dark:bg-black/20 backdrop-blur-sm">
                <span class="size-2 rounded-full bg-primary animate-pulse"></span>
                <span class="text-xs font-semibold uppercase tracking-wider">Accepting New Projects</span>
            </div>
            <h1 class="text-5xl sm:text-7xl md:text-8xl font-black leading-[0.9] tracking-tighter text-balance">
                WE CRAFT <br />
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-black via-gray-700 to-black dark:from-white dark:via-gray-400 dark:to-white">DIGITAL
                    FUTURES</span>
            </h1>
            <p class="text-lg sm:text-xl font-normal max-w-2xl text-gray-600 dark:text-gray-300 leading-relaxed">
                XOCOL is a strategic design agency. We build high-impact identities and digital experiences for brands
                ready to scale.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 mt-4 w-full sm:w-auto">
                <button
                    class="bg-black dark:bg-white text-white dark:text-black font-bold text-base px-8 py-4 rounded-full hover:bg-gray-800 dark:hover:bg-gray-200 transition-colors w-full sm:w-auto">
                    View Case Studies
                </button>
                <button
                    class="bg-transparent border border-black dark:border-white text-black dark:text-white font-bold text-base px-8 py-4 rounded-full hover:bg-black/5 dark:hover:bg-white/10 transition-colors w-full sm:w-auto flex items-center justify-center gap-2">
                    Our Services <span class="material-symbols-outlined text-[18px]">arrow_downward</span>
                </button>
            </div>
        </div>
        <!-- Featured Abstract Visual -->
        <div class="relative mt-16 w-full max-w-6xl mx-auto">
            <div class="glide relative rounded-xl overflow-hidden aspect-[21/9] shadow-2xl group"
                data-hero-carousel>
                <div
                    class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-all duration-500 z-10 pointer-events-none">
                </div>
                <div class="glide__track h-full" data-glide-el="track">
                    <div class="glide__slides h-full">
                        <div class="glide__slide relative h-full">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                data-alt="Abstract geometric shapes in high contrast black and white with neon yellow accents"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAirr9fJ4-b9EITGljrRFdrkyMGSeVS0mLd1b2o2FoTbv6S97bxXQW1diR3Z_qhr2OCQJQcHwwgf1NzOgtKP1ZrHpZX-fjnl5aK2E-7DfcAGW7-3Lr2Y_iYFxV1MgOBXFHvo2W7p33h4g7lcWPr_3kH2_x4g0D-b99eOmzNLJbpY5sJuK6hd-xPwOQi9Kw2Y24KM9XhMUSkSa6-o67WQgrL9dTWgxzERLW7-qD7_72EE5vSnn5zT9Ec1OZqbBGfDRA6JYlYxvWZBoU');">
                            </div>
                            <div class="absolute bottom-8 left-8 z-20">
                                <p class="text-white text-sm font-medium uppercase tracking-widest mb-2">Featured Project</p>
                                <h3 class="text-white text-3xl font-bold">TechFlow Rebrand</h3>
                            </div>
                        </div>
                        <div class="glide__slide relative h-full">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                data-alt="Glass architectural detail with soft gradients and shadows"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC9Xkvu4r52QhhXjfzeW8ozjuZFF0g0sHxJElY4gXoDgv5e-xt0M5t1B7_zMnOq86I2ljVf0bLm9-3UG3O4gU5nrgi-o2L-d5mFzwv25Z-31yECBDyGQzLHtEmfdoH8NjZ4aqdMmzJf66id4WACb0iEwn-OAx2M1CUaaNmlbUZYQ8uH0p8zeSt5YEtv5U1nK1Cq9gH3uLvg_hDuhbzcYAV8dLTpNh31N_yaTN6M3IC1R3p7IcBqBAU6ZNr6lcLXh7urc6oNnlG5peAw');">
                            </div>
                            <div class="absolute bottom-8 left-8 z-20">
                                <p class="text-white text-sm font-medium uppercase tracking-widest mb-2">Featured Project</p>
                                <h3 class="text-white text-3xl font-bold">Lumen Spaces</h3>
                            </div>
                        </div>
                        <div class="glide__slide relative h-full">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                data-alt="Minimal device mockup with soft lighting and product UI"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAjmS4tVFLkRn9xAiSaoBAMFYb0WHf-RV1Kp08hu4WCbDt3gJw0NvRmUQ3U3ltiDjKdpq0f3EmL4v3PDAtaS7Zp2lfYkwoOEXAAx9AaAGQti5ImnflYVaxPXywB_GQ1seXP3-0bDY0NkWVo9hF_6GIR7KHz5G5fnAv2eAZaP2rbzRFm-M-mN9KZhVe3bku6BI6K_k_-S39Fea21BMvkYgXq6l1QASSMmrNVkgP7UpXw9kRI0RmAcC1K5pyPtKybSkQ2e9JzhEcKdeZE');">
                            </div>
                            <div class="absolute bottom-8 left-8 z-20">
                                <p class="text-white text-sm font-medium uppercase tracking-widest mb-2">Featured Project</p>
                                <h3 class="text-white text-3xl font-bold">Pulse Interface</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="glide__arrows absolute inset-0 z-30 pointer-events-none" data-glide-el="controls">
                    <button
                        class="pointer-events-auto hidden md:flex items-center justify-center absolute left-4 top-1/2 -translate-y-1/2 size-12 rounded-full bg-white/10 text-white border border-white/30 backdrop-blur-sm hover:bg-white/20 transition-colors"
                        type="button"
                        aria-label="Previous slide"
                        data-glide-dir="<">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                    <button
                        class="pointer-events-auto hidden md:flex items-center justify-center absolute right-4 top-1/2 -translate-y-1/2 size-12 rounded-full bg-white/10 text-white border border-white/30 backdrop-blur-sm hover:bg-white/20 transition-colors"
                        type="button"
                        aria-label="Next slide"
                        data-glide-dir=">">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="py-24 px-4 sm:px-10 bg-white dark:bg-[#1a190b]">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-4">Our Expertise</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Comprehensive creative solutions designed to
                        help your business grow and dominate your market.</p>
                </div>
                <a class="group flex items-center gap-2 text-base font-bold border-b-2 border-primary pb-1"
                    href="#">
                    All Services
                    <span
                        class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Service 1 -->
                <div
                    class="group relative p-8 rounded-lg bg-background-light dark:bg-background-dark border border-[#e9e8ce] dark:border-[#3a392a] hover:border-primary/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-black dark:text-primary mb-6 group-hover:bg-primary group-hover:text-black transition-colors">
                        <span class="material-symbols-outlined">palette</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Branding &amp; Identity</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Creating memorable visual systems that tell
                        your unique story.</p>
                    <div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary dark:text-primary">arrow_outward</span>
                    </div>
                </div>
                <!-- Service 2 -->
                <div
                    class="group relative p-8 rounded-lg bg-background-light dark:bg-background-dark border border-[#e9e8ce] dark:border-[#3a392a] hover:border-primary/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-black dark:text-primary mb-6 group-hover:bg-primary group-hover:text-black transition-colors">
                        <span class="material-symbols-outlined">lightbulb</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Digital Strategy</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Data-driven growth plans to position your
                        brand effectively.</p>
                    <div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary dark:text-primary">arrow_outward</span>
                    </div>
                </div>
                <!-- Service 3 -->
                <div
                    class="group relative p-8 rounded-lg bg-background-light dark:bg-background-dark border border-[#e9e8ce] dark:border-[#3a392a] hover:border-primary/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-black dark:text-primary mb-6 group-hover:bg-primary group-hover:text-black transition-colors">
                        <span class="material-symbols-outlined">monitoring</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Digital Marketing</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Performance campaigns that convert traffic
                        into loyal customers.</p>
                    <div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary dark:text-primary">arrow_outward</span>
                    </div>
                </div>
                <!-- Service 4 -->
                <div
                    class="group relative p-8 rounded-lg bg-background-light dark:bg-background-dark border border-[#e9e8ce] dark:border-[#3a392a] hover:border-primary/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div
                        class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-black dark:text-primary mb-6 group-hover:bg-primary group-hover:text-black transition-colors">
                        <span class="material-symbols-outlined">code</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Web Development</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Custom websites and apps built for speed,
                        scale, and performance.</p>
                    <div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-primary dark:text-primary">arrow_outward</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Carousel Section -->
    <section class="py-24 overflow-hidden bg-background-light dark:bg-background-dark">
        <div class="px-4 sm:px-10 mb-12 flex items-center justify-between max-w-7xl mx-auto w-full">
            <h2 class="text-4xl font-bold tracking-tight">Selected Work</h2>
            <div class="hidden sm:flex gap-2">
                <button
                    class="size-12 rounded-full border border-gray-300 dark:border-gray-700 flex items-center justify-center hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black transition-colors">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button
                    class="size-12 rounded-full border border-gray-300 dark:border-gray-700 flex items-center justify-center hover:bg-black hover:text-white dark:hover:bg-white dark:hover:text-black transition-colors">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        <div class="flex overflow-x-auto gap-6 px-4 sm:px-10 pb-8 scrollbar-hide snap-x snap-mandatory">
            <!-- Project 1 -->
            <div class="min-w-[85vw] sm:min-w-[45vw] md:min-w-[35vw] snap-center group cursor-pointer">
                <div class="overflow-hidden rounded-lg mb-6">
                    <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-800 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Minimalist coffee brand packaging design with geometric patterns"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBGYBs9gbGLF0bz5nAUWdeKHICAjLlkhpN0_5tNRfBOwiN54tHB5etn11ao3XcKG8WA5VhMEwzog2YUuM4Sk1iNTKbcDJObU4F18rm_JiHx-XRrXmrcANK38_eq4XyxsTk4JgAGcrcqT4usinXUWG2YVUHW8WwdC_rp0PmewsjbY6Q4a49NJaHU9gnof5X6AvP_wfdNxUoEWN3LX3W5igTKzt0PpzLIRNfmwgWdWHd--SPbKc74aq9H9uWq_7kSip4oToDVj9SvWJk');">
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold mb-1 group-hover:text-primary transition-colors">Urban Coffee
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">E-commerce Platform</p>
                    </div>
                    <span
                        class="text-xs font-bold border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full">2023</span>
                </div>
            </div>
            <!-- Project 2 -->
            <div class="min-w-[85vw] sm:min-w-[45vw] md:min-w-[35vw] snap-center group cursor-pointer">
                <div class="overflow-hidden rounded-lg mb-6">
                    <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-800 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Modern fintech mobile app interface dashboard on dark background"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBxmFr_Gmfqez06oRMCHVTnTokddgLvrPDyNiA1wEBrq5rnET1e9GJRcz9wSYavpFusCfKDXbN-xXO-InmnKxP7WqBkRlLjAfP_ki_2eS2aiF2yIxoY51GOzWycST31s68GeyAlKRGxRV2Ab77RZtXRvbCzNkGhp8UtdT8YlQdD4N-5D4MbZJiYcEAqz8JUOj3EuDt4lzHPCPEV78_4eBG7VeZDwiwU6wSMmbo0DJj18BVOR8OOR3L_AovrpDnLW_lCr9n7UM-_3u8');">
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold mb-1 group-hover:text-primary transition-colors">Nexus App</h3>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">SaaS Application</p>
                    </div>
                    <span
                        class="text-xs font-bold border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full">2023</span>
                </div>
            </div>
            <!-- Project 3 -->
            <div class="min-w-[85vw] sm:min-w-[45vw] md:min-w-[35vw] snap-center group cursor-pointer">
                <div class="overflow-hidden rounded-lg mb-6">
                    <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-800 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Sleek corporate stationery mockup with solar energy branding"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAdKBT62QGIebVuVe3X6ajSrVX2GVk1OkxrIsb2RX6LgW2MQoSJfUEVsUvcRz0pZ9aYPNS26gE-9MSQLwhCpeB3JRu1U0oxbobH0R72sS8ZH6oB_83TpFMJYZvdDfVpxAdpaDPOOMS5RaCD5BQmVtpwXQ2hnElY8VN5EgTNJfDfkt1YKpahl0CafWgXYeB2CISMuogtHCDKhOBb2G-cet4JfB8Pwh_-XDB8OvEQkuWIAMceY-g29a-hDhEvf64nRuJTh5JXwSf-pHw');">
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold mb-1 group-hover:text-primary transition-colors">Solaris Identity
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Corporate Branding</p>
                    </div>
                    <span
                        class="text-xs font-bold border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full">2022</span>
                </div>
            </div>
            <!-- Project 4 -->
            <div class="min-w-[85vw] sm:min-w-[45vw] md:min-w-[35vw] snap-center group cursor-pointer">
                <div class="overflow-hidden rounded-lg mb-6">
                    <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-800 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Fashion editorial website layout on laptop screen"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAy0InDnJC99EhV3KRxYCLhXP_JjOqluJ233N9VkU84L_n5bFBIt7vKCUAVYOI_CDmlJk9leuhDLpxLI32ETMur00kz-S3JZCNcScUscVsERP-eT61r1QIos-gNk6IjT5MSMDNJViPEKRrcTIdhkQtvRVMYuC68ylRnWIfjFc3WjbZ6KKX83pH7OUJJyIdzfl9cHESiE6AtfoUTS0N6mdz860nHie3Pu5cNrh5GDcIhbh40ve_rHj2k7lIsxalcfVkGGZtpZXSP-rA');">
                    </div>
                </div>
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-2xl font-bold mb-1 group-hover:text-primary transition-colors">Vogue Style</h3>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Web Design</p>
                    </div>
                    <span
                        class="text-xs font-bold border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full">2022</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Stats Section -->
    <section class="py-20 bg-black text-white dark:bg-white dark:text-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-10">
            <div
                class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-800 dark:divide-gray-200">
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2">150+</p>
                    <p class="text-lg font-medium tracking-wide">Happy Clients</p>
                </div>
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2">300+</p>
                    <p class="text-lg font-medium tracking-wide">Projects Completed</p>
                </div>
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2">5</p>
                    <p class="text-lg font-medium tracking-wide">Years Experience</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section class="py-24 px-4 sm:px-10 bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold tracking-tight mb-16 text-center">What Clients Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($testimonials as $testimonial)
                    <div
                        class="bg-white dark:bg-[#1a190b] p-8 rounded-lg shadow-sm border border-[#e9e8ce] dark:border-[#3a392a] flex flex-col justify-between">
                        <div>
                            <div class="flex gap-1 text-primary mb-6">
                                @for ($star = 0; $star < max(1, min(5, $testimonial->rating)); $star++)
                                    <span class="material-symbols-outlined fill-current">star</span>
                                @endfor
                            </div>
                            <p class="text-lg italic text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                                "{{ $testimonial->quote }}"
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="size-12 rounded-full bg-gray-300 bg-cover bg-center"
                                style="background-image: url('{{ $testimonial->avatar_url }}');">
                            </div>
                            <div>
                                <p class="font-bold text-sm">{{ $testimonial->author_name }}</p>
                                <p class="text-xs text-gray-500">{{ $testimonial->author_title }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        No testimonials available yet.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.base>
