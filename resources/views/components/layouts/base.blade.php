@props([
    'theme' => 'light',
    'bodyClass' => '',
])

<!DOCTYPE html>

<html class="{{ $theme }}" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>XOCOL - Creative Agency</title>
    <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f9f506",
                        "background-light": "#f8f8f5",
                        "background-dark": "#23220f",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "2rem",
                        "xl": "3rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-[#1c1c0d] dark:text-[#fcfcf8] font-display overflow-x-hidden selection:bg-primary selection:text-black {{ $bodyClass }}">
    <!-- Top Navigation -->
    <header
        class="fixed top-0 z-50 w-full px-4 sm:px-10 py-4 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-sm border-b border-[#e9e8ce] dark:border-[#3a392a]">
        @php
            $projectsHref = \Illuminate\Support\Facades\Route::has('projects') ? route('projects') : '#';
        @endphp
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div
                    class="size-8 bg-black dark:bg-white text-white dark:text-black flex items-center justify-center rounded-full">
                    <span class="material-symbols-outlined text-[20px]">gesture</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight">XOCOL</h2>
            </div>
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-medium hover:text-primary transition-colors duration-200"
                    href="#">Services</a>
                <a class="text-sm font-medium hover:text-primary transition-colors duration-200" href="{{ $projectsHref }}">Work</a>
                <a class="text-sm font-medium hover:text-primary transition-colors duration-200"
                    href="#">About</a>
            </nav>
            <button
                class="bg-primary hover:bg-primary/80 text-black text-sm font-bold px-6 py-2.5 rounded-full transition-all duration-300 transform hover:scale-105">
                Let's Talk
            </button>
        </div>
    </header>

    {{ $slot }}
    <x-footer-cta-form />
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof Glide === "undefined") return;

            const carousel = document.querySelector("[data-hero-carousel]");
            if (carousel) {
                new Glide(carousel, {
                    type: "carousel",
                    autoplay: 5000,
                    animationDuration: 700,
                    hoverpause: true,
                }).mount();
            }

            const servicesCarousel = document.querySelector("[data-services-carousel]");
            if (servicesCarousel) {
                new Glide(servicesCarousel, {
                    type: "carousel",
                    perView: 4,
                    gap: 16,
                    animationDuration: 600,
                    hoverpause: true,
                    breakpoints: {
                        1280: { perView: 3 },
                        1024: { perView: 2 },
                        640: { perView: 1 },
                    },
                }).mount();
            }

            const workCarousel = document.querySelector("[data-work-carousel]");
            if (workCarousel) {
                new Glide(workCarousel, {
                    type: "carousel",
                    perView: 3,
                    gap: 24,
                    animationDuration: 600,
                    hoverpause: true,
                    breakpoints: {
                        1280: { perView: 2 },
                        768: { perView: 1 },
                    },
                }).mount();
            }
        });
    </script>
</body>

</html>
