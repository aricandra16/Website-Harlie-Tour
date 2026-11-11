/* ========== DOM Elements ========== */
const navbar = document.getElementById('navbar');
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');
const aboutDropdown = document.getElementById('aboutDropdown');
const aboutMenuToggle = document.getElementById('aboutMenuToggle');

/* ========== Navbar scroll effect ========== */
window.addEventListener('scroll', () => {
  if (window.scrollY > 20) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

/* ========== Mobile menu ========== */
if (hamburger && navLinks) {
  hamburger.addEventListener('click', () => {
    const isOpen = navLinks.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', String(isOpen));
    hamburger.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
  });
}

if (aboutDropdown && aboutMenuToggle) {
  aboutMenuToggle.addEventListener('click', () => {
    const isOpen = aboutDropdown.classList.toggle('open');
    aboutMenuToggle.setAttribute('aria-expanded', String(isOpen));
  });
}

navLinks?.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    navLinks.classList.remove('open');
    hamburger?.setAttribute('aria-expanded', 'false');
    hamburger?.setAttribute('aria-label', 'Buka menu');
    aboutDropdown?.classList.remove('open');
    aboutMenuToggle?.setAttribute('aria-expanded', 'false');
  });
});

/* ========== Active nav link on scroll ========== */
const sections = document.querySelectorAll('section[id]');
const navItems = document.querySelectorAll('.nav-link');

window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(section => {
    const top = section.offsetTop - 120;
    if (window.scrollY >= top) {
      current = section.getAttribute('id');
    }
  });
  navItems.forEach(item => {
    item.classList.remove('active');
    if (item.getAttribute('href') === '#' + current) {
      item.classList.add('active');
    }
  });
});

/* ========== Smooth scroll ========== */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const href = this.getAttribute('href');
    // The booking script replaces # on the WhatsApp link after a booking succeeds.
    // Only handle actual in-page anchors here; ignore that dynamic external URL.
    if (!href || href === '#' || !href.startsWith('#')) return;
    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      const offset = window.innerWidth >= 1080 ? 122 : 84;
      const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
});

/* ========== Documentation category filters ========== */
const documentationFilters = document.querySelectorAll('.documentation-filter');
const documentationCards = document.querySelectorAll('.documentation-card');

documentationFilters.forEach(button => {
  button.addEventListener('click', () => {
    const category = button.dataset.filter;
    documentationFilters.forEach(filter => {
      const isActive = filter === button;
      filter.classList.toggle('active', isActive);
      filter.setAttribute('aria-pressed', String(isActive));
    });
    documentationCards.forEach(card => {
      const categories = (card.dataset.categories || '').split(/\s+/);
      const shouldHide = category !== 'all' && !categories.includes(category);
      card.hidden = shouldHide;
      card.classList.remove('filter-in');
      if (!shouldHide) {
        void card.offsetWidth;
        card.classList.add('filter-in');
      }
    });
  });
});

/* ========== Scroll entrance animation ========== */
const revealItems = document.querySelectorAll(
  '.section-header, .tour-package-group, .booking-section, .documentation-card, .journey-info-card, .customer-review-card, .fleet-rental-card'
);

if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -24px 0px' });

  revealItems.forEach((item, index) => {
    item.classList.add('scroll-reveal');
    if (item.matches('.documentation-card, .journey-info-card, .customer-review-card, .fleet-rental-card')) {
      item.style.transitionDelay = `${(index % 4) * 70}ms`;
    }
    revealObserver.observe(item);
  });
}
