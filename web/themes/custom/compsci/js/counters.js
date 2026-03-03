(function () {
  const runCounter = (element) => {
    const target = Number(element.getAttribute('data-count-to') || '0');
    const startValue = Number(element.getAttribute('data-count-from') || '0');
    const prefix = element.getAttribute('data-prefix') || '';
    const suffix = element.getAttribute('data-suffix') || '';
    
    // Detect if this is a year (four digits starting with 19 or 20)
    const isYear = target >= 1900 && target <= 2100;
    const duration = isYear ? 4000 : 2800;
    const start = performance.now();

    const update = (timestamp) => {
      const progress = Math.min((timestamp - start) / duration, 1);
      
      // Different easing for years - more linear and steady
      const eased = isYear 
        ? progress * progress  // Quadratic for smoother year roll
        : 1 - Math.pow(1 - progress, 3); // Cubic ease-out for regular numbers
      
      const current = Math.floor(startValue + (target - startValue) * eased);
      element.textContent = `${prefix}${current}${suffix}`;

      if (progress < 1) {
        requestAnimationFrame(update);
      }
      else {
        element.textContent = `${prefix}${target}${suffix}`;
      }
    };

    requestAnimationFrame(update);
  };

  const initStatsCounters = () => {
    const statsSection = document.querySelector('.cs-stats');
    if (!statsSection) {
      return;
    }

    const numberElements = statsSection.querySelectorAll('.cs-stat__number');
    if (!numberElements.length) {
      return;
    }

    let hasAnimated = false;
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !hasAnimated) {
          hasAnimated = true;
          numberElements.forEach((element) => runCounter(element));
          observer.disconnect();
        }
      });
    }, { threshold: 0.35 });

    observer.observe(statsSection);
  };

  /* ========== SCROLL-REVEAL OBSERVER ========== */
  const initScrollReveal = () => {
    const revealElements = document.querySelectorAll('.cs-reveal');
    if (!revealElements.length) return;

    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('cs-revealed');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    revealElements.forEach((el) => revealObserver.observe(el));
  };

  /* ========== GALLERY LIGHTBOX ========== */
  const initGalleryLightbox = () => {
    const lightbox = document.getElementById('cs-lightbox');
    if (!lightbox) return;

    const galleryItems = document.querySelectorAll('[data-gallery-index]');
    if (!galleryItems.length) return;

    const lbImg = lightbox.querySelector('.cs-lightbox__img');
    const lbTitle = lightbox.querySelector('.cs-lightbox__caption-title');
    const lbText = lightbox.querySelector('.cs-lightbox__caption-text');
    const btnClose = lightbox.querySelector('.cs-lightbox__close');
    const btnPrev = lightbox.querySelector('.cs-lightbox__prev');
    const btnNext = lightbox.querySelector('.cs-lightbox__next');

    // Build data array from DOM — support both old gallery items and new experience media
    const slides = [];
    galleryItems.forEach((item) => {
      const img = item.querySelector('img');
      const overlay = item.querySelector('.cs-gallery__overlay');
      const caption = item.querySelector('.cs-exp-row__media-caption') || item.querySelector('.cs-exp-strip__label');
      slides.push({
        src: img ? img.src : '',
        alt: img ? img.alt : '',
        title: overlay ? overlay.querySelector('.cs-gallery__overlay-title').textContent : (caption ? caption.textContent : (img ? img.alt : '')),
        text: overlay ? overlay.querySelector('.cs-gallery__overlay-text').textContent : '',
      });
    });

    let current = 0;

    const showSlide = (index) => {
      current = (index + slides.length) % slides.length;
      lbImg.src = slides[current].src;
      lbImg.alt = slides[current].alt;
      lbTitle.textContent = slides[current].title;
      lbText.textContent = slides[current].text;
    };

    const openLightbox = (index) => {
      showSlide(index);
      lightbox.classList.add('cs-lightbox--open');
      lightbox.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
      lightbox.classList.remove('cs-lightbox--open');
      lightbox.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    };

    galleryItems.forEach((item) => {
      item.addEventListener('click', () => {
        openLightbox(Number(item.getAttribute('data-gallery-index')));
      });
    });

    btnClose.addEventListener('click', closeLightbox);
    btnPrev.addEventListener('click', () => showSlide(current - 1));
    btnNext.addEventListener('click', () => showSlide(current + 1));

    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
      if (!lightbox.classList.contains('cs-lightbox--open')) return;
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') showSlide(current - 1);
      if (e.key === 'ArrowRight') showSlide(current + 1);
    });
  };

  /* ========== EVENT COUNTDOWN BADGES ========== */
  const initEventCountdowns = () => {
    const cards = document.querySelectorAll('.cs-event-home-card[data-event-date]');
    if (!cards.length) return;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    // Find the closest upcoming event
    let closestCard = null;
    let closestDays = Infinity;

    cards.forEach((card) => {
      const dateStr = card.getAttribute('data-event-date');
      const eventDate = new Date(dateStr + 'T00:00:00');
      const diffMs = eventDate - today;
      const diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));

      if (diffDays >= 0 && diffDays < closestDays) {
        closestDays = diffDays;
        closestCard = card;
      }
    });

    if (!closestCard) return;

    const badge = closestCard.querySelector('.cs-event-home-card__countdown');
    if (!badge) return;

    if (closestDays === 0) {
      badge.textContent = 'Today';
      badge.classList.add('cs-event-home-card__countdown--today');
    } else if (closestDays === 1) {
      badge.textContent = 'Tomorrow';
      badge.classList.add('cs-event-home-card__countdown--soon');
    } else if (closestDays <= 7) {
      badge.textContent = 'In ' + closestDays + ' days';
      badge.classList.add('cs-event-home-card__countdown--soon');
    } else {
      badge.textContent = 'In ' + closestDays + ' days';
    }
    badge.classList.add('cs-event-home-card__countdown--visible');
  };

  /* ========== GOLDEN SCROLL THREAD ========== */
  const initScrollThread = () => {
    const path = document.querySelector('.cs-exp-thread__path');
    const dot = document.querySelector('.cs-exp-thread__dot');
    const section = document.querySelector('.cs-experience');
    if (!path || !section) return;

    // Measure total path length & set it as CSS var
    const len = path.getTotalLength();
    path.style.setProperty('--thread-len', len);
    path.style.setProperty('--thread-offset', len);

    const update = () => {
      const rect = section.getBoundingClientRect();
      const winH = window.innerHeight;

      // Progress: 0 when section top enters viewport, 1 when section bottom leaves
      const start = rect.top - winH;
      const end = rect.bottom;
      const total = end - start;
      const progress = Math.min(Math.max(-start / total, 0), 1);

      // Draw the line
      const offset = len * (1 - progress);
      path.style.setProperty('--thread-offset', offset);

      // Move the glowing dot along the drawn portion
      if (dot && progress > 0.01 && progress < 0.99) {
        const pt = path.getPointAtLength(len * progress);
        dot.setAttribute('cx', pt.x);
        dot.setAttribute('cy', pt.y);
        dot.classList.add('cs-exp-thread__dot--visible');
      } else if (dot) {
        dot.classList.remove('cs-exp-thread__dot--visible');
      }
    };

    // Throttle with rAF
    let ticking = false;
    const onScroll = () => {
      if (!ticking) {
        requestAnimationFrame(() => { update(); ticking = false; });
        ticking = true;
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    update(); // initial state
  };

  const initAll = () => {
    initStatsCounters();
    initScrollReveal();
    initGalleryLightbox();
    initEventCountdowns();
    initScrollThread();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  }
  else {
    initAll();
  }
})();
