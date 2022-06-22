import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const langSelect = document.getElementById('lang');
const book_en = document.getElementById('book-en');
const book_ar = document.getElementById('book-ar');

langSelect.addEventListener('change', changeLang);

function changeLang() {
    switch (langSelect.value) {
    case 'en':
        book_ar.setAttribute('class', 'hidden');
        book_en.removeAttribute('class');
        break;
    case 'ar':
        book_en.setAttribute('class', 'hidden');
        book_ar.removeAttribute('class');
        break;
    }
}
