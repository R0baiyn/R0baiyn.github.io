document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }

    const yearSpan = document.getElementById('current-year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    const lightbox = document.createElement('div');
    lightbox.id = 'lightbox';
    lightbox.className = 'fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300';
    lightbox.innerHTML = `
        <button id="lightbox-close" class="absolute top-6 right-6 text-white text-opacity-70 hover:text-opacity-100 focus:outline-none transition-all p-2 bg-black/50 rounded-full hover:bg-black/80">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <img id="lightbox-img" class="max-w-[95vw] max-h-[95vh] object-contain cursor-zoom-in transition-transform duration-300 origin-center" src="" alt="Full screen view">
    `;
    document.body.appendChild(lightbox);

    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.getElementById('lightbox-close');
    let isZoomed = false;

    function openLightbox(src) {
        lightboxImg.src = src;
        resetZoom();
        lightbox.classList.remove('opacity-0', 'pointer-events-none');
        document.body.classList.add('overflow-hidden');
    }

    function closeLightbox() {
        lightbox.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden');
        setTimeout(() => {
            lightboxImg.src = '';
            resetZoom();
        }, 300);
    }

    function resetZoom() {
        isZoomed = false;
        lightboxImg.style.transform = 'scale(1)';
        lightboxImg.classList.remove('cursor-zoom-out');
        lightboxImg.classList.add('cursor-zoom-in');
    }

    const candidateImages = document.querySelectorAll('.cursor-pointer img');
    candidateImages.forEach(img => {
        if (img.closest('.group.cursor-pointer')) {
            img.closest('.group.cursor-pointer').addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                openLightbox(img.src);
            });
        }
    });

    closeBtn.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !lightbox.classList.contains('pointer-events-none')) {
            closeLightbox();
        }
    });

    lightboxImg.addEventListener('click', (e) => {
        e.stopPropagation();

        if (!isZoomed) {
            const rect = lightboxImg.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;

            lightboxImg.style.transformOrigin = `${x}% ${y}%`;
            lightboxImg.style.transform = 'scale(2.5)';

            lightboxImg.classList.remove('cursor-zoom-in');
            lightboxImg.classList.add('cursor-zoom-out');
            isZoomed = true;
        } else {
            resetZoom();
        }
    });
});
