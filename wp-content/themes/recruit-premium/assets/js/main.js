/**
 * Recruit Premium — main.js
 * Scroll header / Mobile nav / Reveal / FAQ accordion / Job filter / Smooth scroll / Count-up
 */

/* -----------------------------------------------------------------------
   Header scroll detection
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const header = document.getElementById('site-header');
  if (!header) return;

  let lastY = 0;
  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    if (y > 60) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
    lastY = y;
  }, { passive: true });
})();

/* -----------------------------------------------------------------------
   Hamburger / Mobile nav
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const btn     = document.getElementById('hamburger-btn');
  const nav     = document.getElementById('mobile-nav');
  const links   = nav ? nav.querySelectorAll('.mobile-nav__link') : [];
  if (!btn || !nav) return;

  function openMenu() {
    btn.classList.add('is-active');
    nav.classList.add('is-open');
    btn.setAttribute('aria-expanded', 'true');
    nav.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    btn.classList.remove('is-active');
    nav.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
    nav.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  btn.addEventListener('click', () => {
    btn.classList.contains('is-active') ? closeMenu() : openMenu();
  });

  links.forEach(link => link.addEventListener('click', closeMenu));

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeMenu();
  });
})();

/* -----------------------------------------------------------------------
   Scroll reveal (IntersectionObserver)
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  els.forEach(el => observer.observe(el));
})();

/* -----------------------------------------------------------------------
   FAQ accordion
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  items.forEach(item => {
    const btn    = item.querySelector('.faq-item__question');
    const answer = item.querySelector('.faq-item__answer');
    if (!btn || !answer) return;

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      // Close all
      items.forEach(i => {
        i.classList.remove('is-open');
        const q = i.querySelector('.faq-item__question');
        if (q) q.setAttribute('aria-expanded', 'false');
      });

      // Toggle clicked
      if (!isOpen) {
        item.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });
})();

/* -----------------------------------------------------------------------
   Job filter
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const filterBtns = document.querySelectorAll('.jobs-filter .tag');
  const jobCards   = document.querySelectorAll('.job-card');
  if (!filterBtns.length || !jobCards.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');

      const filter = btn.dataset.filter || 'all';

      jobCards.forEach(card => {
        if (filter === 'all') {
          card.style.display = '';
        } else {
          const dept = card.dataset.department || '';
          card.style.display = dept.includes(filter) ? '' : 'none';
        }
      });
    });
  });
})();

/* -----------------------------------------------------------------------
   Smooth scroll
----------------------------------------------------------------------- */
(function () {
  'use strict';

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (!target) return;
      e.preventDefault();

      const headerH = parseInt(getComputedStyle(document.documentElement)
        .getPropertyValue('--header-height')) || 80;

      window.scrollTo({
        top: target.getBoundingClientRect().top + window.scrollY - headerH - 24,
        behavior: 'smooth',
      });
    });
  });
})();

/* -----------------------------------------------------------------------
   Count-up animation
----------------------------------------------------------------------- */
(function () {
  'use strict';

  const counters = document.querySelectorAll('[data-count]');
  if (!counters.length) return;

  function easeOutQuart(t) {
    return 1 - Math.pow(1 - t, 4);
  }

  function animateCounter(el) {
    const target   = parseInt(el.dataset.count, 10);
    const duration = 1800;
    const start    = performance.now();

    function update(now) {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      el.textContent = Math.floor(easeOutQuart(progress) * target);
      if (progress < 1) requestAnimationFrame(update);
      else el.textContent = target;
    }

    requestAnimationFrame(update);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(el => observer.observe(el));
})();
