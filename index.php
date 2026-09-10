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

// All skills for marquee
$skills = ['JavaScript', 'TypeScript', 'PHP 8', 'Python', 'React', 'Next.js', 'Node.js', 'Laravel', 'WordPress', 'Shopify', 'Webflow', 'n8n', 'Make.com', 'Zapier', 'AWS', 'GCP', 'Azure', 'MySQL', 'MongoDB', 'PostgreSQL', 'Stripe', 'OpenAI', 'Claude', 'LangChain', 'Supabase', 'Tailwind CSS', 'GraphQL', 'REST API'];

// All certifications from LinkedIn
$certs = [
  ['name' => 'Claude Code 101', 'issuer' => 'Anthropic', 'date' => 'Aug 2026', 'id' => 'dqjtmu5gbzwn'],
  ['name' => 'MLOps for Generative AI', 'issuer' => 'Google Cloud Skills Boost', 'date' => 'Oct 2025', 'id' => '18854828'],
  ['name' => 'Make Advanced', 'issuer' => 'Make.com', 'date' => 'Sep 2025', 'id' => ''],
  ['name' => 'Make Intermediate', 'issuer' => 'Make.com', 'date' => 'Sep 2025', 'id' => ''],
  ['name' => 'Make Foundation', 'issuer' => 'Make.com', 'date' => 'Sep 2025', 'id' => ''],
  ['name' => 'Skills Boost Arcade Trivia Week 2', 'issuer' => 'Google', 'date' => 'Sep 2025', 'id' => '18076790'],
  ['name' => 'Skills Boost Arcade Trivia Week 1', 'issuer' => 'Google', 'date' => 'Sep 2025', 'id' => '18073756'],
  ['name' => 'AWS re/Start Graduate', 'issuer' => 'Amazon Web Services', 'date' => 'Nov 2024', 'id' => ''],
  ['name' => 'Develop solutions with Azure AI Document Intelligence', 'issuer' => 'Microsoft', 'date' => 'Feb 2025', 'id' => ''],
  ['name' => 'Develop AI agents using Azure OpenAI and Semantic Kernel SDK', 'issuer' => 'Microsoft', 'date' => 'Feb 2025', 'id' => ''],
  ['name' => 'Get started with Azure AI Services', 'issuer' => 'Microsoft', 'date' => 'Feb 2025', 'id' => ''],
  ['name' => 'Microsoft Azure Cloud Concepts', 'issuer' => 'Microsoft', 'date' => 'Feb 2025', 'id' => ''],
  ['name' => 'Microsoft Azure AI Fundamentals', 'issuer' => 'Microsoft', 'date' => 'Feb 2025', 'id' => ''],
  ['name' => 'AWS Cloud Practitioner', 'issuer' => 'Orbit Future Academy', 'date' => 'Sep 2024', 'id' => 'OFA/2024-09/AWS/AWSREST/16340'],
  ['name' => 'Fullstack Web Development', 'issuer' => 'Harisenin.com', 'date' => 'Jul 2024', 'id' => 'HSBC/FSD/01/20240728052'],
  ['name' => 'Responsive Web Design', 'issuer' => 'freeCodeCamp', 'date' => 'Mar 2024', 'id' => ''],
  ['name' => 'PHP Programming', 'issuer' => 'Simplilearn', 'date' => 'Jun 2024', 'id' => '6755604'],
  ['name' => 'Cambridge English Advanced (CAE)', 'issuer' => 'Cambridge English', 'date' => 'Jan 2024', 'id' => 'MY959_MSTFIKRI_HAIKAL'],
  ['name' => 'Introduction to Information Security', 'issuer' => 'Cyber Academy Indonesia', 'date' => 'Jan 2024', 'id' => 'PKMI01101240118'],
  ['name' => 'Microsoft Security, Compliance, and Identity Fundamentals', 'issuer' => 'Microsoft', 'date' => 'Jan 2024', 'id' => '70882_77'],
  ['name' => 'UI/UX Design by Figma', 'issuer' => 'Kelas.com', 'date' => 'Sep 2023', 'id' => 'CERT-2FCF372C'],
  ['name' => 'Back-End Development with JavaScript and Node.js', 'issuer' => 'Kelas.com', 'date' => 'Sep 2023', 'id' => 'CERT-196AF385'],
  ['name' => 'WordPress Developer Certificate', 'issuer' => 'Habiskerja.com', 'date' => 'Feb 2024', 'id' => '010024/HK/22'],
];

