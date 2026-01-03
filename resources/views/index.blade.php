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
                        @forelse ($heroSlides as $slide)
                            <div class="glide__slide relative h-full">
                                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                    data-alt="{{ $slide->title }}"
                                    style="background-image: url('{{ $slide->image_path }}');">
                                </div>
                                <div class="absolute bottom-8 left-8 z-20">
                                    <p class="text-white text-sm font-medium uppercase tracking-widest mb-2">
                                        {{ $slide->subtitle ?: 'Featured Project' }}
                                    </p>
                                    <h3 class="text-white text-3xl font-bold">{{ $slide->title }}</h3>
                                </div>
                            </div>
                        @empty
                            <div class="glide__slide relative h-full">
                                <div class="absolute inset-0 bg-gray-900"></div>
                                <div class="absolute bottom-8 left-8 z-20">
                                    <p class="text-white text-sm font-medium uppercase tracking-widest mb-2">Featured Project</p>
                                    <h3 class="text-white text-3xl font-bold">XOCOL Studio</h3>
                                </div>
                            </div>
                        @endforelse
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
                @forelse ($services as $service)
                    <div
                        class="group relative p-8 rounded-lg bg-background-light dark:bg-background-dark border border-[#e9e8ce] dark:border-[#3a392a] hover:border-primary/50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div
                            class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-black dark:text-primary mb-6 group-hover:bg-primary group-hover:text-black transition-colors">
                            <span class="material-symbols-outlined">{{ $service->icon ?? 'star' }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">{{ $service->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">{{ $service->description }}</p>
                        <div class="absolute bottom-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="material-symbols-outlined text-primary dark:text-primary">arrow_outward</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        No services available yet.
                    </div>
                @endforelse
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
            @forelse ($projects as $project)
                <div class="min-w-[85vw] sm:min-w-[45vw] md:min-w-[35vw] snap-center group cursor-pointer">
                    <div class="overflow-hidden rounded-lg mb-6">
                        <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-800 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                            data-alt="{{ $project->title }}"
                            style="background-image: url('{{ $project->cover_image }}');">
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold mb-1 group-hover:text-primary transition-colors">{{ $project->title }}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 font-medium">{{ $project->content }}</p>
                        </div>
                        <span
                            class="text-xs font-bold border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full">
                            {{ optional($project->published_at)->format('Y') }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="min-w-full text-center text-gray-500">
                    No projects available yet.
                </div>
            @endforelse
        </div>
    </section>
    <!-- Stats Section -->
    <section class="py-20 bg-black text-white dark:bg-white dark:text-black" data-stats>
        <div class="max-w-7xl mx-auto px-4 sm:px-10">
            <div
                class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-800 dark:divide-gray-200">
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2"
                        data-counter
                        data-target="150"
                        data-suffix="+">0+</p>
                    <p class="text-lg font-medium tracking-wide">Happy Clients</p>
                </div>
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2"
                        data-counter
                        data-target="300"
                        data-suffix="+">0+</p>
                    <p class="text-lg font-medium tracking-wide">Projects Completed</p>
                </div>
                <div class="p-6">
                    <p class="text-primary dark:text-gray-600 text-6xl md:text-7xl font-bold mb-2"
                        data-counter
                        data-target="5">0</p>
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
                            @if ($testimonial->avatar_url)
                                <div class="size-12 rounded-full bg-gray-300 bg-cover bg-center"
                                    style="background-image: url('{{ $testimonial->avatar_url }}');">
                                </div>
                            @else
                                <div class="size-12 rounded-full bg-gray-300 flex items-center justify-center text-xs font-semibold text-gray-700">
                                    {{ strtoupper(substr($testimonial->author_name, 0, 2)) }}
                                </div>
                            @endif
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
    <script src="{{ asset('js/stats-counter.js') }}" defer></script>
</x-layouts.base>
