import '@fortawesome/fontawesome-free/css/all.min.css';

const mobileMenuButton = document.getElementById("mobile-menu-button");
const closeMobileMenu = document.getElementById("close-mobile-menu");
const mobileSidebar = document.getElementById("mobile-sidebar");
const mobileOverlay = document.getElementById("mobile-overlay");

function openMenu() {
    mobileSidebar.classList.add("open");
    mobileSidebar.classList.remove("closed");

    mobileOverlay.classList.remove("invisible");
    mobileOverlay.style.opacity = "1";
    mobileOverlay.style.pointerEvents = "auto";

    mobileMenuButton.classList.add("hamburger-open");
}

function closeMenu() {
    mobileSidebar.classList.remove("open");
    mobileSidebar.classList.add("closed");

    mobileOverlay.style.opacity = "0";
    mobileOverlay.style.pointerEvents = "none";
    setTimeout(() => {
        mobileOverlay.classList.add("invisible");
    }, 300); // Tiempo igual a la duración del fade (300ms)

    mobileMenuButton.classList.remove("hamburger-open");
}

function toggleMenu() {
    if (mobileSidebar.classList.contains("open")) {
        closeMenu();
    } else {
        openMenu();
    }
}

mobileMenuButton.addEventListener("click", toggleMenu);
closeMobileMenu.addEventListener("click", toggleMenu);
mobileOverlay.addEventListener("click", toggleMenu);

// Cerrar menú cuando hacen click en un enlace del sidebar
document.querySelectorAll("#mobile-sidebar nav a").forEach((link) => {
    link.addEventListener("click", toggleMenu);
});