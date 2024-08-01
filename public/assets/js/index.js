// scripts.js

// Contoh fungsi untuk menampilkan/menghilangkan menu pada mobile view
document.addEventListener('DOMContentLoaded', (event) => {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navbarToggler.addEventListener('click', () => {
        navbarCollapse.classList.toggle('show');
    });
});
