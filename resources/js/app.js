import '@fortawesome/fontawesome-free/css/all.min.css';
import 'animate.css';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Alpine from 'alpinejs';
import "flatpickr/dist/flatpickr.min.css";
import CalHeatmap from 'cal-heatmap';

import CalHeatmap from 'cal-heatmap';
import 'cal-heatmap/cal-heatmap.css';
window.CalHeatmap = CalHeatmap;


fetch('/dashboard/asistencias-por-dia')
  .then(res => res.json())
  .then(data => {
    if (!data.length) {
      // No hay datos, crear datos fake para mostrar heatmap
      const fakeData = {};
      const today = new Date();
      for(let i = 0; i < 90; i++) {
        const date = new Date(today);
        date.setDate(today.getDate() - i);
        const timestamp = Math.floor(date.getTime() / 1000);
        fakeData[timestamp] = Math.floor(Math.random() * 10);  // random 0-9 asistencias
      }
      return fakeData;
    }

    const parsed = {};
    data.forEach(entry => {
      const timestamp = Math.floor(new Date(entry.fecha).getTime() / 1000);
      parsed[timestamp] = entry.asistencias;
    });
    return parsed;
  })
  .then(dataset => {
    cal.paint({
      itemSelector: '#asistencia-heatmap',
      domain: 'month',
      subDomain: 'day',
      range: 3,
      cellSize: 20,
      domainGutter: 10,
      data: {
        source: dataset,
        type: 'json'
      },
      legend: [1, 3, 5, 10],
      legendColors: {
        min: '#2a2a2a',
        max: '#34D399',
        empty: '#1f1f1f'
      },
      tooltip: true,
      itemName: ['asistencia', 'asistencias'],
      start: new Date()
    });
  })
  .catch(err => console.error('Error cargando heatmap:', err));



window.Alpine = Alpine;
Alpine.start();



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

// gallery lightbox
document.addEventListener('DOMContentLoaded', function() {
    const galleryLinks = document.querySelectorAll('a[href^="img/gallery/"]');

    galleryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const imgSrc = this.getAttribute('href');
            const lightbox = document.createElement('div');
            lightbox.className =
                'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
            lightbox.innerHTML = `
            <div class="relative max-w-4xl w-full">
                <img src="${imgSrc}" class="max-h-screen w-full object-contain" alt="Gallery Image">
                <button class="absolute top-4 right-4 text-white text-3xl">&times;</button>
            </div>
        `;

            document.body.appendChild(lightbox);

            lightbox.querySelector('button').addEventListener('click', function() {
                document.body.removeChild(lightbox);
            });
        });
    });
});

