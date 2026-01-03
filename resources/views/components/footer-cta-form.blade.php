@props([
    'headline' => 'READY TO SCALE?',
    'subheadline' => "Let's build something extraordinary together. Start your project with XOCOL today.",
    'action' => null,
    'services' => [
        'Identidad & Branding',
        'Estrategia Digital',
        'Marketing Digital',
        'Desarrollo Web',
    ],
    'submitText' => 'Start a Project',
])

@php
    $resolvedAction = $action;

    if (! $resolvedAction) {
        if (\Illuminate\Support\Facades\Route::has('inquiries.store')) {
            $resolvedAction = route('inquiries.store');
        } elseif (\Illuminate\Support\Facades\Route::has('contact.store')) {
            $resolvedAction = route('contact.store');
        } else {
            $resolvedAction = '#';
        }
    }

    $headlineText = trim($headline);
    $headlineWords = preg_split('/\s+/', $headlineText);
    $headlineAccent = array_pop($headlineWords);
    $headlineLead = trim(implode(' ', $headlineWords));
@endphp

<!-- Footer CTA Section -->
<section
    class="py-32 px-4 sm:px-10 bg-background-light dark:bg-background-dark border-t border-[#e9e8ce] dark:border-[#3a392a]">
    <div class="max-w-4xl mx-auto text-center flex flex-col items-center gap-10">
        <h2 class="text-5xl md:text-7xl font-bold tracking-tighter leading-tight">
            @if ($headlineLead !== '')
                {{ $headlineLead }}
            @endif
            <span class="bg-primary px-2 text-black italic">{{ $headlineAccent }}</span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-2xl">
            {{ $subheadline }}
        </p>

        <div class="w-full max-w-3xl text-left">
            @if (session('success'))
                <div
                    class="mb-6 rounded-2xl border border-primary/40 bg-primary/10 px-6 py-4 text-sm font-medium text-black">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="mb-6 rounded-2xl border border-red-400/60 bg-red-500/10 px-6 py-4 text-sm text-red-600 dark:text-red-400">
                    <p class="font-semibold mb-2">Please fix the following:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $resolvedAction }}
            <form class="w-full" action="{{ $resolvedAction }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="cta-name">Name</label>
                        <input
                            class="w-full rounded-full border border-[#e9e8ce] dark:border-[#3a392a] bg-white/70 dark:bg-black/20 text-base text-black dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 px-5 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                            id="cta-name"
                            name="name"
                            type="text"
                            required
                            autocomplete="name"
                            value="{{ old('name') }}"
                            placeholder="Your name" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="cta-phone">Phone / WhatsApp</label>
                        <input
                            class="w-full rounded-full border border-[#e9e8ce] dark:border-[#3a392a] bg-white/70 dark:bg-black/20 text-base text-black dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 px-5 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                            id="cta-phone"
                            name="phone_whatsapp"
                            type="text"
                            required
                            autocomplete="tel"
                            value="{{ old('phone_whatsapp') }}"
                            placeholder="+52 55 0000 0000" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2" for="cta-company">Company</label>
                        <input
                            class="w-full rounded-full border border-[#e9e8ce] dark:border-[#3a392a] bg-white/70 dark:bg-black/20 text-base text-black dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 px-5 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                            id="cta-company"
                            name="company"
                            type="text"
                            autocomplete="organization"
                            value="{{ old('company') }}"
                            placeholder="Company name" />
                    </div>
                    <div>
                        <span class="block text-sm font-semibold mb-2">Services</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($services as $service)
                                <label
                                    class="flex items-center gap-3 rounded-full border border-[#e9e8ce] dark:border-[#3a392a] bg-white/40 dark:bg-black/10 px-4 py-2 text-sm font-medium text-black dark:text-white">
                                    <input
                                        class="size-4 rounded border-[#e9e8ce] dark:border-[#3a392a] text-black focus:ring-primary"
                                        type="checkbox"
                                        name="services[]"
                                        value="{{ $service }}"
                                        @checked(in_array($service, old('services', []), true)) />
                                    {{ $service }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold mb-2" for="cta-message">Message</label>
                        <textarea
                            class="w-full rounded-2xl border border-[#e9e8ce] dark:border-[#3a392a] bg-white/70 dark:bg-black/20 text-base text-black dark:text-white placeholder:text-gray-400 dark:placeholder:text-gray-500 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition"
                            id="cta-message"
                            name="message"
                            rows="4"
                            placeholder="Tell us about your project">{{ old('message') }}</textarea>
                    </div>
                    <div class="md:col-span-2 flex justify-center pt-2">
                        <button
                            class="group relative inline-flex items-center justify-center px-12 py-6 text-xl font-bold text-black transition-all duration-200 bg-primary rounded-full hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary overflow-hidden"
                            type="submit">
                            <span class="relative z-10 flex items-center gap-2">
                                {{ $submitText }}
                                <span
                                    class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </span>
                            <div
                                class="absolute inset-0 h-full w-full scale-0 rounded-full transition-all duration-300 group-hover:scale-100 group-hover:bg-white/20">
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
        <p class="text-sm text-gray-400">ЖИ 2024 XOCOL Agency. All rights reserved.</p>
    </div>
</section>
