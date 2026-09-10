const obs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('in');
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// ---------- Mobile menu toggle ----------
const menuBtn = document.querySelector('.menu-btn');
const siteHeader = document.querySelector('header');

if (menuBtn && siteHeader) {
  menuBtn.setAttribute('aria-expanded', 'false');
  menuBtn.setAttribute('aria-label', 'Open menu');

  menuBtn.addEventListener('click', () => {
    const isOpen = siteHeader.classList.toggle('menu-open');
    menuBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    menuBtn.setAttribute('aria-label', isOpen ? 'Close menu' : 'Open menu');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  // Close the menu when a nav link (or the CTA) is tapped
  siteHeader.querySelectorAll('.navlinks a, .nav-cta').forEach(link => {
    link.addEventListener('click', () => {
      siteHeader.classList.remove('menu-open');
      menuBtn.setAttribute('aria-expanded', 'false');
      menuBtn.setAttribute('aria-label', 'Open menu');
      document.body.style.overflow = '';
    });
  });

  // Close the menu if the viewport is resized back to desktop width
  window.addEventListener('resize', () => {
    if (window.innerWidth > 860 && siteHeader.classList.contains('menu-open')) {
      siteHeader.classList.remove('menu-open');
      menuBtn.setAttribute('aria-expanded', 'false');
      menuBtn.setAttribute('aria-label', 'Open menu');
      document.body.style.overflow = '';
    }
  });
}

// ---------- FAQ accordion ----------
document.querySelectorAll('.faq-item').forEach(item => {
  const btn = item.querySelector('.faq-q');
  if (!btn) return;
  btn.setAttribute('aria-expanded', 'false');
  btn.addEventListener('click', () => {
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item.open').forEach(openItem => {
      if (openItem !== item) {
        openItem.classList.remove('open');
        openItem.querySelector('.faq-q').setAttribute('aria-expanded', 'false');
      }
    });
    item.classList.toggle('open', !isOpen);
    btn.setAttribute('aria-expanded', (!isOpen).toString());
  });
});

