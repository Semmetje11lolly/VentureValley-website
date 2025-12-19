window.addEventListener('DOMContentLoaded', init);

let mobileToggle;
let mobileMenu;

function init() {
    mobileToggle = document.querySelector('#mobile-menu-toggle');
    mobileMenu = document.querySelector('#mobile-menu');

    mobileToggle.addEventListener('click', toggleMobileMenu);

    setupKeyboard();
}

function setupKeyboard() {
    mobileToggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            toggleMobileMenu();
        }
    })

    mobileMenu.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMobileMenu();
            mobileToggle.focus();
        }
    });
}

function toggleMobileMenu() {
    const isOpen = mobileToggle.getAttribute('aria-expanded') === 'true';

    if (isOpen) {
        closeMobileMenu();
    } else {
        openMobileMenu();
    }
}

function openMobileMenu() {
    mobileMenu.classList.add('active');
    document.body.classList.add('scroll-lock');

    mobileToggle.setAttribute('aria-expanded', 'true');
    mobileToggle.classList.remove('fa-bars');
    mobileToggle.classList.add('fa-xmark');
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    document.body.classList.remove('scroll-lock');

    mobileToggle.setAttribute('aria-expanded', 'false');
    mobileToggle.classList.remove('fa-xmark');
    mobileToggle.classList.add('fa-bars');
}
