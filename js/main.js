
// Check for saved user preference, if any, on load of the website
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Logic
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }

    // Dark Mode Toggle Logic
    const themeToggleBtns = document.querySelectorAll('.theme-toggle');
    
    themeToggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        });
    });

    // ---------------------------------------------------------
    // Lightbox & Zoom Logic
    // ---------------------------------------------------------
    
    // 1. Create and inject Lightbox DOM (Hidden by default)
    const lightbox = document.createElement('div');
    lightbox.id = 'lightbox';
    // Tailwind classes: fixed, cover screen, z-index high, dark background, hidden state
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

    // 2. Open Lightbox Function
    function openLightbox(src) {
        lightboxImg.src = src;
        resetZoom();
        
        // Show lightbox
        lightbox.classList.remove('opacity-0', 'pointer-events-none');
        document.body.classList.add('overflow-hidden'); // Disable background scroll
    }

    // 3. Close Lightbox Function
    function closeLightbox() {
        lightbox.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden'); // Re-enable scroll
        setTimeout(() => {
            lightboxImg.src = ''; // Clear src after transition
            resetZoom();
        }, 300);
    }

    function resetZoom() {
        isZoomed = false;
        lightboxImg.style.transform = 'scale(1)';
        lightboxImg.classList.remove('cursor-zoom-out');
        lightboxImg.classList.add('cursor-zoom-in');
    }

    // 4. Attach Click Listeners to Project Images
    // Target only images inside containers with 'cursor-pointer' (Project pages main images)
    const candidateImages = document.querySelectorAll('.cursor-pointer img');
    candidateImages.forEach(img => {
        // Ensure we are not targeting small icons or other UI elements, primarily large project previews
        // The project wrapper usually has 'group' and 'cursor-pointer'
        if (img.closest('.group.cursor-pointer')) {
            img.closest('.group.cursor-pointer').addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                openLightbox(img.src);
            });
        }
    });

    // 5. Lightbox Interactions
    closeBtn.addEventListener('click', closeLightbox);
    
    // Close on background click
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !lightbox.classList.contains('pointer-events-none')) {
            closeLightbox();
        }
    });

    // 6. Zoom to Click Logic
    lightboxImg.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent closing
        
        if (!isZoomed) {
            // Zoom In
            const rect = lightboxImg.getBoundingClientRect();
            // Calculate click position as percentage of image dimensions
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            
            lightboxImg.style.transformOrigin = `${x}% ${y}%`;
            lightboxImg.style.transform = 'scale(2.5)';
            
            lightboxImg.classList.remove('cursor-zoom-in');
            lightboxImg.classList.add('cursor-zoom-out');
            isZoomed = true;
        } else {
            // Zoom Out
            resetZoom();
        }
    });
});
