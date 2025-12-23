import "./bootstrap";

const initHeroCarousel = () => {
    const carousel = document.querySelector("[data-hero-carousel]");
    if (!carousel) return;

    const slides = Array.from(
        carousel.querySelectorAll("[data-hero-slide]")
    );
    if (slides.length <= 1) return;

    const nextButton = carousel.querySelector("[data-hero-next]");
    const prevButton = carousel.querySelector("[data-hero-prev]");
    let currentIndex = slides.findIndex((slide) =>
        slide.classList.contains("opacity-100")
    );
    if (currentIndex < 0) currentIndex = 0;

    const setSlide = (index) => {
        slides.forEach((slide, slideIndex) => {
            const isActive = slideIndex === index;
            slide.classList.toggle("opacity-100", isActive);
            slide.classList.toggle("opacity-0", !isActive);
            slide.classList.toggle("pointer-events-none", !isActive);
            slide.classList.toggle("z-20", isActive);
            slide.classList.toggle("z-0", !isActive);
        });
        currentIndex = index;
    };

    const goToNext = () => {
        const nextIndex = (currentIndex + 1) % slides.length;
        setSlide(nextIndex);
    };

    const goToPrev = () => {
        const prevIndex =
            (currentIndex - 1 + slides.length) % slides.length;
        setSlide(prevIndex);
    };

    let autoTimer = null;
    const startAuto = () => {
        autoTimer = setInterval(goToNext, 5000);
    };

    const resetAuto = () => {
        if (autoTimer) {
            clearInterval(autoTimer);
        }
        startAuto();
    };

    nextButton?.addEventListener("click", () => {
        goToNext();
        resetAuto();
    });

    prevButton?.addEventListener("click", () => {
        goToPrev();
        resetAuto();
    });

    startAuto();
};

document.addEventListener("DOMContentLoaded", initHeroCarousel);
