/**
 * Recruit Pop - Main JavaScript
 */

'use strict';

/* =============================================================================
   Header: スクロール検知 & ハンバーガーメニュー
   ============================================================================= */
(function initHeader() {
  const header      = document.getElementById('site-header');
  const hamburger   = document.getElementById('hamburger-btn');
  const mobileNav   = document.getElementById('mobile-nav');

  if (!header) return;

  // スクロール検知
  const onScroll = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 20);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // ハンバーガー
  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', () => {
      const isOpen = mobileNav.classList.toggle('is-open');
      hamburger.setAttribute('aria-expanded', isOpen);
      mobileNav.setAttribute('aria-hidden', !isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // モバイルナビのリンクをクリックで閉じる
    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('is-open');
        hamburger.setAttribute('aria-expanded', 'false');
        mobileNav.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      });
    });
  }

  // アクティブナビ（スクロール位置）
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.site-nav__link[href^="#"]');

  const activateNav = () => {
    const scrollY = window.scrollY + 120;
    sections.forEach(section => {
      if (scrollY >= section.offsetTop && scrollY < section.offsetTop + section.offsetHeight) {
        navLinks.forEach(l => l.classList.remove('is-active'));
        const active = document.querySelector(`.site-nav__link[href="#${section.id}"]`);
        if (active) active.classList.add('is-active');
      }
    });
  };
  window.addEventListener('scroll', activateNav, { passive: true });
})();

/* =============================================================================
   Scroll Reveal アニメーション
   ============================================================================= */
(function initReveal() {
  const elements = document.querySelectorAll('.reveal');
  if (!elements.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
  );

  elements.forEach(el => observer.observe(el));
})();

/* =============================================================================
   FAQ アコーディオン
   ============================================================================= */
(function initFaq() {
  const items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  items.forEach(item => {
    const btn    = item.querySelector('.faq-item__question');
    const answer = item.querySelector('.faq-item__answer');
    if (!btn || !answer) return;

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      // 他を閉じる
      items.forEach(other => {
        if (other !== item) {
          other.classList.remove('is-open');
          const otherBtn = other.querySelector('.faq-item__question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        }
      });

      item.classList.toggle('is-open', !isOpen);
      btn.setAttribute('aria-expanded', !isOpen);
    });
  });
})();

/* =============================================================================
   ジョブフィルター
   ============================================================================= */
(function initJobFilter() {
  const filterBtns = document.querySelectorAll('.jobs-filter [data-filter]');
  const jobCards   = document.querySelectorAll('.job-card[data-category]');
  if (!filterBtns.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');

      const filter = btn.dataset.filter;
      jobCards.forEach(card => {
        const show = filter === 'all' || card.dataset.category === filter;
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();

/* =============================================================================
   スムーズスクロール
   ============================================================================= */
(function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const id = anchor.getAttribute('href').slice(1);
      const target = document.getElementById(id);
      if (!target) return;
      e.preventDefault();

      const headerH = parseInt(
        getComputedStyle(document.documentElement).getPropertyValue('--header-height') || '80',
        10
      );
      const top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });
})();

/* =============================================================================
   数字カウントアップ
   ============================================================================= */
(function initCountUp() {
  const statValues = document.querySelectorAll('.hero__stat-value');
  if (!statValues.length) return;

  const countUp = (el) => {
    const text    = el.textContent;
    const num     = parseFloat(text);
    const suffix  = text.replace(/[\d.]/g, '');
    if (isNaN(num)) return;

    const duration = 1500;
    const start    = performance.now();

    const tick = (now) => {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const ease     = 1 - Math.pow(1 - progress, 3);
      const current  = num * ease;

      el.textContent = (Number.isInteger(num) ? Math.round(current) : current.toFixed(1)) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        countUp(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  statValues.forEach(el => observer.observe(el));
})();
