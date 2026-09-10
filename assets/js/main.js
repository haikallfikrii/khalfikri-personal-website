(() => {
  const STORAGE_THEME = "fh-theme";
  const STORAGE_LANG = "fh-lang";
  const I18N = window.PORTFOLIO_I18N;
  const root = document.documentElement;
  const body = document.body;

  /* ============ THEME ============ */
  const sunIcon = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>`;
  const moonIcon = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 14.5A8.5 8.5 0 0 1 9.5 3 7 7 0 1 0 21 14.5z"/></svg>`;

  function getPreferredTheme() {
    const saved = localStorage.getItem(STORAGE_THEME);
    if (saved === "light" || saved === "dark") return saved;
    return window.matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
  }

  function setTheme(theme) {
    root.setAttribute("data-theme", theme);
    localStorage.setItem(STORAGE_THEME, theme);
    const btn = document.getElementById("themeToggle");
    if (btn) btn.innerHTML = theme === "dark" ? sunIcon : moonIcon;
  }

  setTheme(getPreferredTheme());
  document.getElementById("themeToggle")?.addEventListener("click", () => {
    setTheme(root.getAttribute("data-theme") === "dark" ? "light" : "dark");
  });

  /* ============ LANGUAGE ============ */
  function getLang() {
    const saved = localStorage.getItem(STORAGE_LANG);
    if (saved && I18N && I18N[saved]) return saved;
    const nav = (navigator.language || "en").slice(0, 2).toLowerCase();
    if (I18N && I18N[nav]) return nav;
    return "en";
  }

  function applyLang(lang) {
    const t = I18N?.[lang];
    if (!t) return;
    localStorage.setItem(STORAGE_LANG, lang);
    root.lang = lang;
    root.dir = t.dir || "ltr";
    body.classList.toggle("rtl", t.dir === "rtl");

    document.querySelectorAll("[data-i18n]").forEach((el) => {
      const path = el.getAttribute("data-i18n");
      const value = path.split(".").reduce((o, k) => (o ? o[k] : null), t);
      if (typeof value === "string") el.textContent = value;
    });

    document.querySelectorAll("[data-i18n-placeholder]").forEach((el) => {
      const path = el.getAttribute("data-i18n-placeholder");
      const value = path.split(".").reduce((o, k) => (o ? o[k] : null), t);
      if (typeof value === "string") el.setAttribute("placeholder", value);
    });

    renderJobs(t);
    renderProjects(t);
    renderSkills(t);
    renderCerts(t);

    document.querySelectorAll(".lang-menu button").forEach((btn) => {
      btn.classList.toggle("active", btn.dataset.lang === lang);
    });

    const label = document.getElementById("langLabel");
    if (label) label.textContent = lang.toUpperCase();
  }

  function esc(str) {
    return String(str).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
  }

  function renderJobs(t) {
    const mount = document.getElementById("jobsMount");
    if (!mount || !t.work?.jobs) return;
    mount.innerHTML = t.work.jobs.map((job) => `
      <article class="job-card glass glass-glow reveal">
        <div class="job-header">
          <div>
            <div class="job-role">${esc(job.role)}</div>
            <div class="job-company">${esc(job.company)}</div>
          </div>
          <div class="job-when">${esc(job.when)}</div>
        </div>
        <ul class="job-bullets">${job.bullets.map((b) => `<li>${esc(b)}</li>`).join("")}</ul>
        <div class="stack-row">${job.stack.map((s) => `<span class="stack-pill">${esc(s)}</span>`).join("")}</div>
      </article>
    `).join("");
    observeReveals();
  }

  function renderProjects(t) {
    const mount = document.getElementById("projectsMount");
    if (!mount || !t.projects?.items) return;
    mount.innerHTML = t.projects.items.map((p) => `
      <article class="project-card glass glass-glow reveal">
        <h3>${esc(p.name)}</h3>
        <p>${esc(p.desc)}</p>
      </article>
    `).join("");
    observeReveals();
  }

  function renderSkills(t) {
    const mount = document.getElementById("skillsMount");
    if (!mount || !t.skills?.groups) return;
    mount.innerHTML = t.skills.groups.map((g) => `
      <article class="skill-block glass reveal">
        <h3>${esc(g.name)}</h3>
        <div class="stack-row">${g.items.map((i) => `<span class="stack-pill">${esc(i)}</span>`).join("")}</div>
      </article>
    `).join("");
    observeReveals();
  }

  function renderCerts(t) {
    const mount = document.getElementById("certsMount");
    if (!mount || !t.certs?.items) return;
    mount.innerHTML = t.certs.items.map((c) => `
      <article class="cert-item glass reveal">
        <span class="cert-dot"></span>
        <div class="cert-info">
          <h3>${esc(c.name)}</h3>
          <p>${esc(c.meta)}</p>
        </div>
      </article>
    `).join("");
    observeReveals();
  }

  if (I18N) applyLang(getLang());

  // Language dropdown
  const langBtn = document.getElementById("langToggle");
  const langMenu = document.getElementById("langMenu");
  langBtn?.addEventListener("click", (e) => {
    e.stopPropagation();
    langMenu?.classList.toggle("open");
  });
  langMenu?.querySelectorAll("button").forEach((btn) => {
    btn.addEventListener("click", () => {
      applyLang(btn.dataset.lang);
      langMenu.classList.remove("open");
    });
  });
  document.addEventListener("click", () => langMenu?.classList.remove("open"));

  /* ============ MOBILE MENU ============ */
  const mobile = document.getElementById("mobileMenu");
  document.getElementById("menuToggle")?.addEventListener("click", () => {
    mobile?.classList.toggle("open");
  });
  mobile?.querySelectorAll("a").forEach((a) =>
    a.addEventListener("click", () => mobile.classList.remove("open"))
  );

  /* ============ ACTIVE NAV LINK ============ */
  const sections = [...document.querySelectorAll("section[id]")];
  const navLinks = [...document.querySelectorAll(".nav-links a")];
  if (sections.length && navLinks.length) {
    const ioNav = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            navLinks.forEach((l) => l.classList.toggle("active", l.getAttribute("href") === `#${entry.target.id}`));
          }
        });
      },
      { rootMargin: "-40% 0px -50% 0px" }
    );
    sections.forEach((s) => ioNav.observe(s));
  }

  /* ============ CLOCK ============ */
  const clockEl = document.getElementById("clock");
  function updateClock() {
    if (!clockEl) return;
    const now = new Date().toLocaleTimeString("en-MY", {
      timeZone: "Asia/Kuala_Lumpur",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
      hour12: false,
    });
    clockEl.textContent = now;
  }
  updateClock();
  setInterval(updateClock, 1000);

  /* ============ REVEAL ANIMATION ============ */
  let revealIO;

  function revealVisible() {
    document.querySelectorAll(".reveal:not(.in)").forEach((el) => {
      const r = el.getBoundingClientRect();
      if (r.top < window.innerHeight + 60 && r.bottom > -60) {
        el.classList.add("in");
      }
    });
  }

  function observeReveals() {
    if (revealIO) revealIO.disconnect();

    // Immediate reveal for above-the-fold
    revealVisible();
    document.querySelectorAll(".reveal").forEach((el) => {
      if (!el.classList.contains("in")) {
        const r = el.getBoundingClientRect();
        if (r.top < window.innerHeight) el.classList.add("in");
      }
    });

    // Enable CSS animation
    root.classList.add("js-ready");

    revealIO = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            revealIO.unobserve(e.target);
          }
        });
      },
      { threshold: 0.05, rootMargin: "60px 0px 60px 0px" }
    );
    document.querySelectorAll(".reveal:not(.in)").forEach((el) => revealIO.observe(el));

    // Fallback
    setTimeout(revealVisible, 150);
    setTimeout(() => {
      document.querySelectorAll(".reveal:not(.in)").forEach((el) => el.classList.add("in"));
    }, 1000);
  }
  observeReveals();

  /* ============ CUSTOM CURSOR ============ */
  const cursor = document.getElementById("cursor");
  if (cursor && window.matchMedia("(pointer: fine)").matches) {
    body.classList.add("has-cursor");
    let cursorX = 0, cursorY = 0, targetX = 0, targetY = 0;

    window.addEventListener("pointermove", (e) => {
      targetX = e.clientX;
      targetY = e.clientY;
    }, { passive: true });

    function animateCursor() {
      cursorX += (targetX - cursorX) * 0.15;
      cursorY += (targetY - cursorY) * 0.15;
      cursor.style.left = `${cursorX}px`;
      cursor.style.top = `${cursorY}px`;
      requestAnimationFrame(animateCursor);
    }
    animateCursor();

    // Hover states
    const interactives = document.querySelectorAll("a, button, .glass-glow");
    interactives.forEach((el) => {
      el.addEventListener("mouseenter", () => cursor.classList.add("hover"));
      el.addEventListener("mouseleave", () => cursor.classList.remove("hover"));
    });
  }

  /* ============ CONTACT FORM ============ */
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");
  form?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const lang = localStorage.getItem(STORAGE_LANG) || "en";
    const t = I18N?.[lang]?.contact;
    status.textContent = "";
    status.classList.remove("error");

    const data = new FormData(form);
    try {
      const res = await fetch("api/contact.php", { method: "POST", body: data });
      const json = await res.json();
      if (!res.ok || !json.ok) throw new Error(json.message || "fail");
      status.textContent = t?.success || "Thanks! I'll reply soon.";
      form.reset();
    } catch {
      status.textContent = t?.error || "Something went wrong. Email me directly.";
      status.classList.add("error");
    }
  });
})();
