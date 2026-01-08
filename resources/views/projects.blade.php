<x-layouts.base theme="dark" bodyClass="projects-page">
    <style>
        body.projects-page {
            background-color: #0A0A0A !important;
        }

        .projects-page .bg-background-dark,
        .projects-page .dark\:bg-background-dark {
            --tw-bg-opacity: 1;
            background-color: #0A0A0A !important;
        }

        .projects-page .bg-background-dark\/95,
        .projects-page .dark\:bg-background-dark\/95 {
            background-color: rgba(10, 10, 10, 0.95) !important;
        }

        .projects-page .bg-background-dark\/90,
        .projects-page .dark\:bg-background-dark\/90 {
            background-color: rgba(10, 10, 10, 0.9) !important;
        }

        .projects-page .bg-background-dark\/80,
        .projects-page .dark\:bg-background-dark\/80 {
            background-color: rgba(10, 10, 10, 0.8) !important;
        }

        .masonry-grid {
            column-count: 1;
            column-gap: 2rem;
        }

        @media (min-width: 640px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        @media (min-width: 1024px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 2rem;
        }
    </style>

    <section class="pt-28 pb-16 px-4 sm:px-10">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-3xl">
                <div
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#3a392a] bg-black/20">
                    <span class="size-2 rounded-full bg-primary animate-pulse"></span>
                    <span class="text-xs font-semibold uppercase tracking-wider">Selected Work</span>
                </div>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black tracking-tight leading-[1.05] mt-6">
                    Work that shapes the
                    <span class="text-primary">future</span>.
                </h1>
                <p class="text-lg md:text-xl text-gray-300 font-light leading-relaxed max-w-2xl mt-6 border-l-2 border-primary pl-6">
                    Explore projects where we combine identity, strategy, and technology for brands that want to lead.
                </p>
            </div>
        </div>
    </section>

    <section class="sticky top-[72px] z-40 bg-background-dark/95 backdrop-blur-md border-b border-[#3a392a]">
        <div class="max-w-7xl mx-auto px-4 sm:px-10 py-4">
            <div class="flex flex-wrap gap-3 overflow-x-auto pb-2 scrollbar-hide">
                {{-- ALL --}}
                <a href="{{ route('projects.index') }}"
                class="px-5 py-2.5 rounded-full text-sm font-bold transition-all
                {{ empty($activeService)
                        ? 'bg-primary text-black shadow-[0_0_12px_rgba(249,245,6,0.3)]'
                        : 'border border-[#3a392a] bg-black/20 text-gray-300 hover:text-primary hover:border-primary/50' }}">
                    All
                </a>

                {{-- SERVICES --}}
                @foreach ($services as $service)
                    <a href="{{ route('projects.index', ['service' => $service->slug]) }}"
                    class="px-5 py-2.5 rounded-full text-sm font-medium transition-all
                    {{ ($activeService === $service->slug)
                            ? 'bg-primary text-black shadow-[0_0_12px_rgba(249,245,6,0.3)]'
                            : 'border border-[#3a392a] bg-black/20 text-gray-300 hover:text-primary hover:border-primary/50' }}">
                        {{ $service->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-4 sm:px-10 pb-24 pt-10">
        <div class="max-w-7xl mx-auto">
            <div class="masonry-grid w-full">
                @forelse ($projects as $project)
                    @php
                        $size = (int) ($project->grid_image_size ?? 1);
                        $aspectClass = match ($size) {
                            1 => 'aspect-video',
                            2 => 'aspect-square',
                            3 => 'aspect-[3/4]',
                            default => 'aspect-square',
                        };
                        $gridImage = $project->grid_image ?: $project->cover_image;
                        $category = $project->services->first()?->name ?? 'Project';
                    @endphp
                    <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                        @if ($gridImage)
                            <img
                                alt="{{ $project->title }}"
                                class="w-full h-auto object-cover {{ $aspectClass }} transition-transform duration-700 group-hover:scale-105"
                                src="{{ $gridImage }}" />
                        @else
                            <div
                                class="w-full {{ $aspectClass }} bg-black/40 border border-[#3a392a] flex items-center justify-center text-gray-500">
                                No image
                            </div>
                        @endif
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                            <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">{{ $category }}</span>
                            <h3 class="text-white text-3xl font-bold leading-tight mb-4">{{ $project->title }}</h3>
                            <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                                <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                                <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500 py-12 text-center">
                        No projects available yet.
                    </div>
                @endforelse
            </div>
            <div class="flex justify-center mt-12">
                {{-- TODO: Integrar paginador (diseño)
                    <div>
                        {{ $projects->links() }}
                    </div>
                --}}
                <button
                    class="flex items-center gap-3 text-gray-400 font-semibold hover:text-primary transition-colors group">
                    <span class="material-symbols-outlined text-2xl group-hover:animate-bounce">expand_more</span>
                    Load more projects
                </button>
            </div>
        </div>
    </section>
</x-layouts.base>
