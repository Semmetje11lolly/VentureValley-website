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
}

function hideMegaMenu() {
    hideTimeout = setTimeout(() => {
        megaMenu.classList.remove('fade-in');
        megaMenu.classList.remove('active');
        megaItems.forEach(item => item.classList.remove('active'));
    }, 100);
}

