document.addEventListener("DOMContentLoaded", () => {
    const counters = Array.from(document.querySelectorAll("[data-counter]"));
    if (counters.length === 0) return;

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;

    const setFinalValue = (el) => {
        const target = Number(el.dataset.target) || 0;
        const suffix = el.dataset.suffix || "";
        el.textContent = `${target}${suffix}`;
    };

    const animateCounter = (el) => {
        if (el.dataset.animated === "true") return;
        el.dataset.animated = "true";

        const target = Number(el.dataset.target) || 0;
        const suffix = el.dataset.suffix || "";
        const duration = Number(el.dataset.duration) || 1200;
        const startTime = performance.now();

        const tick = (now) => {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const value = Math.round(eased * target);
            el.textContent = `${value}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    };

    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
        counters.forEach(setFinalValue);
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.4 }
    );

    counters.forEach((counter) => observer.observe(counter));
});
