// Mobile menu toggle
const mobileMenuButton = document.getElementById("mobile-menu-button");
const closeMobileMenu = document.getElementById("close-mobile-menu");
const mobileSidebar = document.getElementById("mobile-sidebar");
const mobileOverlay = document.getElementById("mobile-overlay");

function toggleMenu() {
    const isOpen = mobileSidebar.classList.toggle("open");
    mobileSidebar.classList.toggle("closed");

    // Animación del overlay
    mobileOverlay.style.opacity = isOpen ? "1" : "0";
    mobileOverlay.style.pointerEvents = isOpen ? "auto" : "none";

    // Animación del botón hamburguesa
    mobileMenuButton.classList.toggle("hamburger-open");
}

mobileMenuButton.addEventListener("click", toggleMenu);
closeMobileMenu.addEventListener("click", toggleMenu);

// Cerrar menú al hacer clic en el overlay
mobileOverlay.addEventListener("click", toggleMenu);

// Cerrar menú al hacer clic en un enlace (opcional)
document.querySelectorAll("#mobile-sidebar nav a").forEach((link) => {
    link.addEventListener("click", toggleMenu);
});
