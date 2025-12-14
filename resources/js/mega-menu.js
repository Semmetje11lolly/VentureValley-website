window.addEventListener('DOMContentLoaded', init);

let headings;
let megaMenu;
let megaItems;

let hideTimeout;

function init() {
    headings = document.querySelectorAll('.nav-headings li');
    megaMenu = document.querySelector('#mega-menu');
    megaItems = megaMenu.querySelectorAll('.nav-container');

    headings.forEach(heading => {
        heading.addEventListener('mouseenter', () => {
            showMegaMenu(heading.dataset.mega);
        });

        heading.addEventListener('mouseleave', hideMegaMenu);
    });

    megaMenu.addEventListener('mouseenter', () => {
        clearTimeout(hideTimeout);
    });

    megaMenu.addEventListener('mouseleave', hideMegaMenu);

    setupKeyboard();
}

function setupKeyboard() {
    headings.forEach(heading => {
        heading.addEventListener('keydown', (e) => {
            const key = e.key;
            const megaKey = heading.dataset.mega;
            const isOpen = heading.getAttribute('aria-expanded') === 'true';

            if (key === 'Enter' || key === ' ') {
                toggleMegaMenu(e, isOpen, megaKey);
            }
        });
        heading.addEventListener('click', (e) => {
            const megaKey = heading.dataset.mega;
            const isOpen = heading.getAttribute('aria-expanded') === 'true';

            toggleMegaMenu(e, isOpen, megaKey);
        })
    });

    megaMenu.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openHeading = document.querySelector(
                '.nav-headings li[aria-expanded="true"]'
            );

            if (openHeading) {
                openHeading.focus();
            }

            hideMegaMenuImmediate();
        }
    });
}

function toggleMegaMenu(e, isOpen, megaKey) {
    e.preventDefault();

    if (isOpen) {
        hideMegaMenuImmediate();
    } else {
        showMegaMenu(megaKey);
        focusFirstMegaItem(megaKey);
    }
}

function showMegaMenu(key) {
    clearTimeout(hideTimeout);

    megaMenu.classList.add('fade-in');
    megaMenu.classList.add('active');

    megaItems.forEach(item => {
        item.classList.toggle(
            'active',
            item.dataset.mega === key
        );
    });

    headings.forEach(heading => {
        heading.ariaExpanded = heading.dataset.mega === key;
    })
}

function hideMegaMenu() {
    hideTimeout = setTimeout(() => {
        megaMenu.classList.remove('fade-in');
        megaMenu.classList.remove('active');
        megaItems.forEach(item => item.classList.remove('active'));
        headings.forEach(heading =>
            heading.setAttribute('aria-expanded', 'false')
        );
    }, 100);
}

function hideMegaMenuImmediate() {
    clearTimeout(hideTimeout);

    megaMenu.classList.remove('fade-in');
    megaMenu.classList.remove('active');
    megaItems.forEach(item => item.classList.remove('active'));
    headings.forEach(heading =>
        heading.setAttribute('aria-expanded', 'false')
    );
}

function focusFirstMegaItem(key) {
    const activeMenu = megaMenu.querySelector(`.nav-container[data-mega="${key}"]`);

    if (!activeMenu) return;

    const focusable = activeMenu.querySelector('a, button, [tabindex]:not([tabindex="-1"])');

    if (focusable) {
        focusable.focus();
    }
}

