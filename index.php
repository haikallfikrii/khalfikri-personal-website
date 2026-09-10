<?php
declare(strict_types=1);

require __DIR__ . '/includes/icons.php';
require __DIR__ . '/includes/data.php';
require __DIR__ . '/includes/i18n.php';

$loc = fh_locale();
$s   = FH_STRINGS[$loc];
$dir = FH_LOCALES[$loc]['dir'];
$p   = FH_PROFILE;

/** Shorthand for echoing a translated leaf as escaped text. */
function e(?string $v): string
{
  return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

/**
 * Displacement map for the refraction filter.
 * Red encodes horizontal offset, green vertical. The blurred neutral-grey
 * rounded rect on top flattens the interior, so only the rim bends light —
 * which is what makes the edge of the panel behave like a real lens.
 */
$mapSvg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400">
  <defs>
    <linearGradient id="x" x1="0" y1="0" x2="1" y2="0">
      <stop offset="0" stop-color="#000"/><stop offset="1" stop-color="#f00"/>
    </linearGradient>
    <linearGradient id="y" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0" stop-color="#000"/><stop offset="1" stop-color="#0f0"/>
    </linearGradient>
    <filter id="soft" x="-25%" y="-25%" width="150%" height="150%">
      <feGaussianBlur stdDeviation="26"/>
    </filter>
  </defs>
  <rect width="400" height="400" fill="#808080"/>
  <rect width="400" height="400" fill="url(#x)" style="mix-blend-mode:screen"/>
  <rect width="400" height="400" fill="url(#y)" style="mix-blend-mode:screen"/>
  <rect x="26" y="26" width="348" height="348" rx="88" fill="#808080" filter="url(#soft)"/>
</svg>
SVG;
$mapUri = 'data:image/svg+xml;charset=utf-8,' . rawurlencode($mapSvg);

/** Certificate payload handed to JS for the modal. */
$certsJs = array_map(static function (array $c): array {
  $img  = fh_cert_image($c['slug']);
  $logo = fh_issuer_logo($c['issuer']);
  return [
    'slug'       => $c['slug'],
    'name'       => $c['name'],
    'issuer'     => $c['issuer'],
    'issued'     => $c['issued'],
    'expires'    => $c['expires'] ?? null,
    'credential' => $c['credential'],
    'verify'     => $c['verify'],
    'group'      => $c['group'],
    'skills'     => $c['skills'],
    'logo'       => $logo,
    'preview'    => $img,
    'art'        => $img
      ? '<img src="' . e($img) . '" alt="' . e($c['name']) . '" loading="lazy" decoding="async">'
      : fh_cert_artwork($c),
  ];
}, FH_CERTS);

$assetV = '20260911g';
$jsonFlags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;
?>
<!DOCTYPE html>
<html lang="<?= e(FH_LOCALES[$loc]['tag']) ?>" dir="<?= e($dir) ?>" data-theme="dark">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($s['meta']['title']) ?></title>
<meta name="description" content="<?= e($s['meta']['desc']) ?>">
<meta name="author" content="<?= e($p['name']) ?>">
<meta name="theme-color" content="#06080d">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= e($s['meta']['title']) ?>">
<meta property="og:description" content="<?= e($s['meta']['desc']) ?>">
<meta property="og:image" content="<?= e($p['photo']) ?>">
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/liquid-glass.css?v=<?= e($assetV) ?>">
<link rel="stylesheet" href="assets/css/styles.css?v=<?= e($assetV) ?>">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='8' fill='%23ff9f45'/><text x='16' y='22' font-family='sans-serif' font-size='16' font-weight='700' fill='%2306080d' text-anchor='middle'>F</text></svg>">
<script>
  // Applied before first paint so the theme never flashes.
  try {
    var st = localStorage.getItem('fh-theme');
    document.documentElement.dataset.theme =
      st || (matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');
  } catch (e) {}
</script>
</head>
<body id="top">

<a class="skip" href="#main">Skip to content</a>

<!-- Refraction filters. Two strengths: panels bend more than controls. -->
<svg class="lg-svg" aria-hidden="true" focusable="false">
  <defs>
    <filter id="lg-refract" x="0%" y="0%" width="100%" height="100%" color-interpolation-filters="sRGB">
      <feImage href="<?= e($mapUri) ?>" xlink:href="<?= e($mapUri) ?>" result="map" preserveAspectRatio="none" x="0" y="0" width="100%" height="100%"/>
      <!-- Three passes at slightly different strengths, each isolated to one
           channel, recombine into chromatic aberration at the rim. -->
      <feDisplacementMap in="SourceGraphic" in2="map" scale="-82" xChannelSelector="R" yChannelSelector="G" result="dR"/>
      <feColorMatrix in="dR" type="matrix" values="1 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 0" result="cR"/>
      <feDisplacementMap in="SourceGraphic" in2="map" scale="-70" xChannelSelector="R" yChannelSelector="G" result="dG"/>
      <feColorMatrix in="dG" type="matrix" values="0 0 0 0 0  0 1 0 0 0  0 0 0 0 0  0 0 0 1 0" result="cG"/>
      <feDisplacementMap in="SourceGraphic" in2="map" scale="-58" xChannelSelector="R" yChannelSelector="G" result="dB"/>
      <feColorMatrix in="dB" type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 1 0 0  0 0 0 1 0" result="cB"/>
      <feBlend in="cR" in2="cG" mode="screen" result="cRG"/>
      <feBlend in="cRG" in2="cB" mode="screen" result="cRGB"/>
      <feGaussianBlur in="cRGB" stdDeviation="0.32"/>
    </filter>

    <filter id="lg-refract-deep" x="0%" y="0%" width="100%" height="100%" color-interpolation-filters="sRGB">
      <feImage href="<?= e($mapUri) ?>" xlink:href="<?= e($mapUri) ?>" result="m" preserveAspectRatio="none" x="0" y="0" width="100%" height="100%"/>
      <feDisplacementMap in="SourceGraphic" in2="m" scale="-150" xChannelSelector="R" yChannelSelector="G" result="pR"/>
      <feColorMatrix in="pR" type="matrix" values="1 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 1 0" result="qR"/>
      <feDisplacementMap in="SourceGraphic" in2="m" scale="-132" xChannelSelector="R" yChannelSelector="G" result="pG"/>
      <feColorMatrix in="pG" type="matrix" values="0 0 0 0 0  0 1 0 0 0  0 0 0 0 0  0 0 0 1 0" result="qG"/>
      <feDisplacementMap in="SourceGraphic" in2="m" scale="-114" xChannelSelector="R" yChannelSelector="G" result="pB"/>
      <feColorMatrix in="pB" type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 1 0 0  0 0 0 1 0" result="qB"/>
      <feBlend in="qR" in2="qG" mode="screen" result="qRG"/>
      <feBlend in="qRG" in2="qB" mode="screen" result="qRGB"/>
      <feGaussianBlur in="qRGB" stdDeviation="0.5"/>
    </filter>
  </defs>
</svg>

<div class="atmos" aria-hidden="true">
  <div class="atmos__blob"></div>
  <div class="atmos__blob"></div>
  <div class="atmos__blob"></div>
  <div class="atmos__grid"></div>
  <div class="atmos__grain"></div>
</div>

<!-- ============================================================== navbar -->
<header class="nav" id="nav">
  <div class="nav__bar lg lg--elastic lg--deep" data-elastic="0.06">
    <span class="lg-refract"></span>
    <span class="lg-hl"></span>
    <div class="lg-in nav__row">
      <a class="nav__brand" href="#top">
        <span class="nav__mark" aria-hidden="true">FH</span>
        <span>Fikri Haikal</span>
      </a>

      <nav class="nav__links" aria-label="Sections">
        <span class="nav__pin" id="navPin" aria-hidden="true"></span>
        <a class="nav__link" href="#about"    data-i18n="nav.about"><?= e($s['nav']['about']) ?></a>
        <a class="nav__link" href="#work"     data-i18n="nav.work"><?= e($s['nav']['work']) ?></a>
        <a class="nav__link" href="#projects" data-i18n="nav.projects"><?= e($s['nav']['projects']) ?></a>
        <a class="nav__link" href="#skills"   data-i18n="nav.skills"><?= e($s['nav']['skills']) ?></a>
        <a class="nav__link" href="#certs"    data-i18n="nav.certs"><?= e($s['nav']['certs']) ?></a>
        <a class="nav__link" href="#contact"  data-i18n="nav.contact"><?= e($s['nav']['contact']) ?></a>
      </nav>

      <div class="nav__actions">
        <div class="lang" id="lang">
          <button class="lg lg-btn lg-btn--sm" id="langBtn" type="button"
                  aria-haspopup="listbox" aria-expanded="false"
                  aria-label="<?= e($s['ui']['lang']) ?>" data-i18n-attr="aria-label:ui.lang">
            <?= fh_icon('languages', 16) ?>
            <span id="langLabel"><?= e(strtoupper($loc)) ?></span>
            <?= fh_icon('chevron', 13) ?>
          </button>
          <div class="lang__menu lg" id="langMenu" role="listbox">
            <div class="lg-in">
              <?php foreach (FH_LOCALES as $code => $meta): ?>
              <button class="lang__opt<?= $code === $loc ? ' is-active' : '' ?>" type="button"
                      role="option" aria-selected="<?= $code === $loc ? 'true' : 'false' ?>"
                      data-lang="<?= e($code) ?>">
                <span class="lang__tag"><?= e(strtoupper($code)) ?></span>
                <span><?= e($meta['native']) ?></span>
              </button>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <button class="lg lg-btn lg-btn--icon" id="themeBtn" type="button"
                aria-label="<?= e($s['ui']['theme']) ?>" data-i18n-attr="aria-label:ui.theme">
          <span class="theme__icons">
            <?= fh_icon('sun', 18, 'ico ico--sun') ?>
            <?= fh_icon('moon', 18, 'ico ico--moon') ?>
          </span>
        </button>

        <button class="lg lg-btn lg-btn--icon nav__burger" id="burger" type="button"
                aria-expanded="false" aria-controls="sheet"
                aria-label="<?= e($s['ui']['menu']) ?>" data-i18n-attr="aria-label:ui.menu">
          <?= fh_icon('menu', 19) ?>
        </button>
      </div>
    </div>
  </div>
</header>

<div class="sheet" id="sheet">
  <div class="sheet__panel lg lg-panel">
    <span class="lg-refract"></span>
    <div class="lg-in">
      <?php foreach ($s['nav'] as $key => $label): ?>
      <a class="sheet__link" href="#<?= e($key === 'work' ? 'work' : $key) ?>">
        <span data-i18n="nav.<?= e($key) ?>"><?= e($label) ?></span>
        <?= fh_icon('arrow-right', 18) ?>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<main id="main">

<!-- ================================================================ hero -->
<section class="hero">
  <div class="shell">
    <div class="hero__grid">
      <div class="hero__copy">
        <span class="hero__eyebrow lg lg-pill rv">
          <span class="lg-in" style="display:contents">
            <span class="hero__dot" aria-hidden="true"></span>
            <span data-i18n="hero.available"><?= e($s['hero']['available']) ?></span>
          </span>
        </span>

        <h1 class="hero__name rv" style="--rv-d:60ms">
          Muhamad<br><em>Fikri Haikal</em>
        </h1>

        <p class="hero__role rv" style="--rv-d:140ms">
          <span class="hero__typed" id="typed"><?= e($s['hero']['roles'][0]) ?></span>
          <span class="hero__caret" aria-hidden="true"></span>
        </p>

        <p class="hero__lead rv" style="--rv-d:200ms" data-i18n="hero.lead"><?= e($s['hero']['lead']) ?></p>

        <div class="hero__cta rv" style="--rv-d:260ms">
          <a class="lg lg-btn lg-btn--accent lg--elastic" href="#contact" data-elastic="0.18">
            <span class="lg-hl"></span>
            <span data-i18n="hero.cta1"><?= e($s['hero']['cta1']) ?></span>
            <?= fh_icon('arrow-right', 17) ?>
          </a>
          <a class="lg lg-btn lg--elastic" href="#projects" data-elastic="0.18">
            <span class="lg-refract"></span>
            <span class="lg-hl"></span>
            <span data-i18n="hero.cta2"><?= e($s['hero']['cta2']) ?></span>
            <?= fh_icon('arrow-down', 17) ?>
          </a>
          <a class="lg lg-btn lg-btn--icon lg--elastic" href="<?= e($p['linkedin']) ?>"
             target="_blank" rel="noopener" aria-label="LinkedIn">
            <span class="lg-hl"></span><?= fh_icon('linkedin', 16) ?>
          </a>
          <a class="lg lg-btn lg-btn--icon lg--elastic" href="<?= e($p['github']) ?>"
             target="_blank" rel="noopener" aria-label="GitHub">
            <span class="lg-hl"></span><?= fh_icon('github', 16) ?>
          </a>
        </div>

        <p class="hero__based rv" style="--rv-d:320ms">
          <?= fh_icon('location', 15) ?>
          <span data-i18n="hero.based"><?= e($s['hero']['based']) ?></span>
        </p>
      </div>

      <figure class="hero__figure rv rv--scale" style="--rv-d:120ms">
        <span class="hero__ring" aria-hidden="true"></span>
        <div class="hero__frame lg lg--over-light lg--deep" id="heroFrame">
          <span class="lg-refract"></span>
          <div class="lg-in">
            <img class="hero__photo" src="<?= e($p['photo']) ?>"
                 alt="<?= e($p['name']) ?>" width="1023" height="1537" fetchpriority="high">
          </div>
        </div>
        <div class="hero__chip hero__chip--tl lg" data-plx="0.03">
          <span class="lg-in">
            <b>5+</b>
            <span data-i18n="stats.0.label"><?= e($s['stats'][0]['label']) ?></span>
          </span>
        </div>
        <div class="hero__chip hero__chip--br lg" data-plx="-0.035">
          <span class="lg-in">
            <b>24</b>
            <span data-i18n="stats.1.label"><?= e($s['stats'][1]['label']) ?></span>
          </span>
        </div>
      </figure>
    </div>

    <div class="stats">
      <?php foreach ($s['stats'] as $i => $stat): ?>
      <div class="stat lg lg--elastic rv" style="--rv-d:<?= 80 * $i ?>ms">
        <span class="lg-hl"></span>
        <div class="lg-in">
          <div class="stat__n" data-i18n="stats.<?= $i ?>.n"><?= e($stat['n']) ?></div>
          <div class="stat__l" data-i18n="stats.<?= $i ?>.label"><?= e($stat['label']) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="marquee rv" aria-hidden="true">
      <div class="marquee__track">
        <?php for ($pass = 0; $pass < 2; $pass++): ?>
          <?php foreach (FH_MARQUEE as $tech): ?>
          <span class="marquee__item"><?= e($tech) ?></span>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>

<!-- =============================================================== about -->
<section class="sect" id="about">
  <div class="shell">
    <div class="about__grid">
      <div class="about__rail">
        <span class="sect__badge lg lg-pill rv">
          <span class="lg-in" data-i18n="about.badge"><?= e($s['about']['badge']) ?></span>
        </span>
        <h2 class="sect__title rv" data-split data-i18n="about.title"><?= e($s['about']['title']) ?></h2>
        <p class="about__lead rv" style="--rv-d:120ms" data-i18n="about.lead"><?= e($s['about']['lead']) ?></p>
      </div>

      <div>
        <div class="about__body rv">
          <p data-i18n="about.p1"><?= e($s['about']['p1']) ?></p>
          <p data-i18n="about.p2"><?= e($s['about']['p2']) ?></p>
        </div>
        <div class="about__cards">
          <?php foreach ($s['about']['cards'] as $i => $card): ?>
          <div class="about__card lg lg--elastic rv" style="--rv-d:<?= 90 * $i ?>ms">
            <span class="lg-refract"></span>
            <span class="lg-hl"></span>
            <div class="lg-in icon-tile"><?= fh_icon($card['icon'], 20) ?></div>
            <div class="lg-in">
              <h3 data-i18n="about.cards.<?= $i ?>.title"><?= e($card['title']) ?></h3>
              <p data-i18n="about.cards.<?= $i ?>.text"><?= e($card['text']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========================================================== experience -->
<section class="sect" id="work">
  <div class="shell">
    <div class="sect__head">
      <span class="sect__badge lg lg-pill rv">
        <span class="lg-in" data-i18n="work.badge"><?= e($s['work']['badge']) ?></span>
      </span>
      <h2 class="sect__title rv" data-split data-i18n="work.title"><?= e($s['work']['title']) ?></h2>
      <p class="sect__desc rv" style="--rv-d:100ms" data-i18n="work.desc"><?= e($s['work']['desc']) ?></p>
    </div>

    <div class="work">
      <div class="work__rail" id="workRail" aria-hidden="true">
        <div class="work__year" id="workYear"><?= e(FH_JOBS[0]['year']) ?></div>
      </div>

      <div class="work__list">
        <?php foreach (FH_JOBS as $i => $job):
          $jt = $s['work']['jobs'][$job['slug']];
          $period = $job['from'] . ' – ' . ($job['to'] ?? $s['work']['present']);
        ?>
        <article class="job lg lg--elastic rv" data-year="<?= e($job['year']) ?>" style="--rv-d:<?= 70 * $i ?>ms">
          <span class="lg-refract"></span>
          <span class="lg-hl"></span>
          <span class="job__node" aria-hidden="true"></span>
          <div class="lg-in">
            <div class="job__top" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>">
              <div class="lg-in icon-tile"><?= fh_icon($job['icon'], 19) ?></div>
              <div>
                <h3 class="job__role" data-i18n="work.jobs.<?= e($job['slug']) ?>.role"><?= e($jt['role']) ?></h3>
                <p class="job__co"><?= e($job['company']) ?></p>
                <div class="job__meta">
                  <span><?= fh_icon('location', 14) ?><?= e($job['city']) ?></span>
                  <span><?= fh_icon('clock', 14) ?><span data-period="<?= e($job['from']) ?>"><?= e($period) ?></span></span>
                  <span><?= fh_icon('briefcase', 14) ?><span data-i18n="work.jobs.<?= e($job['slug']) ?>.type"><?= e($jt['type']) ?></span></span>
                </div>
              </div>
              <span class="job__chev"><?= fh_icon('chevron', 20) ?></span>
            </div>

            <div class="job__body" id="jobBody<?= $i ?>">
              <div>
                <ul class="job__bullets">
                  <?php foreach ($jt['bullets'] as $b => $bullet): ?>
                  <li data-i18n="work.jobs.<?= e($job['slug']) ?>.bullets.<?= $b ?>"><?= e($bullet) ?></li>
                  <?php endforeach; ?>
                </ul>
                <div class="chips">
                  <?php foreach ($job['stack'] as $tech): ?>
                  <span class="chip"><?= e($tech) ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ============================================ projects — pinned sideways -->
<section class="sect" id="projects" style="padding-bottom:0">
  <div class="shell">
    <div class="sect__head">
      <span class="sect__badge lg lg-pill rv">
        <span class="lg-in" data-i18n="projects.badge"><?= e($s['projects']['badge']) ?></span>
      </span>
      <h2 class="sect__title rv" data-split data-i18n="projects.title"><?= e($s['projects']['title']) ?></h2>
      <p class="sect__desc rv" style="--rv-d:100ms" data-i18n="projects.desc"><?= e($s['projects']['desc']) ?></p>
    </div>
  </div>

  <div class="hscroll" id="projectsPin">
    <div class="hscroll__stage">
      <div class="hscroll__view">
        <div class="hscroll__track">
          <?php foreach (FH_PROJECTS as $i => $proj): ?>
          <article class="pcard lg lg--elastic lg--deep">
            <span class="lg-refract"></span>
            <span class="lg-hl"></span>
            <div class="lg-in" style="display:flex;flex-direction:column;flex:1">
              <span class="pcard__n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?> / <?= str_pad((string) count(FH_PROJECTS), 2, '0', STR_PAD_LEFT) ?></span>
              <div class="pcard__icon"><?= fh_icon($proj['icon'], 24) ?></div>
              <h3 class="pcard__name"><?= e($proj['name']) ?></h3>
              <p class="pcard__desc" data-i18n="projects.items.<?= e($proj['slug']) ?>"><?= e($s['projects']['items'][$proj['slug']]) ?></p>
              <div class="pcard__foot">
                <div class="chips">
                  <?php foreach ($proj['tags'] as $tag): ?>
                  <span class="chip"><?= e($tag) ?></span>
                  <?php endforeach; ?>
                </div>
                <?php if ($proj['link']): ?>
                <a class="pcard__link" href="<?= e($proj['link']) ?>" target="_blank" rel="noopener">
                  <span data-i18n="projects.visit"><?= e($s['projects']['visit']) ?></span>
                  <?= fh_icon('arrow-out', 15) ?>
                </a>
                <?php endif; ?>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
      <p class="hscroll__hint">
        <span data-i18n="projects.hint"><?= e($s['projects']['hint']) ?></span>
        <?= fh_icon('arrow-right', 16) ?>
      </p>
    </div>
  </div>
</section>

<!-- ============================================================== skills -->
<section class="sect" id="skills">
  <div class="shell">
    <div class="sect__head">
      <span class="sect__badge lg lg-pill rv">
        <span class="lg-in" data-i18n="skills.badge"><?= e($s['skills']['badge']) ?></span>
      </span>
      <h2 class="sect__title rv" data-split data-i18n="skills.title"><?= e($s['skills']['title']) ?></h2>
      <p class="sect__desc rv" style="--rv-d:100ms" data-i18n="skills.desc"><?= e($s['skills']['desc']) ?></p>
    </div>

    <div class="skills__grid">
      <?php foreach (FH_SKILL_GROUPS as $i => $group): ?>
      <div class="sgroup lg lg--elastic rv" style="--rv-d:<?= 60 * $i ?>ms">
        <span class="lg-refract"></span>
        <span class="lg-hl"></span>
        <div class="lg-in">
          <div class="sgroup__head">
            <span class="icon-tile"><?= fh_icon($group['icon'], 20) ?></span>
            <h3 data-i18n="skills.groups.<?= e($group['slug']) ?>"><?= e($s['skills']['groups'][$group['slug']]) ?></h3>
          </div>
          <div class="chips">
            <?php foreach ($group['items'] as $item): ?>
            <span class="chip"><?= e($item) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ========================================================= credentials -->
<section class="sect" id="certs">
  <div class="shell">
    <div class="sect__head">
      <span class="sect__badge lg lg-pill rv">
        <span class="lg-in" data-i18n="certs.badge"><?= e($s['certs']['badge']) ?></span>
      </span>
      <h2 class="sect__title rv" data-split data-i18n="certs.title"><?= e($s['certs']['title']) ?></h2>
      <p class="sect__desc rv" style="--rv-d:100ms" data-i18n="certs.desc"><?= e($s['certs']['desc']) ?></p>
    </div>

    <div class="certs__tabs rv" role="tablist">
      <?php foreach ($s['certs']['filters'] as $key => $label): ?>
      <button class="lg-tab<?= $key === 'all' ? ' is-active' : '' ?>" type="button" role="tab"
              aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>" data-group="<?= e($key) ?>"
              data-i18n="certs.filters.<?= e($key) ?>"><?= e($label) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="certs__grid">
      <?php foreach ($certsJs as $i => $cert): ?>
      <button class="cert lg lg--elastic rv" type="button"
              data-slug="<?= e($cert['slug']) ?>" data-group="<?= e($cert['group']) ?>"
              style="--rv-d:<?= 40 * ($i % 8) ?>ms"
              aria-label="<?= e($cert['name'] . ' — ' . $cert['issuer']) ?>">
        <span class="lg-hl"></span>
        <span class="cert__art">
          <?= $cert['art'] ?>
          <span class="cert__zoom"><span><?= fh_icon('zoom', 20) ?></span></span>
        </span>
        <span class="cert__body lg-in">
          <span class="cert__name"><?= e($cert['name']) ?></span>
          <span class="cert__issuer-row">
            <?php if (!empty($cert['logo'])): ?>
            <img class="cert__logo" src="<?= e($cert['logo']) ?>" alt="" width="22" height="22" loading="lazy" decoding="async">
            <?php endif; ?>
            <span class="cert__issuer"><?= e($cert['issuer']) ?></span>
          </span>
          <span class="cert__date"></span>
          <span class="cert__foot<?= $cert['verify'] ? ' is-verified' : '' ?>">
            <?= fh_icon($cert['verify'] ? 'verified' : 'link', 14) ?><span></span>
          </span>
        </span>
      </button>
      <?php endforeach; ?>
    </div>
    <p class="certs__empty" id="certsEmpty" hidden data-i18n="certs.empty"><?= e($s['certs']['empty']) ?></p>
  </div>
</section>

<!-- ============================================================= contact -->
<section class="sect" id="contact">
  <div class="shell">
    <div class="sect__head">
      <span class="sect__badge lg lg-pill rv">
        <span class="lg-in" data-i18n="contact.badge"><?= e($s['contact']['badge']) ?></span>
      </span>
      <h2 class="sect__title rv" data-split data-i18n="contact.title"><?= e($s['contact']['title']) ?></h2>
      <p class="sect__desc rv" style="--rv-d:100ms" data-i18n="contact.desc"><?= e($s['contact']['desc']) ?></p>
    </div>

    <div class="contact__grid">
      <div class="contact__aside">
        <a class="crow lg lg--elastic rv" href="mailto:<?= e($p['email']) ?>">
          <span class="lg-hl"></span>
          <span class="lg-in icon-tile"><?= fh_icon('mail', 19) ?></span>
          <span class="lg-in">
            <span class="crow__l" data-i18n="contact.emailLabel"><?= e($s['contact']['emailLabel']) ?></span>
            <span class="crow__v"><?= e($p['email']) ?></span>
          </span>
          <span class="lg-in crow__go"><?= fh_icon('arrow-out', 16) ?></span>
        </a>

        <a class="crow lg lg--elastic rv" style="--rv-d:70ms" href="tel:<?= e($p['phone_href']) ?>">
          <span class="lg-hl"></span>
          <span class="lg-in icon-tile"><?= fh_icon('phone', 19) ?></span>
          <span class="lg-in">
            <span class="crow__l" data-i18n="contact.phoneLabel"><?= e($s['contact']['phoneLabel']) ?></span>
            <span class="crow__v"><?= e($p['phone']) ?></span>
          </span>
          <span class="lg-in crow__go"><?= fh_icon('arrow-out', 16) ?></span>
        </a>

        <div class="crow lg rv" style="--rv-d:140ms">
          <span class="lg-in icon-tile"><?= fh_icon('clock', 19) ?></span>
          <span class="lg-in">
            <span class="crow__l" data-i18n="contact.timeLabel"><?= e($s['contact']['timeLabel']) ?></span>
            <span class="crow__v" id="clock">—</span>
          </span>
          <span></span>
        </div>

        <div class="socials rv" style="--rv-d:200ms">
          <a class="lg lg-btn lg-btn--sm lg--elastic" href="<?= e($p['linkedin']) ?>" target="_blank" rel="noopener">
            <span class="lg-hl"></span><?= fh_icon('linkedin', 15) ?><span>LinkedIn</span>
          </a>
          <a class="lg lg-btn lg-btn--sm lg--elastic" href="<?= e($p['github']) ?>" target="_blank" rel="noopener">
            <span class="lg-hl"></span><?= fh_icon('github', 15) ?><span>GitHub</span>
          </a>
        </div>
      </div>

      <form class="form lg lg-panel rv" style="--rv-d:80ms" id="contactForm" action="api/contact.php" method="post">
        <span class="lg-refract"></span>
        <div class="lg-in" style="display:grid;gap:.85rem">
          <div class="field">
            <label for="cname" data-i18n="contact.name"><?= e($s['contact']['name']) ?></label>
            <input id="cname" name="name" type="text" required maxlength="120" autocomplete="name">
          </div>
          <div class="field">
            <label for="cmail" data-i18n="contact.email"><?= e($s['contact']['email']) ?></label>
            <input id="cmail" name="email" type="email" required maxlength="160" autocomplete="email">
          </div>
          <div class="field">
            <label for="cmsg" data-i18n="contact.msg"><?= e($s['contact']['msg']) ?></label>
            <textarea id="cmsg" name="message" required maxlength="4000"></textarea>
          </div>

          <label class="honey" for="website">Website</label>
          <input class="honey" id="website" name="website" type="text" tabindex="-1" autocomplete="off">

          <button class="lg lg-btn lg-btn--accent lg--elastic" id="formSubmit" type="submit" data-elastic="0.16">
            <span class="lg-hl"></span>
            <span id="formSubmitLabel" data-i18n="contact.send"><?= e($s['contact']['send']) ?></span>
            <?= fh_icon('send', 16) ?>
          </button>
          <p class="form__note" id="formNote" role="status" aria-live="polite"></p>
        </div>
      </form>
    </div>
  </div>
</section>

</main>

<footer class="foot">
  <div class="shell foot__grid">
    <p class="foot__text">
      <strong>&copy; <?= date('Y') ?> <?= e($p['name']) ?>.</strong>
      <span data-i18n="footer.rights"><?= e($s['footer']['rights']) ?></span><br>
      <span data-i18n="footer.built"><?= e($s['footer']['built']) ?></span>
    </p>
    <a class="lg lg-btn lg-btn--sm lg--elastic" href="#top">
      <span class="lg-hl"></span>
      <span data-i18n="footer.top"><?= e($s['footer']['top']) ?></span>
      <?= fh_icon('arrow-down', 15, 'ico ico--up') ?>
    </a>
  </div>
</footer>

<!-- =============================================== credential lightbox -->
<div class="cmodal" id="certModal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="cmName">
  <button class="cmodal__scrim" id="cmScrim" type="button" tabindex="-1" aria-label="<?= e($s['certs']['close']) ?>"></button>
  <div class="cmodal__panel lg lg-panel lg--deep">
    <span class="lg-refract"></span>
    <button class="cmodal__close lg lg-btn lg-btn--icon lg--elastic" id="cmClose" type="button"
            aria-label="<?= e($s['certs']['close']) ?>" data-i18n-attr="aria-label:certs.close">
      <span class="lg-hl"></span><?= fh_icon('close', 18) ?>
    </button>
    <div class="lg-in cmodal__grid">
      <div class="cmodal__art" id="cmArt"></div>
      <div class="cmodal__side">
        <div class="cmodal__brand" id="cmBrand" hidden>
          <img id="cmLogo" src="" alt="" width="44" height="44">
        </div>
        <h3 class="cmodal__name" id="cmName"></h3>
        <p class="cmodal__issuer" id="cmIssuer"></p>
        <dl class="cmodal__rows" id="cmRows"></dl>
        <div class="cmodal__skills" id="cmSkills">
          <h4 data-i18n="certs.skills"><?= e($s['certs']['skills']) ?></h4>
          <div class="chips" id="cmChips"></div>
        </div>
        <a class="lg lg-btn lg-btn--accent lg--elastic" id="cmVerify" href="#" target="_blank" rel="noopener">
          <span class="lg-hl"></span>
          <span id="cmVerifyLabel"><?= e($s['certs']['verify']) ?></span>
          <?= fh_icon('arrow-out', 16) ?>
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  window.FH_I18N = <?= json_encode(FH_STRINGS, $jsonFlags) ?>;
  window.FH_DATA = {
    locales: <?= json_encode(FH_LOCALES, $jsonFlags) ?>,
    certs: <?= json_encode($certsJs, $jsonFlags) ?>
  };
</script>
<script src="assets/js/scroll.js?v=<?= e($assetV) ?>"></script>
<script src="assets/js/main.js?v=<?= e($assetV) ?>"></script>
</body>
</html>
