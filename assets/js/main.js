/* ==========================================================================
   UI behaviour: locale switching, theme, navigation, credential modal,
   glass elasticity, and the contact form.
   ========================================================================== */

(function () {
  "use strict";

  var STRINGS = window.FH_I18N || {};
  var DATA = window.FH_DATA || { certs: [], locales: {} };
  var reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  var $ = function (sel, scope) {
    return (scope || document).querySelector(sel);
  };
  var $$ = function (sel, scope) {
    return Array.prototype.slice.call((scope || document).querySelectorAll(sel));
  };

  function store(key, value) {
    try {
      if (value === undefined) return localStorage.getItem(key);
      localStorage.setItem(key, value);
    } catch (e) {
      /* private browsing */
    }
    return value;
  }

  /* ============================================================== locale */

  var locale = store("fh-lang") || document.documentElement.lang || "en";
  if (!STRINGS[locale]) locale = "en";

  /* Resolves "work.jobs.growmodo.bullets.0" against the active dictionary. */
  function t(path, lang) {
    var node = STRINGS[lang || locale];
    var parts = path.split(".");
    for (var i = 0; i < parts.length && node != null; i++) {
      node = node[parts[i]];
    }
    return node == null ? null : node;
  }

  function applyLocale(lang, silent) {
    if (!STRINGS[lang]) return;
    locale = lang;

    var meta = (DATA.locales && DATA.locales[lang]) || { dir: "ltr", tag: lang };
    var html = document.documentElement;
    html.lang = meta.tag || lang;
    html.dir = meta.dir || "ltr";

    // Every translatable node carries a key, so switching never has to
    // re-render markup — only the leaf text changes.
    $$("[data-i18n]").forEach(function (el) {
      var value = t(el.dataset.i18n, lang);
      if (typeof value !== "string") return;
      el.textContent = value;
      // Word-split headings must be rebuilt after the text changes.
      if (el.hasAttribute("data-split")) delete el.dataset.splitDone;
    });

    $$("[data-i18n-attr]").forEach(function (el) {
      el.dataset.i18nAttr.split("|").forEach(function (pair) {
        var bits = pair.split(":");
        var value = t(bits[1], lang);
        if (typeof value === "string") el.setAttribute(bits[0], value);
      });
    });

    var title = t("meta.title", lang);
    if (title) document.title = title;
    var desc = $('meta[name="description"]');
    if (desc && t("meta.desc", lang)) desc.setAttribute("content", t("meta.desc", lang));

    var label = $("#langLabel");
    if (label) label.textContent = (meta.tag || lang).toUpperCase();
    $$(".lang__opt").forEach(function (opt) {
      opt.classList.toggle("is-active", opt.dataset.lang === lang);
      opt.setAttribute("aria-selected", opt.dataset.lang === lang ? "true" : "false");
    });

    renderCertMeta();
    startTyping();

    $$(".job").forEach(function (job) {
      if (job._remeasure) job._remeasure();
    });

    if (!silent) {
      store("fh-lang", lang);
      document.cookie = "fh_lang=" + lang + ";path=/;max-age=31536000;samesite=lax";
    }

    if (window.FH_SCROLL) {
      window.FH_SCROLL.split();
      window.FH_SCROLL.refresh();
    }
  }

  /* Credential dates are assembled from translated labels plus raw dates. */
  function certDateLine(cert, lang) {
    var line = t("certs.issued", lang) + " " + cert.issued;
    if (cert.expires) {
      var expiredNow = new Date(cert.expires + " 1") < new Date();
      line += " · " + t(expiredNow ? "certs.expired" : "certs.expires", lang) + " " + cert.expires;
    }
    return line;
  }

  function renderCertMeta() {
    $$(".cert").forEach(function (card) {
      var cert = certBySlug(card.dataset.slug);
      if (!cert) return;
      var date = $(".cert__date", card);
      if (date) date.textContent = certDateLine(cert, locale);
      var foot = $(".cert__foot span", card);
      if (foot) foot.textContent = t(cert.verify ? "certs.verify" : "certs.noverify");
    });
  }

  function certBySlug(slug) {
    for (var i = 0; i < DATA.certs.length; i++) {
      if (DATA.certs[i].slug === slug) return DATA.certs[i];
    }
    return null;
  }

  /* =============================================================== theme */

  var themeBtn = $("#themeBtn");
  var stored = store("fh-theme");
  var initialTheme =
    stored || (window.matchMedia("(prefers-color-scheme: light)").matches ? "light" : "dark");
  document.documentElement.dataset.theme = initialTheme;

  if (themeBtn) {
    themeBtn.addEventListener("click", function () {
      var next = document.documentElement.dataset.theme === "light" ? "dark" : "light";
      document.documentElement.dataset.theme = next;
      store("fh-theme", next);
      var meta = $('meta[name="theme-color"]');
      if (meta) meta.setAttribute("content", next === "light" ? "#f4f6fa" : "#06080d");
    });
  }

  /* ========================================================== navigation */

  var lang = $("#lang");
  var langBtn = $("#langBtn");

  if (langBtn && lang) {
    langBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = lang.classList.toggle("is-open");
      langBtn.setAttribute("aria-expanded", open ? "true" : "false");
    });
    document.addEventListener("click", function (e) {
      if (!lang.contains(e.target)) {
        lang.classList.remove("is-open");
        langBtn.setAttribute("aria-expanded", "false");
      }
    });
  }

  $$(".lang__opt").forEach(function (opt) {
    opt.addEventListener("click", function () {
      applyLocale(opt.dataset.lang);
      if (lang) lang.classList.remove("is-open");
    });
  });

  var sheet = $("#sheet");
  var burger = $("#burger");

  function setSheet(open) {
    if (!sheet) return;
    sheet.classList.toggle("is-open", open);
    document.body.classList.toggle("is-locked", open);
    if (burger) burger.setAttribute("aria-expanded", open ? "true" : "false");
    if (window.FH_SCROLL) window.FH_SCROLL.lock(open);

    // Staggered entry so the sheet feels assembled rather than pasted in.
    $$(".sheet__link", sheet).forEach(function (link, i) {
      link.style.transitionDelay = open ? 60 + i * 45 + "ms" : "0ms";
    });
  }

  if (burger) {
    burger.addEventListener("click", function () {
      setSheet(!sheet.classList.contains("is-open"));
    });
  }

  $$(".sheet__link").forEach(function (link) {
    link.addEventListener("click", function () {
      setSheet(false);
    });
  });

  // Anchor navigation routed through the motion engine so it inherits inertia.
  $$('a[href^="#"]').forEach(function (link) {
    link.addEventListener("click", function (e) {
      var id = link.getAttribute("href");
      if (id === "#" || id.length < 2) return;
      var el = document.querySelector(id);
      if (!el) return;
      e.preventDefault();
      var top = el.getBoundingClientRect().top + window.scrollY - (id === "#top" ? 0 : 84);
      if (window.FH_SCROLL) window.FH_SCROLL.scrollTo(top);
      else window.scrollTo(0, top);
    });
  });

  /* ==================================================== liquid elasticity */

  /* Mirrors the "elasticity" prop from liquid-glass-react: the panel drifts a
     couple of pixels toward the cursor while the specular blob tracks it. */
  function bindElastic(el) {
    var strength = parseFloat(el.dataset.elastic) || 0.12;
    var raf = null;
    var rect = null;

    function move(e) {
      if (raf) return;
      raf = requestAnimationFrame(function () {
        raf = null;
        rect = el.getBoundingClientRect();
        var mx = e.clientX - rect.left;
        var my = e.clientY - rect.top;
        el.style.setProperty("--lg-mx", mx + "px");
        el.style.setProperty("--lg-my", my + "px");
        el.style.setProperty("--lg-tx", ((mx / rect.width - 0.5) * rect.width * strength * 0.14).toFixed(2) + "px");
        el.style.setProperty("--lg-ty", ((my / rect.height - 0.5) * rect.height * strength * 0.14).toFixed(2) + "px");
      });
    }

    function reset() {
      el.style.setProperty("--lg-tx", "0px");
      el.style.setProperty("--lg-ty", "0px");
    }

    el.addEventListener("pointermove", move);
    el.addEventListener("pointerleave", reset);
    el.addEventListener("blur", reset);
  }

  if (!reduced && window.matchMedia("(pointer: fine)").matches) {
    $$(".lg--elastic").forEach(bindElastic);
  }

  /* Portrait responds to the pointer in 3D rather than shifting flat. */
  var frame = $("#heroFrame");
  if (frame && !reduced && window.matchMedia("(pointer: fine)").matches) {
    frame.addEventListener("pointermove", function (e) {
      var rect = frame.getBoundingClientRect();
      var rx = (e.clientY - rect.top) / rect.height - 0.5;
      var ry = (e.clientX - rect.left) / rect.width - 0.5;
      frame.style.transform =
        "perspective(900px) rotateX(" + (-rx * 7).toFixed(2) + "deg) rotateY(" + (ry * 9).toFixed(2) + "deg)";
    });
    frame.addEventListener("pointerleave", function () {
      frame.style.transform = "";
    });
  }

  /* ========================================================= experience */

  $$(".job").forEach(function (job, index) {
    var head = $(".job__top", job);
    var body = $(".job__body", job);
    if (!head || !body) return;

    var inner = body.firstElementChild;

    function setOpen(open) {
      job.classList.toggle("is-open", open);
      head.setAttribute("aria-expanded", open ? "true" : "false");
      body.style.height = open ? inner.offsetHeight + "px" : "0px";
    }

    head.setAttribute("role", "button");
    head.setAttribute("tabindex", "0");
    head.setAttribute("aria-controls", body.id);
    setOpen(index === 0);

    head.addEventListener("click", function () {
      setOpen(!job.classList.contains("is-open"));
    });
    head.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        setOpen(!job.classList.contains("is-open"));
      }
    });

    // Locale changes alter bullet length, so open panels need re-measuring.
    window.addEventListener("resize", function () {
      if (job.classList.contains("is-open")) body.style.height = inner.offsetHeight + "px";
    });
    job._remeasure = function () {
      if (job.classList.contains("is-open")) body.style.height = inner.offsetHeight + "px";
    };
  });

  /* ======================================================== credentials */

  var tabs = $$(".lg-tab");
  var cards = $$(".cert");
  var empty = $("#certsEmpty");

  tabs.forEach(function (tab) {
    tab.addEventListener("click", function () {
      var group = tab.dataset.group;
      tabs.forEach(function (other) {
        other.classList.toggle("is-active", other === tab);
        other.setAttribute("aria-selected", other === tab ? "true" : "false");
      });

      var shown = 0;
      cards.forEach(function (card) {
        var match = group === "all" || card.dataset.group === group;
        card.classList.toggle("is-hidden", !match);
        if (match) shown++;
      });
      if (empty) empty.hidden = shown > 0;
      if (window.FH_SCROLL) window.FH_SCROLL.refresh();
    });
  });

  var modal = $("#certModal");
  var lastFocused = null;

  function closeModal() {
    if (!modal) return;
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("is-locked");
    if (window.FH_SCROLL) window.FH_SCROLL.lock(false);
    if (lastFocused) lastFocused.focus();
  }

  function openModal(slug) {
    var cert = certBySlug(slug);
    if (!cert || !modal) return;
    lastFocused = document.activeElement;

    $("#cmName").textContent = cert.name;
    $("#cmIssuer").textContent = cert.issuer;
    $("#cmArt").innerHTML = cert.art;

    var brand = $("#cmBrand");
    var logo = $("#cmLogo");
    if (brand && logo) {
      if (cert.logo) {
        logo.src = cert.logo;
        logo.alt = cert.issuer + " logo";
        brand.hidden = false;
      } else {
        logo.removeAttribute("src");
        brand.hidden = true;
      }
    }

    var rows = $("#cmRows");
    rows.innerHTML = "";
    function addRow(label, value) {
      if (!value) return;
      var row = document.createElement("div");
      row.className = "cmodal__row";
      var dt = document.createElement("dt");
      dt.textContent = label;
      var dd = document.createElement("dd");
      dd.textContent = value;
      row.appendChild(dt);
      row.appendChild(dd);
      rows.appendChild(row);
    }
    addRow(t("certs.issued"), cert.issued);
    if (cert.expires) {
      var expiredNow = new Date(cert.expires + " 1") < new Date();
      addRow(t(expiredNow ? "certs.expired" : "certs.expires"), cert.expires);
    }
    addRow(t("certs.credid"), cert.credential);

    var skillWrap = $("#cmSkills");
    var chipWrap = $("#cmChips");
    chipWrap.innerHTML = "";
    if (cert.skills && cert.skills.length) {
      cert.skills.forEach(function (skill) {
        var chip = document.createElement("span");
        chip.className = "chip";
        chip.textContent = skill;
        chipWrap.appendChild(chip);
      });
      skillWrap.hidden = false;
    } else {
      skillWrap.hidden = true;
    }

    var verify = $("#cmVerify");
    if (cert.verify) {
      verify.href = cert.verify;
      verify.hidden = false;
      $("#cmVerifyLabel").textContent = t("certs.verify");
    } else {
      verify.hidden = true;
    }

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("is-locked");
    if (window.FH_SCROLL) window.FH_SCROLL.lock(true);
    $("#cmClose").focus();
  }

  cards.forEach(function (card) {
    card.addEventListener("click", function () {
      openModal(card.dataset.slug);
    });
  });

  if (modal) {
    $("#cmClose").addEventListener("click", closeModal);
    $("#cmScrim").addEventListener("click", closeModal);
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && modal.classList.contains("is-open")) closeModal();
    });
  }

  /* ============================================================== typing */

  var typedEl = $("#typed");
  var typeTimer = null;

  function startTyping() {
    if (!typedEl) return;
    var roles = t("hero.roles") || [];
    if (!roles.length) return;

    clearTimeout(typeTimer);
    if (reduced) {
      typedEl.textContent = roles[0];
      return;
    }

    var index = 0;
    var chars = 0;
    var erasing = false;
    var token = ++startTyping._token;

    (function step() {
      if (token !== startTyping._token) return;
      var word = roles[index % roles.length];
      typedEl.textContent = word.slice(0, chars);

      var wait = erasing ? 34 : 62;
      if (!erasing && chars === word.length) {
        erasing = true;
        wait = 1900;
      } else if (erasing && chars === 0) {
        erasing = false;
        index++;
        wait = 320;
      } else {
        chars += erasing ? -1 : 1;
      }
      typeTimer = setTimeout(step, wait);
    })();
  }
  startTyping._token = 0;

  /* ============================================================== clock */

  var clock = $("#clock");
  if (clock) {
    (function tickClock() {
      try {
        clock.textContent = new Date().toLocaleTimeString(locale === "ar" ? "en-GB" : locale, {
          timeZone: "Asia/Kuala_Lumpur",
          hour: "2-digit",
          minute: "2-digit",
        }) + " MYT";
      } catch (e) {
        clock.textContent = new Date().toLocaleTimeString() + " MYT";
      }
      setTimeout(tickClock, 20000);
    })();
  }

  /* =============================================================== form */

  var form = $("#contactForm");
  if (form) {
    var note = $("#formNote");
    var submit = $("#formSubmit");
    var submitLabel = $("#formSubmitLabel");

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      note.className = "form__note";
      submit.disabled = true;
      submitLabel.textContent = t("contact.sending");

      fetch(form.action, { method: "POST", body: new FormData(form) })
        .then(function (res) {
          return res.json();
        })
        .then(function (json) {
          if (!json || !json.ok) throw new Error("rejected");
          note.textContent = t("contact.ok");
          note.className = "form__note is-ok";
          form.reset();
        })
        .catch(function () {
          note.textContent = t("contact.err");
          note.className = "form__note is-err";
        })
        .finally(function () {
          submit.disabled = false;
          submitLabel.textContent = t("contact.send");
        });
    });
  }

  /* ================================================================ boot */

  /* Refraction relies on backdrop-filter: url(). WebKit reports support but
     paints nothing, so limit the enhanced path to engines that render it. */
  function supportsRefraction() {
    if (!window.CSS || !CSS.supports) return false;
    if (!CSS.supports("backdrop-filter", "url(#x)") && !CSS.supports("-webkit-backdrop-filter", "url(#x)")) {
      return false;
    }
    var ua = navigator.userAgent;
    var isWebKitOnly = /AppleWebKit/.test(ua) && !/Chrome|Chromium|Edg/.test(ua);
    return !isWebKitOnly && !/Firefox/.test(ua);
  }

  if (supportsRefraction() && !reduced) {
    document.documentElement.classList.add("lg-refraction");
  }

  if (window.FH_SCROLL) window.FH_SCROLL.init();

  applyLocale(locale, true);
  $$(".job").forEach(function (job) {
    if (job._remeasure) job._remeasure();
  });
})();
