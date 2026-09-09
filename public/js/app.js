/**
 * Website Profil Padukuhan Candi Wetan
 * Custom JavaScript
 */
document.addEventListener('DOMContentLoaded', function () {

    // ===== 1. Scroll Reveal Animation =====
    const animateElements = document.querySelectorAll('.cw-animate');
    if (animateElements.length > 0) {
        const revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

        animateElements.forEach(function (el) {
            revealObserver.observe(el);
        });
    }

    // ===== 2. Counter Animation =====
    var counters = document.querySelectorAll('[data-count]');
    if (counters.length > 0) {
        var counterObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var target = parseInt(entry.target.getAttribute('data-count'), 10);
                    if (target > 0) {
                        animateCounter(entry.target, target);
                    }
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(function (el) {
            counterObserver.observe(el);
        });
    }

    function animateCounter(element, target) {
        var duration = 1800;
        var startTime = null;

        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            // Ease out cubic
            var easedProgress = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(easedProgress * target);
            element.textContent = current.toLocaleString('id-ID');
            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                element.textContent = target.toLocaleString('id-ID');
            }
        }

        requestAnimationFrame(step);
    }

    // ===== 3. Navbar Scroll Effect =====
    var navbar = document.querySelector('.cw-navbar');
    if (navbar) {
        function updateNavbar() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar();
    }

    // ===== 4. Lightbox =====
    var lightbox = document.getElementById('cwLightbox');
    var lightboxImg = document.getElementById('cwLightboxImg');
    var galleryItems = document.querySelectorAll('[data-lightbox]');

    galleryItems.forEach(function (item) {
        item.addEventListener('click', function () {
            var src = this.getAttribute('data-lightbox');
            if (lightbox && lightboxImg && src) {
                lightboxImg.src = src;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        });
    });

    if (lightbox) {
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox || e.target.classList.contains('cw-lightbox-close')) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                closeLightbox();
            }
        });
    }

    function closeLightbox() {
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // ===== 5. Active Nav Link =====
    var currentPath = window.location.pathname;
    var navLinks = document.querySelectorAll('.cw-navbar .nav-link');
    navLinks.forEach(function (link) {
        var href = link.getAttribute('href');
        // Remove trailing slash for comparison
        var cleanHref = href ? href.replace(/\/$/, '') : '';
        var cleanPath = currentPath.replace(/\/$/, '') || '/';

        link.classList.remove('active');

        if (cleanPath === cleanHref) {
            link.classList.add('active');
        } else if (cleanHref !== '' && cleanHref !== '/' && cleanPath.indexOf(cleanHref) === 0) {
            link.classList.add('active');
        }
    });

    // ===== 6. Smooth Scroll for Anchor Links =====
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                var targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    targetEl.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });

    // ===== 7. Close Mobile Navbar on Link Click =====
    var navbarCollapse = document.getElementById('navbarMain');
    if (navbarCollapse) {
        var navLinksInner = navbarCollapse.querySelectorAll('.nav-link');
        navLinksInner.forEach(function (link) {
            link.addEventListener('click', function () {
                var bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            });
        });
    }

});
