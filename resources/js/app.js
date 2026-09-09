import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.site-nav');

    if (!navToggle || !navMenu) {
        return;
    }

    navToggle.addEventListener('click', function () {
        navMenu.classList.toggle('is-open');
        navToggle.setAttribute(
            'aria-expanded',
            navMenu.classList.contains('is-open') ? 'true' : 'false'
        );
    });

    navMenu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navMenu.classList.remove('is-open');
            navToggle.setAttribute('aria-expanded', 'false');
        });
    });
});
