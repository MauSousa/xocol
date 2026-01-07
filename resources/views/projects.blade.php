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
                <button
                    class="px-5 py-2.5 rounded-full bg-primary text-black text-sm font-bold transition-all shadow-[0_0_12px_rgba(249,245,6,0.3)]">
                    All
                </button>
                <button
                    class="px-5 py-2.5 rounded-full border border-[#3a392a] bg-black/20 text-gray-300 text-sm font-medium hover:text-primary hover:border-primary/50 transition-all">
                    Branding
                </button>
                <button
                    class="px-5 py-2.5 rounded-full border border-[#3a392a] bg-black/20 text-gray-300 text-sm font-medium hover:text-primary hover:border-primary/50 transition-all">
                    Web Development
                </button>
                <button
                    class="px-5 py-2.5 rounded-full border border-[#3a392a] bg-black/20 text-gray-300 text-sm font-medium hover:text-primary hover:border-primary/50 transition-all">
                    Marketing
                </button>
                <button
                    class="px-5 py-2.5 rounded-full border border-[#3a392a] bg-black/20 text-gray-300 text-sm font-medium hover:text-primary hover:border-primary/50 transition-all">
                    Strategy
                </button>
            </div>
        </div>
    </section>

    <section class="px-4 sm:px-10 pb-24 pt-10">
        <div class="max-w-7xl mx-auto">
            <div class="masonry-grid w-full">
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="Minimalist architectural branding concept with clean lines"
                        class="w-full h-auto object-cover aspect-[3/4] transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbTC4BVke6X3CuiBdKFcGnh8dABKX-xD4Ft2n_ruEDAcTrc5cRFaYgjEUZRl4juqIgHOQjSg9SDMWIA7yftvXrz9VVq0pA7HK8ShbOUB1PQIb0b76pVnan4tZ1V6190jV2Fv18JSKwAR8q8pouK4GYCbs_GRqSFfgD-H_l_jbqGzhhgUWjLl2xRQtwsI_g4eZlhIrl-ZhzBCX1XXltcwaeDVdlxDrDNnlgf9MmzcVZ3g71_DFMlYUHd6iKPyo1rEG8loLSFfDM4Ug" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Branding</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">Vertex Studio</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="Modern dark UI dashboard on a laptop screen"
                        class="w-full h-auto object-cover aspect-video transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAI4mwBVMjOJ06dCmRV9nruq7SBvgEs2xTuzgnvTeHFQefsKlOucOJwwtGl_0i4kTKFn_jWSZ-rTPJCSgM2YrUAdL2YIJ9omP7bpzzJUQRO7GQ73eLhXkLnvmdxHF6CTdG2NZOlDDagfdg0jtv-wn46J1S7qn1Fuw31m9xKhjS3IyIOpweRCT7Nf8mOqpX7Bw3gffJpqnVXWjtG4bytY5KNVoZP_fkMsMF-ooXmdTM1hAnBZgsdPjGPk_2Y5l8v0DlTxzqzCxBtm5g" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Web Development</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">Fintech Nexus</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="High fashion model with neon lighting photography"
                        class="w-full h-auto object-cover aspect-square transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoS7AhuHGw67FtKOOMdg0LyG85MTKZdQoM0qb0n9MdjaK_gZzel1xTBL_YpTTi3mEZdc8NxqLeAA3iq-yMdwHsdDL9f6FizKrIg_SvptlvV2avonVzNNytFjKFi55WT0jqhWqAkF3YiSe7os_lpDmqaDnMiLbqpj782vJqxGLc4zu0XXpgdp5B8ZWAXkleRays1C3W0CCAKl_LVbAoDihCNUbY0aE-ljITcsqny-eSu3Fd5jjl8pLQFVymiLppdWnGgCtzJvaGH9s" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Marketing</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">Neon Glow</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="Minimalist package design for coffee brand"
                        class="w-full h-auto object-cover aspect-[3/5] transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsLieRgo_6cDq2vnjNeiT0rlwZNHA7NnK7ywp-ssV18X54DFkdKTs7XOTE1z3UHhK4jwO-SNDRwpSg33zLa-X2IdZlxmOe500n4xcd_kX0jVKJWbt5X7jDhv4DRhI05PmUywtNSxb9mZMXZha4dmnmaNkp0mVMbYGzPsDbF9vHUzHiIPi-ReO9Fy1zX3q051OSGVVYbtV0XQYkHnwXjcFqhq-d0r4o5B7ovLkZwk2P5lvPtiGrkPzaWmC73LE3M5tRZYh1aEoYiL0" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Packaging</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">Cafe Origen</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="Business team discussing strategy over charts"
                        class="w-full h-auto object-cover aspect-square transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAku3vUOdDpocwW8TgilEse4K9Er6LyoqcjWC5ACgwwVWixJut-aNTw2bpe-3ETp7to-gyxVA337EGHntZqbf_pRN_sKK6DZd4Ji_kDqtcD2JzHnyMSbuhrnNqCnj5FdCWDdT44cN9KWteJ5apeCmol7eQLY9Lo7fsRpvY-MePEUa4-40HWaEKANKgvtoutT73sX0K8EFBj3ij_xB_p1KTfgnJtX_bG20-jj_IkZfRictSNFxb7j1g70K6Qn7AWzuqBTNo6McwVuuI" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Strategy</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">Growth Consulting</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
                <div class="masonry-item group relative rounded-xl overflow-hidden cursor-pointer">
                    <img
                        alt="Clean mobile app interface on a smartphone held by hand"
                        class="w-full h-auto object-cover aspect-video transition-transform duration-700 group-hover:scale-105"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzRQMgwc2y2iRFgaveUJlC3bUwC3d_jHSNQkcBE_LDCw5SuOAh3xZM3f9oKkWQGxB9GWTl5kl-9xAD-OFna-hmzXiSHdyT1uA7pS1KssuAB_u0Y1n5mzFs1Wdm8N7RFPIKiyUMHmGOtEZt98PhzMDTDEO2Tkq-1GzSz9st0xEkyjjnzG77fOvf_LjcktCkC8o4v4KFFHZ0qp8cZeHs9iYXCgrNbx2UzAoJa6gDnkJpU_vG84lK25gTtr0zIYomFV_Xytcg_S9nmxA" />
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                        <span class="text-primary text-xs font-bold uppercase tracking-widest mb-3">Product Design</span>
                        <h3 class="text-white text-3xl font-bold leading-tight mb-4">E-Learning Platform</h3>
                        <div class="flex items-center gap-2 text-white/90 text-sm font-bold">
                            <span class="border-b border-primary/0 group-hover:border-primary transition-all">View case study</span>
                            <span class="material-symbols-outlined text-base group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-12">
                <button
                    class="flex items-center gap-3 text-gray-400 font-semibold hover:text-primary transition-colors group">
                    <span class="material-symbols-outlined text-2xl group-hover:animate-bounce">expand_more</span>
                    Load more projects
                </button>
            </div>
        </div>
    </section>
</x-layouts.base>
