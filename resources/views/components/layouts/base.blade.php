<!DOCTYPE html>

<html class="light" lang="en">

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
    class="bg-background-light dark:bg-background-dark text-[#1c1c0d] dark:text-[#fcfcf8] font-display overflow-x-hidden selection:bg-primary selection:text-black">
    <!-- Top Navigation -->
    <header
        class="fixed top-0 z-50 w-full px-4 sm:px-10 py-4 bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-sm border-b border-[#e9e8ce] dark:border-[#3a392a]">
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
                <a class="text-sm font-medium hover:text-primary transition-colors duration-200" href="#">Work</a>
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
    <!-- Footer CTA Section -->
    <section
        class="py-32 px-4 sm:px-10 bg-background-light dark:bg-background-dark border-t border-[#e9e8ce] dark:border-[#3a392a]">
        <div class="max-w-4xl mx-auto text-center flex flex-col items-center gap-10">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tighter leading-tight">
                READY TO <span class="bg-primary px-2 text-black italic">SCALE?</span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-2xl">
                Let's build something extraordinary together. Start your project with XOCOL today.
            </p>
            <button
                class="group relative inline-flex items-center justify-center px-12 py-6 text-xl font-bold text-black transition-all duration-200 bg-primary rounded-full hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    Start a Project
                    <span
                        class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </span>
                <div
                    class="absolute inset-0 h-full w-full scale-0 rounded-full transition-all duration-300 group-hover:scale-100 group-hover:bg-white/20">
                </div>
            </button>
        </div>
        <div
            class="max-w-7xl mx-auto mt-32 border-t border-gray-200 dark:border-gray-800 pt-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2 font-bold text-xl">
                <div class="size-6 bg-black dark:bg-white rounded-full"></div>
                XOCOL
            </div>
            <div class="flex gap-8 text-sm font-medium text-gray-500">
                <a class="hover:text-black dark:hover:text-white transition-colors" href="#">Instagram</a>
                <a class="hover:text-black dark:hover:text-white transition-colors" href="#">LinkedIn</a>
                <a class="hover:text-black dark:hover:text-white transition-colors" href="#">Twitter</a>
            </div>
            <p class="text-sm text-gray-400">© 2024 XOCOL Agency. All rights reserved.</p>
        </div>
    </section>
</body>

</html>
