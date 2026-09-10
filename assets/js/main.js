(() => {
  const STORAGE_THEME = "fh-theme";
  const STORAGE_LANG = "fh-lang";
  const I18N = window.PORTFOLIO_I18N;

  const root = document.documentElement;
  const body = document.body;

  /* ---------- Theme ---------- */
  function getPreferredTheme() {
    const saved = localStorage.getItem(STORAGE_THEME);
    if (saved === "light" || saved === "dark") return saved;
    return window.matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark";
  }

  function setTheme(theme) {
    root.setAttribute("data-theme", theme);
    localStorage.setItem(STORAGE_THEME, theme);
    const btn = document.getElementById("themeToggle");
    if (btn) {
      btn.setAttribute("aria-label", theme === "dark" ? "Switch to light mode" : "Switch to dark mode");
      btn.innerHTML = theme === "dark" ? sunIcon() : moonIcon();
    }
  }

  function sunIcon() {
    return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/></svg>`;
  }

  function moonIcon() {
    return `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 14.5A8.5 8.5 0 0 1 9.5 3 7 7 0 1 0 21 14.5z"/></svg>`;
  }

  setTheme(getPreferredTheme());

  document.getElementById("themeToggle")?.addEventListener("click", () => {
    const next = root.getAttribute("data-theme") === "dark" ? "light" : "dark";
    setTheme(next);
  });

  /* ---------- Language ---------- */
  function getLang() {
    const saved = localStorage.getItem(STORAGE_LANG);
    if (saved && I18N[saved]) return saved;
    const nav = (navigator.language || "en").slice(0, 2).toLowerCase();
    if (I18N[nav]) return nav;
    return "en";
  }

  function applyLang(lang) {
    const t = I18N[lang];
    if (!t) return;
    localStorage.setItem(STORAGE_LANG, lang);
    root.lang = lang;
    root.dir = t.dir;
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
    renderProducts(t);
    renderProjects(t);
    renderSkills(t);
    renderCerts(t);

    document.querySelectorAll(".lang-menu button").forEach((btn) => {
      btn.classList.toggle("active", btn.dataset.lang === lang);
    });

    const langLabel = document.getElementById("langLabel");
    if (langLabel) langLabel.textContent = lang.toUpperCase();
  }

  function renderJobs(t) {
    const mount = document.getElementById("jobsMount");
    if (!mount) return;
    mount.innerHTML = t.work.jobs
      .map(
        (job) => `
      <article class="job glass glass-liquid reveal">
        <div class="job-top">
          <div>
            <h3>${esc(job.role)}</h3>
            <p class="company">${esc(job.company)}</p>
          </div>
          <p class="when">${esc(job.when)}</p>
        </div>
        <ul>${job.bullets.map((b) => `<li>${esc(b)}</li>`).join("")}</ul>
        <div class="stack-row">${job.stack.map((s) => `<span class="pill">${esc(s)}</span>`).join("")}</div>
      </article>`
      )
      .join("");
    observeReveals();
  }

  function renderProducts(t) {
    const mount = document.getElementById("productsMount");
    if (!mount) return;
    mount.innerHTML = t.products.items
      .map(
        (p) => `
      <article class="product-card glass glass-liquid reveal">
        <div class="mark">${esc(p.mark)}</div>
        <h3>${esc(p.name)}</h3>
        <p>${esc(p.desc)}</p>
        <a class="card-link" href="${esc(p.href)}" target="_blank" rel="noopener">${esc(p.link)} →</a>
      </article>`
      )
      .join("");
    observeReveals();
  }

  function renderProjects(t) {
    const mount = document.getElementById("projectsMount");
    if (!mount) return;
    mount.innerHTML = t.projects.items
      .map(
        (p) => `
      <article class="project-card glass glass-liquid reveal">
        <h3>${esc(p.name)}</h3>
        <p>${esc(p.desc)}</p>
      </article>`
      )
      .join("");
    observeReveals();
  }

  function renderSkills(t) {
    const mount = document.getElementById("skillsMount");
    if (!mount) return;
    mount.innerHTML = t.skills.groups
      .map(
        (g) => `
      <article class="skill-block glass reveal">
        <h3>${esc(g.name)}</h3>
        <div class="stack-row">${g.items.map((i) => `<span class="pill">${esc(i)}</span>`).join("")}</div>
      </article>`
      )
      .join("");
    observeReveals();
  }

  function renderCerts(t) {
    const mount = document.getElementById("certsMount");
    if (!mount) return;
    mount.innerHTML = t.certs.items
      .map(
        (c) => `
      <article class="cert glass reveal">
        <span class="dot" aria-hidden="true"></span>
        <div>
          <h3>${esc(c.name)}</h3>
          <p>${esc(c.meta)}</p>
        </div>
      </article>`
      )
      .join("");
    observeReveals();
  }

  function esc(str) {
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;");
  }

  applyLang(getLang());

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

  /* ---------- Nav scroll + mobile ---------- */
  const nav = document.getElementById("nav");
  const onScroll = () => nav?.classList.toggle("scrolled", window.scrollY > 24);
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  const mobile = document.getElementById("mobileMenu");
  document.getElementById("menuToggle")?.addEventListener("click", () => {
    mobile?.classList.toggle("open");
  });
  mobile?.querySelectorAll("a").forEach((a) =>
    a.addEventListener("click", () => mobile.classList.remove("open"))
  );

  /* Active section link */
  const sections = [...document.querySelectorAll("section[id]")];
  const navLinks = [...document.querySelectorAll(".nav-links a")];
  const ioNav = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        navLinks.forEach((l) => l.classList.toggle("active", l.getAttribute("href") === `#${entry.target.id}`));
      });
    },
    { rootMargin: "-40% 0px -50% 0px" }
  );
  sections.forEach((s) => ioNav.observe(s));

  /* ---------- Reveal ---------- */
  let revealIO;
  function observeReveals() {
    if (revealIO) revealIO.disconnect();
    revealIO = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            revealIO.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    document.querySelectorAll(".reveal:not(.in)").forEach((el) => revealIO.observe(el));
  }
  observeReveals();

  /* ---------- Photo tilt ---------- */
  const frame = document.getElementById("photoFrame");
  if (frame && window.matchMedia("(pointer: fine)").matches) {
    frame.addEventListener("mousemove", (e) => {
      const r = frame.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - 0.5;
      const y = (e.clientY - r.top) / r.height - 0.5;
      frame.style.transform = `perspective(900px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg)`;
    });
    frame.addEventListener("mouseleave", () => {
      frame.style.transform = "";
    });
  }

  /* ---------- Spotlight ---------- */
  const spot = document.getElementById("spotlight");
  if (spot && window.matchMedia("(pointer: fine)").matches) {
    body.classList.add("has-pointer");
    window.addEventListener(
      "pointermove",
      (e) => {
        spot.style.left = `${e.clientX}px`;
        spot.style.top = `${e.clientY}px`;
      },
      { passive: true }
    );
  }

  /* ---------- Contact form ---------- */
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");
  form?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const lang = localStorage.getItem(STORAGE_LANG) || "en";
    const t = I18N[lang]?.contact;
    status.textContent = "";
    status.classList.remove("error");

    const data = new FormData(form);
    try {
      const res = await fetch("api/contact.php", { method: "POST", body: data });
      const json = await res.json();
      if (!res.ok || !json.ok) throw new Error(json.message || "fail");
      status.textContent = t?.success || "Sent.";
      form.reset();
    } catch {
      status.textContent = t?.error || "Error.";
      status.classList.add("error");
    }
  });
})();
