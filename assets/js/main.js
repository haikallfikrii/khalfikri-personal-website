// ============================================================
// Fikri Haikal Portfolio - Interactive JavaScript
// ============================================================

(function() {
  'use strict';

  // ============ THEME TOGGLE ============
  const themeBtn = document.getElementById('themeBtn');
  const sunIcon = document.getElementById('sunIcon');
  const moonIcon = document.getElementById('moonIcon');

  function getTheme() {
    const saved = localStorage.getItem('fh-theme');
    if (saved) return saved;
    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
  }

  function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('fh-theme', theme);
    if (sunIcon && moonIcon) {
      sunIcon.style.display = theme === 'dark' ? 'block' : 'none';
      moonIcon.style.display = theme === 'light' ? 'block' : 'none';
    }
  }

  setTheme(getTheme());

  themeBtn?.addEventListener('click', () => {
    const current = document.documentElement.getAttribute('data-theme');
    setTheme(current === 'dark' ? 'light' : 'dark');
  });

  // ============ LANGUAGE DROPDOWN ============
  const langBtn = document.getElementById('langBtn');
  const langMenu = document.getElementById('langMenu');
  const langLabel = document.getElementById('langLabel');

  langBtn?.addEventListener('click', (e) => {
    e.stopPropagation();
    langMenu?.classList.toggle('open');
  });

  document.addEventListener('click', () => {
    langMenu?.classList.remove('open');
  });

  langMenu?.querySelectorAll('button').forEach(btn => {
    btn.addEventListener('click', () => {
      const lang = btn.dataset.lang;
      localStorage.setItem('fh-lang', lang);
      if (langLabel) langLabel.textContent = lang.toUpperCase();
      
      // Update active state
      langMenu.querySelectorAll('button').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      
      // Update body direction for RTL
      document.body.classList.toggle('rtl', lang === 'ar');
      document.documentElement.lang = lang;
      document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';
      
      langMenu.classList.remove('open');
    });
  });

  // Load saved language
  const savedLang = localStorage.getItem('fh-lang') || 'en';
  if (langLabel) langLabel.textContent = savedLang.toUpperCase();
  langMenu?.querySelectorAll('button').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.lang === savedLang);
  });
  document.body.classList.toggle('rtl', savedLang === 'ar');
  document.documentElement.lang = savedLang;
  document.documentElement.dir = savedLang === 'ar' ? 'rtl' : 'ltr';

  // ============ MOBILE MENU ============
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileMenuBtn?.addEventListener('click', () => {
    mobileMenu?.classList.toggle('open');
  });

  mobileMenu?.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
    });
  });

  // ============ ACTIVE NAV LINK ============
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-menu a');

  function setActiveNav() {
    const scrollPos = window.scrollY + 150;
    
    sections.forEach(section => {
      const top = section.offsetTop;
      const height = section.offsetHeight;
      const id = section.getAttribute('id');
      
      if (scrollPos >= top && scrollPos < top + height) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${id}`) {
            link.classList.add('active');
          }
        });
      }
    });
  }

  window.addEventListener('scroll', setActiveNav, { passive: true });
  setActiveNav();

  // ============ SMOOTH SCROLL ============
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const targetId = link.getAttribute('href');
      if (targetId === '#') return;
      
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });

  // ============ CONTACT FORM ============
  const contactForm = document.getElementById('contactForm');
  const formStatus = document.getElementById('formStatus');

  contactForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    if (formStatus) {
      formStatus.textContent = 'Sending...';
      formStatus.className = 'form-status';
    }

    const formData = new FormData(contactForm);

    try {
      const response = await fetch('api/contact.php', {
        method: 'POST',
        body: formData
      });
      
      const result = await response.json();
      
      if (result.ok) {
        if (formStatus) {
          formStatus.textContent = 'Message sent! I\'ll reply soon.';
          formStatus.className = 'form-status success';
        }
        contactForm.reset();
      } else {
        throw new Error(result.message || 'Failed to send');
      }
    } catch (error) {
      if (formStatus) {
        formStatus.textContent = 'Something went wrong. Please email me directly.';
        formStatus.className = 'form-status error';
      }
    }
  });

  // ============ INTERSECTION OBSERVER FOR ANIMATIONS ============
  if ('IntersectionObserver' in window) {
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.animationPlayState = 'running';
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    document.querySelectorAll('.timeline-item, .project-card, .skill-category, .cert-card').forEach(el => {
      el.style.animationPlayState = 'paused';
      observer.observe(el);
    });
  }

  // ============ PHOTO TILT EFFECT ============
  const heroPhoto = document.querySelector('.hero-photo');
  
  if (heroPhoto && window.matchMedia('(pointer: fine)').matches) {
    heroPhoto.addEventListener('mousemove', (e) => {
      const rect = heroPhoto.getBoundingClientRect();
      const x = (e.clientX - rect.left) / rect.width - 0.5;
      const y = (e.clientY - rect.top) / rect.height - 0.5;
      
      const img = heroPhoto.querySelector('img');
      if (img) {
        img.style.transform = `perspective(500px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) scale(1.03)`;
      }
    });

    heroPhoto.addEventListener('mouseleave', () => {
      const img = heroPhoto.querySelector('img');
      if (img) {
        img.style.transform = '';
      }
    });
  }

  // ============ TIMELINE HOVER EFFECT ============
  document.querySelectorAll('.timeline-item').forEach(item => {
    item.addEventListener('mouseenter', () => {
      const dot = item.querySelector('.timeline-dot');
      if (dot) {
        dot.style.transform = 'scale(1.5)';
        dot.style.boxShadow = '0 0 20px var(--accent)';
      }
    });
    
    item.addEventListener('mouseleave', () => {
      const dot = item.querySelector('.timeline-dot');
      if (dot) {
        dot.style.transform = '';
        dot.style.boxShadow = '';
      }
    });
  });

  // ============ SKILL TAG RANDOMIZE COLOR ON HOVER ============
  document.querySelectorAll('.skill-tag').forEach(tag => {
    tag.addEventListener('mouseenter', () => {
      const hue = Math.random() * 60 + 20; // 20-80 range for warm colors
      tag.style.borderColor = `hsl(${hue}, 80%, 50%)`;
      tag.style.backgroundColor = `hsla(${hue}, 80%, 50%, 0.1)`;
      tag.style.color = `hsl(${hue}, 80%, 50%)`;
    });
    
    tag.addEventListener('mouseleave', () => {
      tag.style.borderColor = '';
      tag.style.backgroundColor = '';
      tag.style.color = '';
    });
  });

  // ============ TYPED EFFECT FOR HERO ============
  const heroTitle = document.querySelector('.hero-title');
  if (heroTitle) {
    const originalText = heroTitle.textContent;
    const titles = [
      'Full-Stack Developer & AI Automation Engineer',
      'Building SaaS Products & Automation Systems',
      'WordPress • MERN • n8n • Make.com',
      'Open to Remote Opportunities'
    ];
    let titleIndex = 0;
    
    setInterval(() => {
      titleIndex = (titleIndex + 1) % titles.length;
      heroTitle.style.opacity = '0';
      setTimeout(() => {
        heroTitle.textContent = titles[titleIndex];
        heroTitle.style.opacity = '1';
      }, 300);
    }, 4000);
  }

  console.log('🚀 Portfolio loaded successfully!');
})();
