<?php
declare(strict_types=1);
$pageTitle = 'Muhamad Fikri Haikal — Full-Stack & AI Automation Engineer';
$pageDesc = 'Full-Stack Developer and AI Automation Engineer based in Kuala Perlis, Malaysia. WordPress, MERN, n8n, Make.com, RAG pipelines. Founder of TableTap and ChatLM.';
$photo = 'assets/img/photo.png';
$email = 'muhamadfikrih29@gmail.com';
$phone = '+60 11-2535-2270';
$phoneHref = '+601125352270';
$linkedin = 'https://www.linkedin.com/in/muhamad-fikri-haikal-fullstack-web-developer/';
$github = 'https://github.com/haikallfikrii';
$tabletap = 'https://tabletap.my';
$chatlm = 'https://chatlm.tech';
$skills = ['JavaScript', 'TypeScript', 'PHP 8', 'Python', 'React', 'Next.js', 'Node.js', 'Laravel', 'WordPress', 'Shopify', 'Webflow', 'n8n', 'Make.com', 'Zapier', 'AWS', 'GCP', 'MySQL', 'MongoDB', 'Stripe', 'OpenAI', 'Claude', 'LangChain'];
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>" />
  <meta name="theme-color" content="#050a0d" />
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>" />
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>" />
  <meta property="og:image" content="<?= htmlspecialchars($photo, ENT_QUOTES) ?>" />
  <meta property="og:type" content="website" />
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES) ?></title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Ctext y='26' font-size='26'%3E👨‍💻%3C/text%3E%3C/svg%3E" />
</head>
<body>
  <!-- Background -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-mesh"></div>
  </div>
  <div class="bg-grain" aria-hidden="true"></div>
  
  <!-- Custom cursor -->
  <div class="cursor" id="cursor"></div>

  <!-- Navigation -->
  <header class="nav" id="nav">
    <a class="brand" href="#top">Fikri<span>.</span></a>
    <nav class="nav-links" aria-label="Primary">
      <a href="#about" data-i18n="nav.about">About</a>
      <a href="#work" data-i18n="nav.work">Experience</a>
      <a href="#projects" data-i18n="nav.projects">Projects</a>
      <a href="#skills" data-i18n="nav.skills">Skills</a>
      <a href="#contact" data-i18n="nav.contact">Contact</a>
    </nav>
    <div class="nav-actions">
      <div class="lang-wrap">
        <button type="button" class="icon-btn" id="langToggle" aria-label="Language">
          <span id="langLabel" style="font-size:0.8rem;font-weight:600;">EN</span>
        </button>
        <div class="lang-menu" id="langMenu" role="menu">
          <button type="button" data-lang="en" role="menuitem">English</button>
          <button type="button" data-lang="id" role="menuitem">Indonesia</button>
          <button type="button" data-lang="ja" role="menuitem">日本語</button>
          <button type="button" data-lang="ar" role="menuitem">العربية</button>
          <button type="button" data-lang="de" role="menuitem">Deutsch</button>
        </div>
      </div>
      <button type="button" class="icon-btn" id="themeToggle" aria-label="Toggle theme">
        <svg id="themeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
        </svg>
      </button>
      <button type="button" class="icon-btn menu-toggle" id="menuToggle" aria-label="Menu">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 7h16M4 12h16M4 17h16"/>
        </svg>
      </button>
    </div>
  </header>

  <!-- Mobile menu -->
  <div class="mobile-menu" id="mobileMenu">
    <nav aria-label="Mobile">
      <a href="#about" data-i18n="nav.about">About</a>
      <a href="#work" data-i18n="nav.work">Experience</a>
      <a href="#projects" data-i18n="nav.projects">Projects</a>
      <a href="#skills" data-i18n="nav.skills">Skills</a>
      <a href="#contact" data-i18n="nav.contact">Contact</a>
    </nav>
  </div>

  <main id="top">
    <!-- ========== BENTO HERO ========== -->
    <section class="bento-hero wrap">
      <div class="bento-grid">
        <!-- Profile Card -->
        <article class="cell-profile glass glass-glow profile-card reveal">
          <div class="profile-photo">
            <div class="profile-glow" aria-hidden="true"></div>
            <img src="<?= htmlspecialchars($photo, ENT_QUOTES) ?>" width="1023" height="1537" alt="Muhamad Fikri Haikal" loading="eager" />
          </div>
          <div class="profile-info">
            <h1 class="profile-name">Fikri <em>Haikal</em></h1>
            <p class="profile-title" data-i18n="hero.title">Full-Stack Developer & AI Automation Engineer</p>
            <div class="profile-tags">
              <span class="tag"><span class="tag-dot"></span><span data-i18n="hero.tagOpen">Open to work</span></span>
              <span class="tag" data-i18n="hero.tagRole">Growmodo · Senior Full-Stack</span>
            </div>
            <div class="profile-cta">
              <a class="btn btn-primary" href="#work" data-i18n="hero.ctaPrimary">View experience</a>
              <a class="btn btn-ghost" href="#contact" data-i18n="hero.ctaSecondary">Let's talk</a>
            </div>
          </div>
        </article>

        <!-- Stats Card -->
        <article class="cell-stats glass glass-glow stats-card reveal">
          <div class="stat-item">
            <div class="stat-number" data-i18n="stats.years">3+</div>
            <div class="stat-label" data-i18n="stats.yearsLabel">Years Experience</div>
          </div>
          <div class="stat-item">
            <div class="stat-number" data-i18n="stats.saas">2</div>
            <div class="stat-label" data-i18n="stats.saasLabel">Live SaaS Products</div>
          </div>
          <div class="stat-item">
            <div class="stat-number" data-i18n="stats.countries">3</div>
            <div class="stat-label" data-i18n="stats.countriesLabel">Countries Served</div>
          </div>
        </article>

        <!-- Clock Widget -->
        <article class="cell-clock glass glass-glow clock-card reveal">
          <div class="clock-time" id="clock">--:--</div>
          <div class="clock-location">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
              <circle cx="12" cy="9" r="2.5"/>
            </svg>
            <span data-i18n="hero.location">Kuala Perlis, Malaysia</span>
          </div>
        </article>

        <!-- Skills Marquee -->
        <article class="cell-skills glass skills-card reveal">
          <div class="marquee">
            <div class="marquee-content">
              <?php foreach($skills as $skill): ?>
                <span class="skill-chip"><?= htmlspecialchars($skill, ENT_QUOTES) ?></span>
              <?php endforeach; ?>
            </div>
            <div class="marquee-content" aria-hidden="true">
              <?php foreach($skills as $skill): ?>
                <span class="skill-chip"><?= htmlspecialchars($skill, ENT_QUOTES) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </article>

        <!-- SaaS: TableTap -->
        <article class="cell-saas glass glass-glow saas-card reveal">
          <div class="saas-header">
            <div class="saas-icon">TT</div>
            <div class="saas-title">TableTap</div>
          </div>
          <p class="saas-desc" data-i18n="saas.tabletap">Multi-tenant QR ordering SaaS for restaurants with role-based dashboards, split bills, and thermal receipts.</p>
          <a class="saas-link" href="<?= htmlspecialchars($tabletap, ENT_QUOTES) ?>" target="_blank" rel="noopener">
            <span data-i18n="saas.visit">Visit</span> tabletap.my →
          </a>
        </article>

        <!-- Social Links -->
        <article class="cell-social glass glass-glow social-card reveal">
          <a class="social-link" href="<?= htmlspecialchars($linkedin, ENT_QUOTES) ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8.5h4V23h-4V8.5zM8.5 8.5h3.8v2h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-6.6c0-1.57-.03-3.6-2.2-3.6-2.2 0-2.54 1.72-2.54 3.5V23h-4V8.5z"/></svg>
          </a>
          <a class="social-link" href="<?= htmlspecialchars($github, ENT_QUOTES) ?>" target="_blank" rel="noopener" aria-label="GitHub">
            <svg viewBox="0 0 24 24"><path d="M12 .5C5.37.5 0 5.87 0 12.5c0 5.3 3.44 9.8 8.2 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.1-.75.08-.74.08-.74 1.22.09 1.86 1.25 1.86 1.25 1.08 1.85 2.83 1.32 3.52 1.01.11-.78.42-1.32.76-1.62-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.12-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 6 0c2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.24 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.8 5.62-5.48 5.92.43.37.81 1.1.81 2.22v3.29c0 .32.22.7.83.58A12 12 0 0 0 24 12.5C24 5.87 18.63.5 12 .5z"/></svg>
          </a>
          <a class="social-link" href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>" aria-label="Email">
            <svg viewBox="0 0 24 24"><path d="M2 4h20v16H2V4zm2 2v.5l8 5.5 8-5.5V6H4zm16 12V9.2l-8 5.5-8-5.5V18h16z"/></svg>
          </a>
        </article>
      </div>
    </section>

    <!-- ========== ABOUT ========== -->
    <section class="section" id="about">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="about.eyebrow">About</p>
          <h2 class="section-title" data-i18n="about.title">Builder. Automator. Product owner.</h2>
        </div>
        <div class="glass glass-glow reveal" style="padding: clamp(24px, 4vw, 40px);">
          <p style="font-size: 1.05rem; color: var(--c-text-dim); line-height: 1.8; margin-bottom: 16px;" data-i18n="about.p1">
            Gedex Network Inc. trusted me with custom WordPress plugins, Elementor UI, and API integrations. That work grew into AI-powered automation pipelines with n8n and OpenAI — content that ships across platforms without babysitting.
          </p>
          <p style="font-size: 1.05rem; color: var(--c-text-dim); line-height: 1.8;" data-i18n="about.p2">
            At Growmodo I deliver agency-grade sites on WordPress, Shopify, and Webflow, while running two live SaaS products solo. Certified across AWS, Azure AI, Google Cloud MLOps, Make.com, and Anthropic Claude.
          </p>
        </div>
      </div>
    </section>

    <!-- ========== EXPERIENCE ========== -->
    <section class="section" id="work">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="work.eyebrow">Experience</p>
          <h2 class="section-title" data-i18n="work.title">Where the work happens</h2>
          <p class="section-lead" data-i18n="work.lead">Remote delivery across EU, US, and Malaysia time zones.</p>
        </div>
        <div class="timeline" id="jobsMount"></div>
      </div>
    </section>

    <!-- ========== PROJECTS ========== -->
    <section class="section" id="projects">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="projects.eyebrow">Selected work</p>
          <h2 class="section-title" data-i18n="projects.title">Client systems that stay running</h2>
        </div>
        <div class="projects-grid" id="projectsMount"></div>
      </div>
    </section>

    <!-- ========== SKILLS ========== -->
    <section class="section" id="skills">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="skills.eyebrow">Toolkit</p>
          <h2 class="section-title" data-i18n="skills.title">What I reach for daily</h2>
        </div>
        <div class="skills-grid" id="skillsMount"></div>
      </div>
    </section>

    <!-- ========== CERTIFICATIONS ========== -->
    <section class="section" id="certs">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="certs.eyebrow">Credentials</p>
          <h2 class="section-title" data-i18n="certs.title">Selected certifications</h2>
        </div>
        <div class="certs-grid" id="certsMount"></div>
      </div>
    </section>

    <!-- ========== CONTACT ========== -->
    <section class="section" id="contact">
      <div class="wrap">
        <div class="section-header reveal">
          <p class="section-eyebrow" data-i18n="contact.eyebrow">Contact</p>
          <h2 class="section-title" data-i18n="contact.title">Tell me what you're building</h2>
          <p class="section-lead" data-i18n="contact.lead">Remote-ready with US and EU time zone overlap. Open to hybrid and relocation.</p>
        </div>
        <div class="contact-grid">
          <aside class="contact-info glass glass-glow reveal">
            <h3 data-i18n="contact.directTitle">Direct lines</h3>
            <p data-i18n="contact.directLead">Prefer email or LinkedIn for hiring conversations.</p>
            <div class="contact-links">
              <a class="contact-link-item" href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>">
                <small data-i18n="contact.email">Email</small>
                <span><?= htmlspecialchars($email, ENT_QUOTES) ?></span>
              </a>
              <a class="contact-link-item" href="tel:<?= htmlspecialchars($phoneHref, ENT_QUOTES) ?>">
                <small data-i18n="contact.phone">Phone</small>
                <span><?= htmlspecialchars($phone, ENT_QUOTES) ?></span>
              </a>
              <span class="contact-link-item">
                <small data-i18n="contact.location">Location</small>
                <span data-i18n="contact.locationVal">Kuala Perlis, Perlis, Malaysia</span>
              </span>
            </div>
          </aside>

          <form class="contact-form-wrap glass glass-glow reveal" id="contactForm" novalidate>
            <div class="form-row">
              <label>
                <span data-i18n="contact.name">Name</span>
                <input type="text" name="name" required autocomplete="name" placeholder="Your name" data-i18n-placeholder="contact.namePh" />
              </label>
              <label>
                <span data-i18n="contact.emailLabel">Email</span>
                <input type="email" name="email" required autocomplete="email" placeholder="you@company.com" data-i18n-placeholder="contact.emailPh" />
              </label>
            </div>
            <label>
              <span data-i18n="contact.message">Message</span>
              <textarea name="message" required placeholder="Project, role, or idea…" data-i18n-placeholder="contact.messagePh"></textarea>
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

  <!-- Footer -->
  <footer class="footer wrap">
    <div class="footer-inner glass">
      <p data-i18n="footer.copy">© 2026 Muhamad Fikri Haikal. Built with HTML, CSS, JS & PHP.</p>
      <div class="footer-socials">
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
  <script src="assets/js/main.js"></script>
</body>
</html>