// Experience timeline
$jobs = [
  [
    'role' => 'Senior Full-Stack Developer / AI Expert',
    'company' => 'Growmodo GmbH',
    'location' => 'Leverkusen, Germany (Remote)',
    'period' => 'Nov 2025 – Present',
    'type' => 'Full-Time',
    'bullets' => [
      'Build high-performance client sites on WordPress, Shopify, Webflow with custom plugins and themes',
      'Ship REST, GraphQL, third-party integrations focused on scale, security, and performance',
      'Use AI to accelerate development, QA, and documentation across distributed teams',
    ],
    'stack' => ['Next.js', 'PHP', 'WordPress', 'Shopify', 'Webflow', 'n8n', 'AWS'],
  ],
  [
    'role' => 'Full-Stack · AI Automation · API Specialist',
    'company' => 'Gedex Network Inc.',
    'location' => 'Carson City, USA (Remote)',
    'period' => 'Jan 2025 – Present',
    'type' => 'Part-Time',
    'bullets' => [
      'Own custom WordPress plugins, REST APIs, and Elementor UI for CaasEdu products',
      'Design end-to-end n8n / Make / LLM pipelines for AI content and multi-platform publishing',
      'Build Google Apps Script flows that process Sheets into automated publishing CSVs',
    ],
    'stack' => ['PHP', 'WordPress', 'MySQL', 'n8n', 'Make.com', 'OpenAI'],
  ],
  [
    'role' => 'Agentic AI & Automation Specialist',
    'company' => 'AIgents Solutions',
    'location' => 'Malaysia (Remote)',
    'period' => 'Apr 2025 – Present',
    'type' => 'Part-Time',
    'bullets' => [
      'Deploy agentic workflows connecting AI APIs, webhooks, and no-code tools',
      'Maintain WordPress/Elementor sites on AWS EC2 and automate manual processes',
    ],
    'stack' => ['n8n', 'Zapier', 'Make.com', 'OpenAI', 'Supabase', 'AWS'],
  ],
  [
    'role' => 'Full-Stack Web Engineer',
    'company' => 'JomSite Digital Services',
    'location' => 'Perlis, Malaysia',
    'period' => 'Feb 2024 – Present',
    'type' => 'Part-Time',
    'bullets' => [
      'Ship React/Tailwind frontends with PHP and Node backends including payment APIs and LMS',
      'Own DevOps on AWS (EC2, RDS, S3, IAM, VPC) with monitoring and incident response',
    ],
    'stack' => ['React', 'Node.js', 'PHP', 'WordPress', 'MongoDB', 'AWS'],
  ],
  [
    'role' => 'Full-Stack Web Developer',
    'company' => 'Upwork',
    'location' => 'Remote (Freelance)',
    'period' => 'Sep 2024 – Present',
    'type' => 'Freelance',
    'bullets' => [
      'Run full project cycles for international clients: scope, estimate, build, deploy, handoff docs',
    ],
    'stack' => ['Full-Stack', 'Automation', 'Client Delivery'],
  ],
];

