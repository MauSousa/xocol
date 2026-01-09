<x-layouts.base theme="dark" bodyClass="project-detail-page">
    <style>
        body.project-detail-page {
            background-color: #0A0A0A !important;
        }

        .project-detail-page .bg-background-dark,
        .project-detail-page .dark\:bg-background-dark {
            --tw-bg-opacity: 1;
            background-color: #0A0A0A !important;
        }

        .project-detail-page .bg-background-dark\/95,
        .project-detail-page .dark\:bg-background-dark\/95 {
            background-color: rgba(10, 10, 10, 0.95) !important;
        }

        .project-detail-page .bg-background-dark\/90,
        .project-detail-page .dark\:bg-background-dark\/90 {
            background-color: rgba(10, 10, 10, 0.9) !important;
        }

        .project-detail-page .bg-background-dark\/80,
        .project-detail-page .dark\:bg-background-dark\/80 {
            background-color: rgba(10, 10, 10, 0.8) !important;
        }
    </style>

    <section class="pt-28 pb-12 px-4 sm:px-10">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-8 max-w-4xl">
                <div class="flex items-center gap-3">
                    <span class="h-px w-12 bg-primary"></span>
                    <span class="text-primary font-bold tracking-[0.2em] text-xs uppercase">Case Study</span>
                </div>
                <h1 class="text-white text-5xl md:text-7xl lg:text-8xl font-black leading-[0.9] tracking-tighter uppercase">
                    {{ $project->title }}<br />
                    <span class="text-white/40">{{ $project->services->first()?->name ?? 'Case Study' }}</span>
                </h1>
            </div>

            <div class="mt-12 relative w-full aspect-video md:aspect-[21/9] overflow-hidden group shadow-2xl border border-white/5 rounded-2xl">
                <div
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat transform transition-transform duration-1000 scale-105 group-hover:scale-100"
                    data-alt="{{ $project->title }}"
                    style="background-image: url('{{ $project->cover_image }}');">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
            </div>
        </div>
    </section>

    <section class="px-4 sm:px-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12 py-10 border-t border-white/10 mb-24">
                <div class="flex flex-col gap-2 border-l border-white/10 pl-6">
                    <p class="text-gray-500 text-xs font-mono uppercase tracking-widest">Servicios</p>
                    @php
                        $servicesList = $project->services->pluck('name')->filter()->implode('<br />');
                    @endphp
                    <p class="text-white text-sm font-medium leading-relaxed">{!! $servicesList ?: 'Project' !!}</p>
                </div>
                <div class="flex flex-col gap-2 border-l border-white/10 pl-6">
                    <p class="text-gray-500 text-xs font-mono uppercase tracking-widest">Cliente</p>
                    <p class="text-white text-lg font-bold">XOCOL</p>
                </div>
                <div class="flex flex-col gap-2 border-l border-white/10 pl-6">
                    <p class="text-gray-500 text-xs font-mono uppercase tracking-widest">Año</p>
                    <p class="text-white text-lg font-bold">{{ optional($project->published_at)->format('Y') ?? '—' }}</p>
                </div>
                <div class="flex flex-col gap-2 border-l border-white/10 pl-6">
                    <p class="text-gray-500 text-xs font-mono uppercase tracking-widest">Industria</p>
                    <p class="text-white text-lg font-bold">—</p>
                </div>
            </div>

            @if ($project->blocks->isNotEmpty())
                <div class="flex flex-col gap-16 mb-24">
                    @php
                        $blocks = $project->blocks->values();
                    @endphp
                    @for ($i = 0; $i < $blocks->count(); $i++)
                        @php
                            $block = $blocks[$i];
                            $blockData = $block->data ?? [];
                            $next = $blocks[$i + 1] ?? null;
                            $nextData = $next?->data ?? [];
                            $paired = $block->type === 'heading' && $next && $next->type === 'rich_text';
                        @endphp

                        @if ($paired)
                            <div class="flex flex-col md:flex-row gap-16 items-start">
                                <div class="md:w-1/3 sticky top-32">
                                    <h3 class="text-4xl text-white font-bold leading-none tracking-tight">{{ $blockData['text'] ?? '' }}</h3>
                                    <div class="w-12 h-1 bg-primary mt-6"></div>
                                </div>
                                <div class="md:w-2/3 text-gray-300 text-xl font-light leading-relaxed">
                                    @if (!empty($nextData['html']))
                                        {!! $nextData['html'] !!}
                                    @elseif (!empty($nextData['text']))
                                        {!! nl2br(e($nextData['text'])) !!}
                                    @endif
                                </div>
                            </div>
                            @php $i++; @endphp
                            @continue
                        @endif

                        @if ($block->type === 'heading')
                            <div>
                                <h3 class="text-4xl text-white font-bold leading-none tracking-tight">{{ $blockData['text'] ?? '' }}</h3>
                                <div class="w-12 h-1 bg-primary mt-6"></div>
                            </div>
                        @elseif ($block->type === 'rich_text')
                            <div class="text-gray-300 text-xl font-light leading-relaxed max-w-3xl">
                                @if (!empty($blockData['html']))
                                    {!! $blockData['html'] !!}
                                @elseif (!empty($blockData['text']))
                                    {!! nl2br(e($blockData['text'])) !!}
                                @endif
                            </div>
                        @elseif ($block->type === 'image')
                            @php
                                $imageUrl = $blockData['url'] ?? null;
                                $imageAlt = $blockData['alt'] ?? $project->title;
                            @endphp
                            @if ($imageUrl)
                                <div class="w-full overflow-hidden border border-white/5 rounded-2xl">
                                    <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}" class="w-full h-auto object-cover">
                                </div>
                            @endif
                        @endif
                    @endfor
                </div>
            @endif

            <div class="flex flex-col md:flex-row items-center justify-between py-10 border-y border-white/10 mb-32 bg-black/30 px-8 rounded-2xl backdrop-blur-sm">
                <div class="flex gap-12 mb-6 md:mb-0">
                    <div class="flex items-center gap-3 text-gray-400">
                        <span class="material-symbols-outlined text-[24px]">visibility</span>
                        <div class="flex flex-col">
                            <span class="text-white text-lg font-bold leading-none">{{ number_format($project->views_count ?? 0) }}</span>
                            <span class="text-[10px] uppercase tracking-wider font-bold">Vistas</span>
                        </div>
                    </div>
                    <button class="flex items-center gap-3 text-gray-400 hover:text-primary transition-colors group">
                        <span class="material-symbols-outlined text-[24px] group-hover:fill-current transition-colors">favorite</span>
                        <div class="flex flex-col text-left">
                            <span class="text-white text-lg font-bold leading-none group-hover:text-primary transition-colors">{{ number_format($project->likes_count ?? 0) }}</span>
                            <span class="text-[10px] uppercase tracking-wider font-bold">Likes</span>
                        </div>
                    </button>
                </div>
                <div class="flex items-center gap-6">
                    <span class="text-gray-400 text-xs font-bold uppercase tracking-widest">Compartir</span>
                    <div class="flex gap-4">
                        <a class="w-10 h-10 flex items-center justify-center rounded-full border border-white/10 text-white hover:bg-primary hover:text-black hover:border-primary transition-all duration-300 text-sm font-bold" href="#">in</a>
                        <a class="w-10 h-10 flex items-center justify-center rounded-full border border-white/10 text-white hover:bg-primary hover:text-black hover:border-primary transition-all duration-300 text-sm font-bold" href="#">fb</a>
                        <a class="w-10 h-10 flex items-center justify-center rounded-full border border-white/10 text-white hover:bg-primary hover:text-black hover:border-primary transition-all duration-300 text-sm font-bold" href="#">x</a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-12 pb-24">
                <div class="flex flex-col md:flex-row justify-between items-end gap-4 pb-4 border-b border-white/10">
                    <h2 class="text-white text-4xl md:text-5xl font-bold uppercase tracking-tighter">Siguiente<br />Proyecto</h2>
                    <a class="text-white text-sm font-bold uppercase tracking-widest hover:text-primary transition-colors flex items-center gap-2 group mb-2" href="{{ route('projects.index') }}">
                        Ver todos los proyectos
                        <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <a class="group flex flex-col gap-4" href="#">
                        <div class="w-full aspect-[3/4] overflow-hidden bg-black/60 relative rounded-2xl">
                            <div
                                class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0"
                                data-alt="Minimalist skincare product packaging in pastel colors"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBd0X8O3GI9nDVhGBvInnPgE2ft-xw40RwogDOyXyuJ4nbeLpCzSDWXGq8p4CGbcvzB8Zg3kkUlYQmUXmjt0rVFpj-fs1zZ6doA51oNPnqqD2O5DA85CLG5MXlTGj2SgAcEm6xpIaSWhQngRNvwBGoqLkCqCp4EsKvSiLdEe7iXm_WQBksGrmo-fneNmmPJtEk2tdYK8W6oQ5uh8CyJ0xlxzbXcF10PsJpKXrYIWQXh4hXoz9gIoPZR5uPNbbOhuUYHwufTsAUz7vU");'>
                            </div>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                            <div class="absolute top-4 right-4 bg-primary text-black text-[10px] font-bold px-2 py-1 uppercase opacity-0 group-hover:opacity-100 transition-opacity">Branding</div>
                        </div>
                        <div class="flex flex-col border-t border-white/10 pt-4 group-hover:border-primary transition-colors">
                            <h3 class="text-white text-xl font-bold uppercase tracking-wide group-hover:text-primary transition-colors">Aura Skincare</h3>
                            <p class="text-gray-400 text-sm mt-1">Packaging &amp; Strategy</p>
                        </div>
                    </a>
                    <a class="group flex flex-col gap-4" href="#">
                        <div class="w-full aspect-[3/4] overflow-hidden bg-black/60 relative rounded-2xl">
                            <div
                                class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0"
                                data-alt="Dark moody interior design photography for an architecture firm portfolio"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCmaqHuTHkvhjR-qfVTyRkhCWFLaWVOqpDnFFqT_uHvriJN1UlUn2zeZ7qd7GqqXZx4oF_2hLrVeytMbl6XwPGutuVDcLfbn0H-8yR-niVgecXi292spUiLsr7gLKYPVeiLh0E-aVpv8Ka5Dt_KsqghoX0p_vlNUi3YPWDtZ4druW_sD9JFeUGs4V65E0IZ3D3lsPndKtyq20v0EDZst-iKj1RnogvAiGPByss4Nfh-pwAEm5KTNHwfLNodYtGve4TNW_eGmhO_-EM");'>
                            </div>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                            <div class="absolute top-4 right-4 bg-primary text-black text-[10px] font-bold px-2 py-1 uppercase opacity-0 group-hover:opacity-100 transition-opacity">Web</div>
                        </div>
                        <div class="flex flex-col border-t border-white/10 pt-4 group-hover:border-primary transition-colors">
                            <h3 class="text-white text-xl font-bold uppercase tracking-wide group-hover:text-primary transition-colors">Mono Architects</h3>
                            <p class="text-gray-400 text-sm mt-1">Web Design</p>
                        </div>
                    </a>
                    <a class="group flex flex-col gap-4" href="#">
                        <div class="w-full aspect-[3/4] overflow-hidden bg-black/60 relative rounded-2xl">
                            <div
                                class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0"
                                data-alt="Neon sign in a restaurant window at night reflecting in wet pavement"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdqp_qBUfct-F7qlF9kjvfn7tuEuHMdgLzlPY4b1LmriOWF_2QBI86e5mYwYyDnoH9U_k5Iy5YyN24nG_binSpSbyXuSYxcsexy_HsQu8Kb70VK_AYKdCmfq8qRVSb387KrE6cAhoF-I-gKvsK9sE398jfNuJwQ9jAKlpKiG15xyk0jCVvuri8kgbdyP4Pdyl_--JBxQvM3PDt4reRvrotmXPNcR2TkEOw8bdzJkNenu4D03BEHZv-gJ00UNS-ezWXT9j1BSgwJls");'>
                            </div>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                            <div class="absolute top-4 right-4 bg-primary text-black text-[10px] font-bold px-2 py-1 uppercase opacity-0 group-hover:opacity-100 transition-opacity">Event</div>
                        </div>
                        <div class="flex flex-col border-t border-white/10 pt-4 group-hover:border-primary transition-colors">
                            <h3 class="text-white text-xl font-bold uppercase tracking-wide group-hover:text-primary transition-colors">Neon Nights</h3>
                            <p class="text-gray-400 text-sm mt-1">Event Branding</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.base>
