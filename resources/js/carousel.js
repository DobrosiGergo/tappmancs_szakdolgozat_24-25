function initCarousel(root) {
    const track = root.querySelector('[data-track]');
    const slides = Array.from(track?.children || []);
    if (!track || slides.length === 0) return;

    const prevBtn = root.querySelector('[data-prev]');
    const nextBtn = root.querySelector('[data-next]');
    const dots = Array.from(root.querySelectorAll('[data-dot]'));
    const autoplay = root.dataset.autoplay === '1';
    const interval = parseInt(root.dataset.interval || '5000', 10);

    let i = 0, lock = false, timer = null, touchX = 0;
    const DUR = 500;

    const set = (idx, animate = true) => {
        i = (idx + slides.length) % slides.length;
        track.style.transitionDuration = animate ? `${DUR}ms` : '0ms';
        track.style.transform = `translate3d(-${i * 100}%,0,0)`;
        dots.forEach((d, k) => {
            const active = k === i;
            d.classList.toggle('bg-neutral-900', active);
            d.classList.toggle('ring-2', active);
            d.classList.toggle('ring-white', active);
            d.classList.toggle('shadow-[0_0_0_4px_rgba(0,0,0,0.15)]', active);
        });
    };

    const next = () => { if (lock) return; lock = true; set(i + 1); setTimeout(() => lock = false, DUR + 20); };
    const prev = () => { if (lock) return; lock = true; set(i - 1); setTimeout(() => lock = false, DUR + 20); };

    nextBtn && nextBtn.addEventListener('click', next);
    prevBtn && prevBtn.addEventListener('click', prev);
    dots.forEach((d, k) => d.addEventListener('click', () => set(k)));

    const start = () => { if (!autoplay || slides.length < 2) return; stop(); timer = setInterval(next, interval); };
    const stop = () => { if (timer) { clearInterval(timer); timer = null; } };

    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);

    root.addEventListener('touchstart', (e) => { touchX = e.touches[0].clientX; }, { passive: true });
    root.addEventListener('touchend', (e) => {
        const dx = e.changedTouches[0].clientX - touchX;
        if (Math.abs(dx) > 50) dx < 0 ? next() : prev();
    }, { passive: true });

    root.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') next();
        if (e.key === 'ArrowLeft') prev();
    });
    root.tabIndex = 0;

    set(0, false);
    start();
}

export function initAllCarousels() {
    document.querySelectorAll('[data-carousel]').forEach(initCarousel);
}

// auto-init, ha a fájlt betöltöd
document.addEventListener('DOMContentLoaded', initAllCarousels);