// Projects
$projects = [
  ['name' => 'TableTap SaaS', 'desc' => 'Multi-tenant QR ordering platform with role-based dashboards (owner, cashier, waiter, kitchen), split bills, thermal receipts, 15+ SQL migrations, bilingual UI.', 'link' => $tabletap, 'icon' => '🍽️'],
  ['name' => 'ChatLM Widget', 'desc' => 'Embeddable AI chat widget in Shadow DOM. BYOK or Managed AI via OpenRouter, Stripe billing, quota metering, CORS and API key hardening.', 'link' => $chatlm, 'icon' => '💬'],
  ['name' => 'Agentic Content Publishing', 'desc' => 'n8n + DeepSeek pipeline publishing SEO posts to WordPress via REST API — unattended on VPS with retries and conditionals. ~80% faster publishing.', 'link' => null, 'icon' => '🤖'],
  ['name' => 'CAAST Education LMS', 'desc' => 'WordPress + Tutor LMS with custom PHP plugins, student notes REST API, content developer dashboard, AI publishing wired through n8n.', 'link' => null, 'icon' => '📚'],
  ['name' => 'AI Clinic Appointment Chatbot', 'desc' => 'WhatsApp booking bot with WAHA, GPT-4o, Google Calendar/Sheets integration, Telegram live-agent alerts, PDPA-aligned documentation.', 'link' => null, 'icon' => '🏥'],
  ['name' => 'Company Dashboard', 'desc' => 'Business site with role-based dashboard using custom post types and ACF, PDF generation, WhatsApp API notifications, AWS deployment with CDN.', 'link' => null, 'icon' => '📊'],
];

// Skill groups
$skillGroups = [
  ['name' => 'Languages & Frontend', 'icon' => '💻', 'items' => ['JavaScript', 'TypeScript', 'PHP 8', 'Python', 'HTML5', 'CSS3', 'React.js', 'Next.js', 'Tailwind CSS', 'Bootstrap']],
  ['name' => 'Backend & Database', 'icon' => '⚙️', 'items' => ['Node.js', 'Express.js', 'Laravel', 'REST API', 'GraphQL', 'MySQL', 'PostgreSQL', 'MongoDB', 'Redis']],
  ['name' => 'CMS & E-commerce', 'icon' => '🛒', 'items' => ['WordPress', 'Shopify (Liquid)', 'Webflow', 'WooCommerce', 'ACF', 'Elementor', 'Tutor LMS']],
  ['name' => 'AI & Automation', 'icon' => '🤖', 'items' => ['n8n', 'Make.com', 'Zapier', 'OpenAI API', 'Claude API', 'LangChain', 'RAG', 'Google Apps Script']],
  ['name' => 'Cloud & DevOps', 'icon' => '☁️', 'items' => ['AWS (EC2, S3, RDS, Lambda)', 'Google Cloud', 'Microsoft Azure', 'Supabase', 'Docker', 'CI/CD', 'Git']],
  ['name' => 'Tools & Collaboration', 'icon' => '🔧', 'items' => ['Stripe', 'GoHighLevel', 'HubSpot', 'Figma', 'Notion', 'Slack', 'Jira', 'Loom']],
];
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>">
  <meta name="theme-color" content="#0a0f14">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc, ENT_QUOTES) ?>">
  <meta property="og:image" content="<?= htmlspecialchars($photo, ENT_QUOTES) ?>">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><text y='26' font-size='26'>👨‍💻</text></svg>">
