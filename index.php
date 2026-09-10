<?php
declare(strict_types=1);
$pageTitle = 'Muhamad Fikri Haikal — Full-Stack & AI Automation';
$pageDesc = 'Full-Stack Developer and AI Automation Engineer in Kuala Perlis, Malaysia. WordPress, MERN, n8n, Make, RAG. Founder of tabletap.my and chatlm.tech.';
$photo = 'assets/img/photo.png';
$email = 'muhamadfikrih29@gmail.com';
$phone = '+60 11-2535-2270';
$phoneHref = '+601125352270';
$linkedin = 'https://www.linkedin.com/in/muhamad-fikri-haikal-fullstack-web-developer/';
$github = 'https://github.com/haikallfikrii';
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>" />
  <meta name="theme-color" content="#071012" />
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>" />
  <meta property="og:image" content="<?= htmlspecialchars($photo, ENT_QUOTES) ?>" />
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Syne:wght@600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/styles.css" />
</head>
<body>
  <!-- SVG liquid refraction (Chromium backdrop-filter enhancement) -->
  <svg width="0" height="0" aria-hidden="true" style="position:absolute">
    <filter id="liquid-refract" x="-20%" y="-20%" width="140%" height="140%" color-interpolation-filters="sRGB">
      <feTurbulence type="fractalNoise" baseFrequency="0.008" numOctaves="2" seed="4" result="noise" />
      <feGaussianBlur in="noise" stdDeviation="1.5" result="blurred" />
      <feDisplacementMap in="SourceGraphic" in2="blurred" scale="28" xChannelSelector="R" yChannelSelector="G" />
    </filter>
  </svg>

  <div class="atmosphere" aria-hidden="true">
    <div class="orb orb-a"></div>
    <div class="orb orb-b"></div>
    <div class="orb orb-c"></div>
  </div>
  <div class="grain" aria-hidden="true"></div>
  <div class="spotlight" id="spotlight" aria-hidden="true"></div>

  <header class="nav glass" id="nav">
    <a class="brand" href="#top">Fikri<span>.</span></a>
    <nav class="nav-links" aria-label="Primary">
      <a href="#about" data-i18n="nav.about">About</a>
      <a href="#work" data-i18n="nav.work">Experience</a>
      <a href="#products" data-i18n="nav.products">Products</a>
      <a href="#projects" data-i18n="nav.projects">Projects</a>
      <a href="#skills" data-i18n="nav.skills">Skills</a>
      <a href="#contact" data-i18n="nav.contact">Contact</a>
    </nav>
    <div class="nav-actions">
      <div class="lang-wrap">
        <button type="button" class="lang-btn" id="langToggle" aria-label="Language">
          <span id="langLabel">EN</span>
        </button>
        <div class="lang-menu" id="langMenu" role="menu">
          <button type="button" data-lang="en" role="menuitem">English</button>
          <button type="button" data-lang="id" role="menuitem">Indonesia</button>
          <button type="button" data-lang="ja" role="menuitem">日本語</button>
          <button type="button" data-lang="ar" role="menuitem">العربية</button>
          <button type="button" data-lang="de" role="menuitem">Deutsch</button>
        </div>
      </div>
      <button type="button" class="icon-btn" id="themeToggle" aria-label="Toggle theme"></button>
      <button type="button" class="icon-btn menu-toggle" id="menuToggle" aria-label="Menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
      </button>
    </div>
  </header>

  <div class="mobile-menu" id="mobileMenu">
    <nav aria-label="Mobile">
      <a href="#about" data-i18n="nav.about">About</a>
      <a href="#work" data-i18n="nav.work">Experience</a>
      <a href="#products" data-i18n="nav.products">Products</a>
      <a href="#projects" data-i18n="nav.projects">Projects</a>
      <a href="#skills" data-i18n="nav.skills">Skills</a>
      <a href="#contact" data-i18n="nav.contact">Contact</a>
    </nav>
  </div>

  <main id="top">
    <section class="hero wrap">
      <div class="hero-grid">
        <div class="hero-copy reveal">
          <h1 class="hero-brand">Fikri <em>Haikal</em></h1>
          <p class="hero-title" data-i18n="hero.title">Full-Stack Developer &amp; AI Automation Engineer</p>
          <p class="hero-lead" data-i18n="hero.lead">I ship production web apps and agentic workflows for teams across Malaysia, the US, and Germany.</p>
          <div class="hero-cta">
            <a class="btn btn-primary" href="#work" data-i18n="hero.ctaPrimary">View work</a>
            <a class="btn btn-ghost" href="#contact" data-i18n="hero.ctaSecondary">Let's talk</a>
          </div>
          <div class="hero-meta">
            <span class="chip"><i></i><span data-i18n="hero.chipLoc">Kuala Perlis, Malaysia</span></span>
            <span class="chip" data-i18n="hero.chipOpen">Open to remote</span>
            <span class="chip" data-i18n="hero.chipRole">Growmodo · Senior Full-Stack</span>
          </div>
        </div>

        <div class="hero-visual reveal">
          <div class="photo-glow" aria-hidden="true"></div>
          <div class="photo-frame glass glass-liquid" id="photoFrame">
            <img src="<?= htmlspecialchars($photo, ENT_QUOTES) ?>" width="1023" height="1537" alt="Muhamad Fikri Haikal" loading="eager" />
          </div>
          <div class="float-tag glass a" data-i18n="hero.floatA">Liquid glass builds</div>
          <div class="float-tag glass b" data-i18n="hero.floatB">AI workflows</div>
          <div class="float-tag glass c" data-i18n="hero.floatC">tabletap.my · chatlm.tech</div>
        </div>
      </div>
    </section>

    <section class="section" id="about">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="about.eyebrow">About</p>
          <h2 data-i18n="about.title">Builder, automator, product owner</h2>
        </div>
        <div class="about-grid">
          <div class="about-card glass glass-liquid reveal">
            <p data-i18n="about.p1"></p>
            <p data-i18n="about.p2"></p>
          </div>
          <div class="stat-grid">
            <div class="stat glass reveal"><strong data-i18n="about.s1">3+</strong><span data-i18n="about.s1l"></span></div>
            <div class="stat glass reveal"><strong data-i18n="about.s2">2</strong><span data-i18n="about.s2l"></span></div>
            <div class="stat glass reveal"><strong data-i18n="about.s3">3</strong><span data-i18n="about.s3l"></span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="work">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="work.eyebrow">Experience</p>
          <h2 data-i18n="work.title">Where the work happens</h2>
          <p data-i18n="work.lead"></p>
        </div>
        <div class="timeline" id="jobsMount"></div>
      </div>
    </section>

    <section class="section" id="products">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="products.eyebrow">SaaS</p>
          <h2 data-i18n="products.title">Products I founded and ship alone</h2>
          <p data-i18n="products.lead"></p>
        </div>
        <div class="card-grid two" id="productsMount"></div>
      </div>
    </section>

    <section class="section" id="projects">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="projects.eyebrow">Selected work</p>
          <h2 data-i18n="projects.title">Client systems that stay running</h2>
        </div>
        <div class="card-grid three" id="projectsMount"></div>
      </div>
    </section>

    <section class="section" id="skills">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="skills.eyebrow">Toolkit</p>
          <h2 data-i18n="skills.title">What I reach for daily</h2>
        </div>
        <div class="skills-grid" id="skillsMount"></div>
      </div>
    </section>

    <section class="section" id="certs">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="certs.eyebrow">Credentials</p>
          <h2 data-i18n="certs.title">Selected certifications</h2>
        </div>
        <div class="certs" id="certsMount"></div>
      </div>
    </section>

    <section class="section" id="contact">
      <div class="wrap">
        <div class="section-head reveal">
          <p class="eyebrow" data-i18n="contact.eyebrow">Contact</p>
          <h2 data-i18n="contact.title">Tell me what you're building</h2>
          <p data-i18n="contact.lead"></p>
        </div>
        <div class="contact-grid">
          <aside class="contact-info glass glass-liquid reveal">
            <h3 data-i18n="contact.asideTitle">Direct lines</h3>
            <p data-i18n="contact.asideLead"></p>
            <div class="contact-list">
              <a href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>">
                <small data-i18n="contact.email">Email</small>
                <span><?= htmlspecialchars($email, ENT_QUOTES) ?></span>
              </a>
              <a href="tel:<?= htmlspecialchars($phoneHref, ENT_QUOTES) ?>">
                <small data-i18n="contact.phone">Phone</small>
                <span><?= htmlspecialchars($phone, ENT_QUOTES) ?></span>
              </a>
              <span>
                <small data-i18n="contact.location">Location</small>
                <span data-i18n="contact.locationVal">Kuala Perlis, Perlis, Malaysia</span>
              </span>
            </div>
          </aside>

          <form class="contact-form glass glass-liquid reveal" id="contactForm" novalidate>
            <div class="form-row">
              <label>
                <span data-i18n="contact.name">Name</span>
                <input type="text" name="name" required autocomplete="name" data-i18n-placeholder="contact.namePh" placeholder="Your name" />
              </label>
              <label>
                <span data-i18n="contact.email">Email</span>
                <input type="email" name="email" required autocomplete="email" data-i18n-placeholder="contact.emailPh" placeholder="you@company.com" />
              </label>
            </div>
            <label>
              <span data-i18n="contact.message">Message</span>
              <textarea name="message" required data-i18n-placeholder="contact.messagePh" placeholder="Project, role, or idea…"></textarea>
            </label>
            <label class="sr-only" aria-hidden="true">Website
              <input type="text" name="website" tabindex="-1" autocomplete="off" />
            </label>
            <button type="submit" class="btn btn-primary" data-i18n="contact.send">Send message</button>
            <p class="form-status" id="formStatus" role="status" aria-live="polite"></p>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer wrap">
    <div class="footer-inner glass">
      <p data-i18n="footer.copy">© 2026 Muhamad Fikri Haikal. Built with HTML, CSS, JS &amp; PHP.</p>
      <div class="socials">
        <a href="<?= htmlspecialchars($linkedin, ENT_QUOTES) ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V23h-4V8.5zM8.5 8.5h3.8v2h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-6.6c0-1.57-.03-3.6-2.2-3.6-2.2 0-2.54 1.72-2.54 3.5V23h-4V8.5z"/></svg>
        </a>
        <a href="<?= htmlspecialchars($github, ENT_QUOTES) ?>" target="_blank" rel="noopener" aria-label="GitHub">
          <svg viewBox="0 0 24 24"><path d="M12 .5C5.37.5 0 5.87 0 12.5c0 5.3 3.44 9.8 8.2 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.1-.75.08-.74.08-.74 1.22.09 1.86 1.25 1.86 1.25 1.08 1.85 2.83 1.32 3.52 1.01.11-.78.42-1.32.76-1.62-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.24 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.8 5.62-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.7.83.58A12 12 0 0 0 24 12.5C24 5.87 18.63.5 12 .5z"/></svg>
        </a>
        <a href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>" aria-label="Email">
          <svg viewBox="0 0 24 24"><path d="M2 4h20v16H2V4zm2 2v.5l8 5.5 8-5.5V6H4zm16 12V9.2l-8 5.5-8-5.5V18h16z"/></svg>
        </a>
      </div>
    </div>
  </footer>

  <script src="assets/js/i18n.js"></script>
  <div id="i18nBoot" hidden></div>
  <script src="assets/js/main.js"></script>
</body>
</html>
