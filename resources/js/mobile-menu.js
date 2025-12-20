window.addEventListener('DOMContentLoaded', init);

let mobileToggle;
let mobileMenu;
let navContainer;

let focusableSummaries = [];
let focusableLinks = [];
let lastFocusSummary;
let lastFocusLink;

function init() {
    mobileToggle = document.querySelector('#mobile-menu-toggle');
    mobileMenu = document.querySelector('#mobile-menu');
    navContainer = mobileMenu.querySelector('.nav-container');

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

function setupFocusTrap() {
    focusableSummaries = mobileMenu.querySelectorAll('summary');
    focusableLinks = mobileMenu.querySelectorAll('a');

    lastFocusSummary = focusableSummaries[focusableSummaries.length - 1];
    lastFocusLink = focusableLinks[focusableLinks.length - 1];

    mobileMenu.addEventListener('keydown', handleFocusTrap);

    console.log(lastFocusSummary.parentNode.getAttribute('open'));
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
    navContainer.classList.add('active');
    document.body.classList.add('scroll-lock');

    mobileToggle.setAttribute('aria-expanded', 'true');
    mobileToggle.classList.remove('fa-bars');
    mobileToggle.classList.add('fa-xmark');

    setupFocusTrap();
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    navContainer.classList.remove('active');
    document.body.classList.remove('scroll-lock');

    mobileToggle.setAttribute('aria-expanded', 'false');
    mobileToggle.classList.remove('fa-xmark');
    mobileToggle.classList.add('fa-bars');

    mobileMenu.removeEventListener('keydown', handleFocusTrap);
}

function handleFocusTrap(e) {
    if (e.key !== 'Tab') return;

    if (lastFocusSummary.parentNode.getAttribute('open') !== null) {
        if (!e.shiftKey && document.activeElement === lastFocusLink) {
            e.preventDefault();

            mobileToggle.focus();
        }
    } else {
        if (!e.shiftKey && document.activeElement === lastFocusSummary) {
            e.preventDefault();

            mobileToggle.focus();
        }
    }
}