</head>
<body>
  <!-- Background -->
  <div class="bg-wrapper" aria-hidden="true">
    <div class="bg-gradient"></div>
    <div class="bg-grid"></div>
  </div>

  <!-- Navigation -->
  <header class="nav" id="nav">
    <a class="nav-brand" href="#">Fikri<span>.</span></a>
    <nav class="nav-menu">
      <a href="#about">About</a>
      <a href="#experience">Experience</a>
      <a href="#projects">Projects</a>
      <a href="#skills">Skills</a>
      <a href="#certs">Certifications</a>
      <a href="#contact">Contact</a>
    </nav>
    <div class="nav-actions">
      <div class="lang-dropdown">
        <button class="nav-btn" id="langBtn" aria-label="Change language">
          <span id="langLabel">EN</span>
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </button>
        <div class="lang-menu" id="langMenu">
          <button data-lang="en" class="active">🇬🇧 English</button>
          <button data-lang="id">🇮🇩 Indonesia</button>
          <button data-lang="ja">🇯🇵 日本語</button>
          <button data-lang="ar">🇸🇦 العربية</button>
          <button data-lang="de">🇩🇪 Deutsch</button>
        </div>
      </div>
      <button class="nav-btn" id="themeBtn" aria-label="Toggle theme">
        <svg id="sunIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>
        <svg id="moonIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      </button>
      <button class="nav-btn mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12h18M3 6h18M3 18h18"/></svg>
      </button>
    </div>
  </header>

  <!-- Mobile Menu -->
  <div class="mobile-menu" id="mobileMenu">
    <nav>
      <a href="#about">About</a>
      <a href="#experience">Experience</a>
      <a href="#projects">Projects</a>
      <a href="#skills">Skills</a>
      <a href="#certs">Certifications</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>

  <main>
    <!-- Hero Section -->
    <section class="hero" id="hero">
      <div class="container">
        <div class="hero-content">
          <div class="hero-photo">
            <div class="photo-glow"></div>
            <img src="<?= htmlspecialchars($photo, ENT_QUOTES) ?>" alt="Muhamad Fikri Haikal" loading="eager">
            <div class="photo-badge">
              <span class="badge-dot"></span>
              <span>Available for work</span>
            </div>
          </div>
          <div class="hero-text">
            <p class="hero-greeting">Hi, I'm</p>
            <h1 class="hero-name">Fikri <span>Haikal</span></h1>
            <p class="hero-title">Full-Stack Developer & AI Automation Engineer</p>
            <p class="hero-desc">I ship production web apps and agentic workflows for teams across Malaysia, the US, and Germany. Currently at <strong>Growmodo</strong> building agency-grade digital products.</p>
            <div class="hero-stats">
              <div class="stat">
                <span class="stat-num">3+</span>
                <span class="stat-label">Years Exp</span>
              </div>
              <div class="stat">
                <span class="stat-num">2</span>
                <span class="stat-label">Live SaaS</span>
              </div>
              <div class="stat">
                <span class="stat-num">23</span>
                <span class="stat-label">Certifications</span>
              </div>
              <div class="stat">
                <span class="stat-num">3</span>
                <span class="stat-label">Countries</span>
              </div>
            </div>
            <div class="hero-cta">
              <a href="#experience" class="btn btn-primary">
                <span>View Experience</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
              </a>
              <a href="#contact" class="btn btn-secondary">Let's Talk</a>
              <a href="<?= htmlspecialchars($linkedin, ENT_QUOTES) ?>" target="_blank" class="btn btn-icon" aria-label="LinkedIn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
              <a href="<?= htmlspecialchars($github, ENT_QUOTES) ?>" target="_blank" class="btn btn-icon" aria-label="GitHub">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Skills Marquee -->
        <div class="skills-marquee">
          <div class="marquee-track">
            <?php foreach($skills as $skill): ?>
              <span class="marquee-item"><?= htmlspecialchars($skill, ENT_QUOTES) ?></span>
            <?php endforeach; ?>
            <?php foreach($skills as $skill): ?>
              <span class="marquee-item"><?= htmlspecialchars($skill, ENT_QUOTES) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">About</span>
          <h2 class="section-title">Builder. Automator. Product Owner.</h2>
        </div>
        <div class="about-content">
          <div class="about-text">
            <p>Gedex Network Inc. trusted me with custom WordPress plugins, Elementor UI, and API integrations. That work grew into <strong>AI-powered automation pipelines</strong> with n8n and OpenAI — content that ships across platforms without babysitting.</p>
            <p>At <strong>Growmodo</strong> I deliver agency-grade sites on WordPress, Shopify, and Webflow, while running two live SaaS products solo. I've worked with clients and teams across <strong>Malaysia, the USA, and Germany</strong>.</p>
            <p>Certified across <strong>AWS, Azure AI, Google Cloud MLOps, Make.com, and Anthropic Claude</strong>. I believe in building systems that run themselves and documenting everything for clean handoffs.</p>
          </div>
          <div class="about-cards">
            <div class="about-card">
              <div class="about-card-icon">📍</div>
              <div class="about-card-content">
                <span class="about-card-label">Location</span>
                <span class="about-card-value">Kuala Perlis, Malaysia</span>
              </div>
            </div>
            <div class="about-card">
              <div class="about-card-icon">💼</div>
              <div class="about-card-content">
                <span class="about-card-label">Current Role</span>
                <span class="about-card-value">Senior Full-Stack @ Growmodo</span>
              </div>
            </div>
            <div class="about-card">
              <div class="about-card-icon">🌐</div>
              <div class="about-card-content">
                <span class="about-card-label">Availability</span>
                <span class="about-card-value">Remote, Hybrid, Relocation OK</span>
              </div>
            </div>
            <div class="about-card">
              <div class="about-card-icon">🗣️</div>
              <div class="about-card-content">
                <span class="about-card-label">Languages</span>
                <span class="about-card-value">Malay, Indonesian, English, Arabic</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Experience Timeline -->
    <section class="section" id="experience">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">Experience</span>
          <h2 class="section-title">Where the Work Happens</h2>
          <p class="section-desc">Remote delivery across EU, US, and Malaysia time zones.</p>
        </div>
        <div class="timeline">
          <?php foreach($jobs as $i => $job): ?>
          <div class="timeline-item" data-index="<?= $i ?>">
            <div class="timeline-marker">
              <div class="timeline-dot"></div>
              <?php if($i < count($jobs) - 1): ?><div class="timeline-line"></div><?php endif; ?>
            </div>
            <div class="timeline-content">
              <div class="timeline-header">
                <div>
                  <h3 class="timeline-role"><?= htmlspecialchars($job['role'], ENT_QUOTES) ?></h3>
                  <p class="timeline-company"><?= htmlspecialchars($job['company'], ENT_QUOTES) ?></p>
                  <p class="timeline-location"><?= htmlspecialchars($job['location'], ENT_QUOTES) ?></p>
                </div>
                <div class="timeline-meta">
                  <span class="timeline-period"><?= htmlspecialchars($job['period'], ENT_QUOTES) ?></span>
                  <span class="timeline-type"><?= htmlspecialchars($job['type'], ENT_QUOTES) ?></span>
                </div>
              </div>
              <ul class="timeline-bullets">
                <?php foreach($job['bullets'] as $bullet): ?>
                <li><?= htmlspecialchars($bullet, ENT_QUOTES) ?></li>
                <?php endforeach; ?>
              </ul>
              <div class="timeline-stack">
                <?php foreach($job['stack'] as $tech): ?>
                <span class="tech-tag"><?= htmlspecialchars($tech, ENT_QUOTES) ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Projects Section -->
    <section class="section" id="projects">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">Projects</span>
          <h2 class="section-title">Things I've Built</h2>
          <p class="section-desc">From SaaS products to AI automation systems.</p>
        </div>
        <div class="projects-grid">
          <?php foreach($projects as $project): ?>
          <article class="project-card">
            <div class="project-icon"><?= $project['icon'] ?></div>
            <h3 class="project-name"><?= htmlspecialchars($project['name'], ENT_QUOTES) ?></h3>
            <p class="project-desc"><?= htmlspecialchars($project['desc'], ENT_QUOTES) ?></p>
            <?php if($project['link']): ?>
            <a href="<?= htmlspecialchars($project['link'], ENT_QUOTES) ?>" target="_blank" class="project-link">
              <span>Visit Site</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H7M17 7v10"/></svg>
            </a>
            <?php endif; ?>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Skills Section -->
    <section class="section" id="skills">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">Skills</span>
          <h2 class="section-title">My Toolkit</h2>
          <p class="section-desc">Technologies and tools I use daily.</p>
        </div>
        <div class="skills-grid">
          <?php foreach($skillGroups as $group): ?>
          <div class="skill-category">
            <div class="skill-category-header">
              <span class="skill-icon"><?= $group['icon'] ?></span>
              <h3 class="skill-category-name"><?= htmlspecialchars($group['name'], ENT_QUOTES) ?></h3>
            </div>
            <div class="skill-tags">
              <?php foreach($group['items'] as $item): ?>
              <span class="skill-tag"><?= htmlspecialchars($item, ENT_QUOTES) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Certifications Section -->
    <section class="section" id="certs">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">Certifications</span>
          <h2 class="section-title">23 Verified Credentials</h2>
          <p class="section-desc">Continuous learning across cloud, AI, and web development.</p>
        </div>
        <div class="certs-grid">
          <?php foreach($certs as $cert): ?>
          <div class="cert-card">
            <div class="cert-badge"></div>
            <div class="cert-content">
              <h4 class="cert-name"><?= htmlspecialchars($cert['name'], ENT_QUOTES) ?></h4>
              <p class="cert-issuer"><?= htmlspecialchars($cert['issuer'], ENT_QUOTES) ?></p>
              <p class="cert-date"><?= htmlspecialchars($cert['date'], ENT_QUOTES) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
      <div class="container">
        <div class="section-header">
          <span class="section-badge">Contact</span>
          <h2 class="section-title">Let's Build Something Together</h2>
          <p class="section-desc">Have a project, role, or idea? I'd love to hear about it.</p>
        </div>
        <div class="contact-grid">
          <div class="contact-info">
            <a href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>" class="contact-card">
              <div class="contact-icon">📧</div>
              <div>
                <span class="contact-label">Email</span>
                <span class="contact-value"><?= htmlspecialchars($email, ENT_QUOTES) ?></span>
              </div>
            </a>
            <a href="tel:<?= htmlspecialchars($phoneHref, ENT_QUOTES) ?>" class="contact-card">
              <div class="contact-icon">📱</div>
              <div>
                <span class="contact-label">Phone / WhatsApp</span>
                <span class="contact-value"><?= htmlspecialchars($phone, ENT_QUOTES) ?></span>
              </div>
            </a>
            <a href="<?= htmlspecialchars($linkedin, ENT_QUOTES) ?>" target="_blank" class="contact-card">
              <div class="contact-icon">💼</div>
              <div>
                <span class="contact-label">LinkedIn</span>
                <span class="contact-value">muhamad-fikri-haikal</span>
              </div>
            </a>
            <div class="contact-card">
              <div class="contact-icon">📍</div>
              <div>
                <span class="contact-label">Location</span>
                <span class="contact-value">Kuala Perlis, Perlis, Malaysia</span>
              </div>
            </div>
          </div>
          <form class="contact-form" id="contactForm">
            <div class="form-row">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="you@company.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="5" placeholder="Tell me about your project, role, or idea..." required></textarea>
            </div>
            <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">
            <button type="submit" class="btn btn-primary btn-full">
              <span>Send Message</span>
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
            </button>
            <p class="form-status" id="formStatus"></p>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="footer-content">
        <p>© 2026 Muhamad Fikri Haikal. Built with HTML, CSS, JS & PHP.</p>
        <div class="footer-links">
          <a href="<?= htmlspecialchars($linkedin, ENT_QUOTES) ?>" target="_blank" aria-label="LinkedIn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <a href="<?= htmlspecialchars($github, ENT_QUOTES) ?>" target="_blank" aria-label="GitHub">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
          </a>
          <a href="mailto:<?= htmlspecialchars($email, ENT_QUOTES) ?>" aria-label="Email">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <script src="assets/js/main.js"></script>
</body>
</html>
