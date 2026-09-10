/* ==========================================================================
   Motion engine
   Inertial wheel scrolling, parallax, pinned horizontal rails, progress, and
   reveal observers.

   The inertia animates the real document scroll position rather than
   translating a wrapper, so position: sticky, IntersectionObserver, anchor
   links, and the browser's own find-in-page all keep working.
   ========================================================================== */

window.FH_SCROLL = (function () {
  "use strict";

  var docEl = document.documentElement;
  var reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var coarse = window.matchMedia("(pointer: coarse)").matches;

  var LERP = 0.115;
  var WHEEL_GAIN = 1.06;

  var target = window.scrollY;
  var inertiaActive = false;
  var locked = false;
  var lastY = -1;
  var dirty = true;

  var pins = [];
  var parallax = [];
  var navEl, navPin, progressEl, workRail, workYear;
  var navLinks = [];
  var sections = [];

  function clamp(v, lo, hi) {
    return v < lo ? lo : v > hi ? hi : v;
  }

  function maxScroll() {
    return Math.max(0, docEl.scrollHeight - window.innerHeight);
  }

  /* Wheel events over an inner scroller (modal body, mobile card rail) must
     stay native, otherwise those regions become impossible to scroll. */
  function insideScroller(node) {
    while (node && node !== document.body && node.nodeType === 1) {
      if (node.scrollHeight > node.clientHeight + 2 || node.scrollWidth > node.clientWidth + 2) {
        var style = getComputedStyle(node);
        if (/(auto|scroll)/.test(style.overflowY + style.overflowX)) return true;
      }
      node = node.parentNode;
    }
    return false;
  }

  function normaliseDelta(e) {
    if (e.deltaMode === 1) return e.deltaY * 16;
    if (e.deltaMode === 2) return e.deltaY * window.innerHeight;
    return e.deltaY;
  }

  function onWheel(e) {
    if (locked || e.ctrlKey || e.metaKey || e.defaultPrevented) return;
    if (insideScroller(e.target)) return;

    e.preventDefault();
    if (!inertiaActive) target = window.scrollY;
    target = clamp(target + normaliseDelta(e) * WHEEL_GAIN, 0, maxScroll());
    inertiaActive = true;
  }

  /* -------------------------------------------------------------- layout */

  function measurePins() {
    pins.forEach(function (pin) {
      var track = pin.querySelector(".hscroll__track");
      if (!track) return;

      if (window.innerWidth <= 900 || reduced) {
        pin.style.height = "";
        track.style.transform = "";
        pin._dist = 0;
        return;
      }

      var dist = Math.max(0, track.scrollWidth - window.innerWidth);
      pin._dist = dist;
      // Extra vertical runway equals the horizontal distance to travel, so the
      // rail finishes exactly as the section unpins.
      pin.style.height = window.innerHeight + dist + "px";
    });
  }

  function movePin(link) {
    if (!navPin || !link) return;
    navPin.style.width = link.offsetWidth + "px";
    navPin.style.height = link.offsetHeight + "px";
    navPin.style.transform = "translate(" + link.offsetLeft + "px," + link.offsetTop + "px)";
    navPin.style.opacity = "1";
  }

  /* --------------------------------------------------------------- render */

  function render(y) {
    if (progressEl) {
      var max = maxScroll();
      progressEl.style.transform = "scaleX(" + (max > 0 ? y / max : 0) + ")";
    }

    if (navEl) navEl.classList.toggle("is-compact", y > 60);

    parallax.forEach(function (item) {
      var rect = item.el.getBoundingClientRect();
      if (rect.bottom < -200 || rect.top > window.innerHeight + 200) return;
      var offset = rect.top + rect.height / 2 - window.innerHeight / 2;
      item.el.style.transform = "translate3d(0," + (-offset * item.speed).toFixed(2) + "px,0)";
    });

    pins.forEach(function (pin) {
      var track = pin.querySelector(".hscroll__track");
      if (!track || !pin._dist) return;
      var runway = pin.offsetHeight - window.innerHeight;
      if (runway <= 0) return;
      var progress = clamp(-pin.getBoundingClientRect().top / runway, 0, 1);
      track.style.transform = "translate3d(" + (-progress * pin._dist).toFixed(2) + "px,0,0)";
    });

    // Active section: whichever heading last crossed the upper third.
    var activeId = null;
    for (var i = 0; i < sections.length; i++) {
      if (sections[i].getBoundingClientRect().top <= window.innerHeight * 0.34) {
        activeId = sections[i].id;
      }
    }
    var activeLink = null;
    navLinks.forEach(function (link) {
      var on = link.getAttribute("href") === "#" + activeId;
      link.classList.toggle("is-active", on);
      if (on) activeLink = link;
    });
    if (activeLink) movePin(activeLink);
    else if (navPin) navPin.style.opacity = "0";

    if (workRail && workYear) {
      var current = "";
      workRail._jobs.forEach(function (job) {
        if (job.getBoundingClientRect().top <= window.innerHeight * 0.55) {
          current = job.dataset.year || current;
        }
      });
      if (current && workYear.textContent !== current) workYear.textContent = current;
    }
  }

  function frame() {
    if (inertiaActive) {
      var diff = target - window.scrollY;
      if (Math.abs(diff) < 0.5) {
        window.scrollTo(0, target);
        inertiaActive = false;
      } else {
        window.scrollTo(0, window.scrollY + diff * LERP);
      }
    }

    var y = window.scrollY;
    if (y !== lastY || dirty) {
      render(y);
      lastY = y;
      dirty = false;
    }
    requestAnimationFrame(frame);
  }

  /* --------------------------------------------------------------- reveal */

  function initReveal() {
    var items = document.querySelectorAll(".rv");
    if (!("IntersectionObserver" in window)) {
      items.forEach(function (el) {
        el.classList.add("is-in");
      });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          observer.unobserve(entry.target);
        });
      },
      { rootMargin: "0px 0px -12% 0px", threshold: 0.08 }
    );

    items.forEach(function (el) {
      // Anything already on screen is marked in immediately, so the first
      // paint never shows an empty viewport.
      if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
        el.classList.add("is-in");
      } else {
        observer.observe(el);
      }
    });
  }

  /* Splits headings into per-word spans so they can rise in sequence. */
  function splitWords() {
    document.querySelectorAll("[data-split]").forEach(function (el) {
      if (el.dataset.splitDone) return;
      var words = el.textContent.trim().split(/\s+/);
      el.textContent = "";
      words.forEach(function (word, i) {
        var outer = document.createElement("span");
        outer.className = "word";
        var inner = document.createElement("i");
        inner.textContent = word;
        inner.style.setProperty("--w-d", i * 55 + "ms");
        outer.appendChild(inner);
        el.appendChild(outer);
        if (i < words.length - 1) el.appendChild(document.createTextNode(" "));
      });
      el.dataset.splitDone = "1";
    });
  }

  /* ----------------------------------------------------------------- API */

  function scrollTo(y, instant) {
    y = clamp(y, 0, maxScroll());
    if (instant || reduced) {
      inertiaActive = false;
      window.scrollTo(0, y);
      return;
    }
    target = y;
    inertiaActive = true;
  }

  function init() {
    navEl = document.getElementById("nav");
    navPin = document.getElementById("navPin");
    progressEl = document.getElementById("progress");
    navLinks = Array.prototype.slice.call(document.querySelectorAll(".nav__link"));
    sections = navLinks
      .map(function (link) {
        return document.querySelector(link.getAttribute("href"));
      })
      .filter(Boolean);

    pins = Array.prototype.slice.call(document.querySelectorAll(".hscroll"));

    parallax = Array.prototype.slice
      .call(document.querySelectorAll("[data-plx]"))
      .map(function (el) {
        return { el: el, speed: parseFloat(el.dataset.plx) || 0.05 };
      });

    workRail = document.getElementById("workRail");
    workYear = document.getElementById("workYear");
    if (workRail) {
      workRail._jobs = Array.prototype.slice.call(document.querySelectorAll(".job[data-year]"));
    }

    if (reduced) parallax = [];

    splitWords();
    docEl.classList.add("fh-ready");
    initReveal();
    measurePins();

    // Desktop pointers get inertia; touch keeps the platform's own physics.
    if (!reduced && !coarse) {
      docEl.classList.add("fh-lenis");
      window.addEventListener("wheel", onWheel, { passive: false });
    }

    window.addEventListener(
      "resize",
      function () {
        measurePins();
        dirty = true;
      },
      { passive: true }
    );

    window.addEventListener("load", function () {
      measurePins();
      dirty = true;
    });

    requestAnimationFrame(frame);
  }

  return {
    init: init,
    scrollTo: scrollTo,
    refresh: function () {
      measurePins();
      dirty = true;
    },
    lock: function (state) {
      locked = !!state;
      if (locked) inertiaActive = false;
    },
    reveal: initReveal,
    split: splitWords,
  };
})();
