<?php
declare(strict_types=1);

/**
 * Language-neutral data: contact, tech marquee, certifications.
 * Certification names and issuers are proper nouns, so they stay untranslated.
 */

const FH_PROFILE = [
  'name'       => 'Muhamad Fikri Haikal',
  'short'      => 'Fikri Haikal',
  'email'      => 'muhamadfikrih29@gmail.com',
  'phone'      => '+60 11-2535-2270',
  'phone_href' => '+601125352270',
  'linkedin'   => 'https://www.linkedin.com/in/muhamad-fikri-haikal-fullstack-web-developer/',
  'github'     => 'https://github.com/haikallfikrii',
  'tabletap'   => 'https://tabletap.my',
  'chatlm'     => 'https://chatlm.tech',
  'photo'      => 'assets/img/photo.png',
];

const FH_MARQUEE = [
  'JavaScript', 'TypeScript', 'PHP 8', 'Python', 'React', 'Next.js', 'Node.js', 'Laravel',
  'WordPress', 'Shopify', 'Webflow', 'n8n', 'Make.com', 'Zapier', 'LangChain', 'RAG',
  'OpenAI', 'Claude', 'AWS', 'Google Cloud', 'Azure', 'Supabase', 'MySQL', 'PostgreSQL',
  'MongoDB', 'GraphQL', 'Stripe', 'Tailwind CSS',
];

/**
 * Structural career data. Translatable text (role, employment type, bullets)
 * lives in includes/i18n.php keyed by the same slug.
 */
const FH_JOBS = [
  [
    'slug' => 'growmodo',
    'company' => 'Growmodo GmbH',
    'city' => 'Leverkusen, Germany',
    'from' => 'Nov 2025',
    'to' => null,
    'year' => '2025',
    'icon' => 'sparkle',
    'stack' => ['Next.js', 'PHP', 'WordPress', 'Shopify', 'Webflow', 'n8n', 'AWS'],
  ],
  [
    'slug' => 'gedex',
    'company' => 'Gedex Network Inc.',
    'city' => 'Carson City, USA',
    'from' => 'Jan 2025',
    'to' => null,
    'year' => '2025',
    'icon' => 'workflow',
    'stack' => ['PHP', 'WordPress', 'MySQL', 'n8n', 'Make.com', 'OpenAI'],
  ],
  [
    'slug' => 'aigents',
    'company' => 'AIgents Solutions',
    'city' => 'Malaysia',
    'from' => 'Apr 2025',
    'to' => null,
    'year' => '2025',
    'icon' => 'circuit',
    'stack' => ['n8n', 'Zapier', 'Make.com', 'OpenAI', 'Supabase', 'AWS'],
  ],
  [
    'slug' => 'jomsite',
    'company' => 'JomSite Digital Services',
    'city' => 'Perlis, Malaysia',
    'from' => 'Feb 2024',
    'to' => null,
    'year' => '2024',
    'icon' => 'cloud',
    'stack' => ['React', 'Node.js', 'PHP', 'WordPress', 'MongoDB', 'AWS'],
  ],
  [
    'slug' => 'upwork',
    'company' => 'Upwork',
    'city' => 'Remote',
    'from' => 'Sep 2024',
    'to' => null,
    'year' => '2024',
    'icon' => 'globe',
    'stack' => ['Full-Stack', 'Automation', 'Client Delivery'],
  ],
];

/** Project names are proper nouns; only descriptions get translated. */
const FH_PROJECTS = [
  ['slug' => 'tabletap', 'name' => 'TableTap SaaS', 'link' => 'https://tabletap.my', 'icon' => 'restaurant', 'tags' => ['Multi-tenant', 'PHP 8', 'MySQL', 'Stripe']],
  ['slug' => 'chatlm', 'name' => 'ChatLM Widget', 'link' => 'https://chatlm.tech', 'icon' => 'chat', 'tags' => ['Shadow DOM', 'OpenRouter', 'Stripe', 'BYOK']],
  ['slug' => 'agentic', 'name' => 'Agentic Content Publishing', 'link' => null, 'icon' => 'workflow', 'tags' => ['n8n', 'DeepSeek', 'WP REST', 'VPS']],
  ['slug' => 'caast', 'name' => 'CAAST Education LMS', 'link' => null, 'icon' => 'book', 'tags' => ['Tutor LMS', 'Custom plugin', 'REST API']],
  ['slug' => 'clinic', 'name' => 'AI Clinic Appointment Bot', 'link' => null, 'icon' => 'heartbeat', 'tags' => ['WAHA', 'GPT-4o', 'Calendar API', 'PDPA']],
  ['slug' => 'dashboard', 'name' => 'Role-Based Company Dashboard', 'link' => null, 'icon' => 'dashboard', 'tags' => ['ACF', 'PDF', 'WhatsApp API', 'CDN']],
];

/** Tech names are neutral; only the group label gets translated. */
const FH_SKILL_GROUPS = [
  ['slug' => 'frontend', 'icon' => 'code', 'items' => ['JavaScript', 'TypeScript', 'PHP 8', 'Python', 'HTML5', 'CSS3', 'React.js', 'Next.js', 'Tailwind CSS', 'Bootstrap']],
  ['slug' => 'backend', 'icon' => 'database', 'items' => ['Node.js', 'Express.js', 'Laravel', 'REST API', 'GraphQL', 'MySQL', 'PostgreSQL', 'MongoDB', 'Redis']],
  ['slug' => 'cms', 'icon' => 'storefront', 'items' => ['WordPress', 'Shopify (Liquid)', 'Webflow', 'WooCommerce', 'ACF', 'Elementor', 'Tutor LMS']],
  ['slug' => 'ai', 'icon' => 'circuit', 'items' => ['n8n', 'Make.com', 'Zapier', 'OpenAI API', 'Claude API', 'LangChain', 'RAG', 'Apps Script']],
  ['slug' => 'cloud', 'icon' => 'cloud', 'items' => ['AWS (EC2, S3, RDS, Lambda)', 'Google Cloud', 'Microsoft Azure', 'Supabase', 'Docker', 'CI/CD', 'Git']],
  ['slug' => 'tools', 'icon' => 'tools', 'items' => ['Stripe', 'GoHighLevel', 'HubSpot', 'Figma', 'Notion', 'Slack', 'Jira', 'Loom']],
];

/** Brand accents used for generated credential artwork. */
const FH_ISSUER_BRAND = [
  'Anthropic'                  => ['#d97757', 'AN'],
  'Google Cloud Skills Boost'  => ['#4285f4', 'GC'],
  'Google'                     => ['#34a853', 'GO'],
  'Make'                       => ['#6d00cc', 'MK'],
  'Amazon Web Services (AWS)'  => ['#ff9900', 'AW'],
  'Microsoft'                  => ['#00a4ef', 'MS'],
  'Orbit Future Academy'       => ['#f26522', 'OF'],
  'Harisenin.com'              => ['#2563eb', 'HS'],
  'freeCodeCamp'               => ['#5f78ff', 'FC'],
  'Cambridge English'          => ['#a6192e', 'CE'],
  'Lisanul Arab'               => ['#0f766e', 'LA'],
  'Simplilearn'                => ['#f58220', 'SL'],
  'Cyber Academy Indonesia'    => ['#1d4ed8', 'CA'],
  'Kelas.com'                  => ['#ff5a5f', 'KL'],
  'Habiskerja.com'             => ['#059669', 'HK'],
];

/**
 * Full credential list mirrored from LinkedIn "Licenses & certifications".
 * group: cloud | ai | web | security | language
 */
const FH_CERTS = [
  [
    'slug' => 'claude-code-101',
    'name' => 'Certificate of Completion: Claude Code 101',
    'issuer' => 'Anthropic',
    'issued' => 'Aug 2026',
    'credential' => 'dqjtmu5gbzwn',
    'verify' => 'https://verify.skilljar.com/c/dqjtmu5gbzwn',
    'group' => 'ai',
    'skills' => ['AI-assisted development', 'Prompt engineering', 'Claude Code'],
  ],
  [
    'slug' => 'gcp-mlops-genai',
    'name' => 'Machine Learning Operations (MLOps) for Generative AI',
    'issuer' => 'Google Cloud Skills Boost',
    'issued' => 'Oct 2025',
    'credential' => '18854828',
    'verify' => 'https://www.cloudskillsboost.google/public_profiles/01b20a7d-63c5-4952-aa71-42b44e7084e6/badges/18854828',
    'group' => 'ai',
    'skills' => ['MLOps', 'Vertex AI', 'Generative AI'],
  ],
  [
    'slug' => 'make-advanced',
    'name' => 'Make Advanced',
    'issuer' => 'Make',
    'issued' => 'Sep 2025',
    'credential' => null,
    'verify' => 'https://www.credly.com/badges/88291e3b-aaa9-4202-9481-0aa8fb52545b/linked_in_profile',
    'group' => 'ai',
    'skills' => ['JSON', 'Scenario design', 'Error handling', 'Webhooks'],
  ],
  [
    'slug' => 'make-intermediate',
    'name' => 'Make Intermediate',
    'issuer' => 'Make',
    'issued' => 'Sep 2025',
    'credential' => null,
    'verify' => 'https://www.credly.com/badges/1155e679-81aa-4877-80d8-42d2351db90c/linked_in_profile',
    'group' => 'ai',
    'skills' => ['JSON', 'Data mapping', 'Iterators'],
  ],
  [
    'slug' => 'make-foundation',
    'name' => 'Make Foundation',
    'issuer' => 'Make',
    'issued' => 'Sep 2025',
    'credential' => null,
    'verify' => 'https://www.credly.com/badges/aef65e0e-0250-42b1-b794-d2d237f1e65b/linked_in_profile',
    'group' => 'ai',
    'skills' => ['Zapier', 'n8n', 'Automation basics'],
  ],
  [
    'slug' => 'skills-boost-w2',
    'name' => 'Skills Boost Arcade Trivia September 2025 Week 2',
    'issuer' => 'Google',
    'issued' => 'Sep 2025',
    'credential' => '18076790',
    'verify' => 'https://www.cloudskillsboost.google/public_profiles/01b20a7d-63c5-4952-aa71-42b44e7084e6/badges/18076790',
    'group' => 'cloud',
    'skills' => ['Google Cloud', 'Hands-on labs'],
  ],
  [
    'slug' => 'skills-boost-w1',
    'name' => 'Skills Boost Arcade Trivia September 2025 Week 1',
    'issuer' => 'Google',
    'issued' => 'Sep 2025',
    'credential' => '18073756',
    'verify' => 'https://www.cloudskillsboost.google/public_profiles/01b20a7d-63c5-4952-aa71-42b44e7084e6/badges/18073756',
    'group' => 'cloud',
    'skills' => ['Google Cloud', 'Hands-on labs'],
  ],
  [
    'slug' => 'aws-restart-graduate',
    'name' => 'AWS re/Start Graduate',
    'issuer' => 'Amazon Web Services (AWS)',
    'issued' => 'Nov 2024',
    'credential' => null,
    'verify' => 'https://www.credly.com/badges/823f2b66-afb9-443d-84d3-d6b7e169739f/linked_in_profile',
    'group' => 'cloud',
    'skills' => ['Amazon S3', 'EC2', 'IAM', 'Linux', 'Cloud networking'],
  ],
  [
    'slug' => 'aws-cloud-practitioner',
    'name' => 'AWS Cloud Practitioner',
    'issuer' => 'Orbit Future Academy',
    'issued' => 'Sep 2024',
    'credential' => 'OFA/2024-09/AWS/AWSREST/16340',
    'verify' => 'https://erp.orbitfutureacademy.com/pub/certificate/verification/ORBITFA66fa6c2e4e02e',
    'group' => 'cloud',
    'skills' => ['Amazon RDS', 'AWS Lambda', 'CloudFormation', 'AWS CLI'],
  ],
  [
    'slug' => 'azure-doc-intelligence',
    'name' => 'Develop Solutions with Azure AI Document Intelligence',
    'issuer' => 'Microsoft',
    'issued' => 'Feb 2025',
    'credential' => null,
    'verify' => 'https://learn.microsoft.com/api/achievements/share/en-us/MuhamadFikriHaikal-3687/879NSG2W?sharingId=25B381486069D495',
    'group' => 'ai',
    'skills' => ['Document Intelligence', 'Artificial Intelligence'],
  ],
  [
    'slug' => 'azure-semantic-kernel',
    'name' => 'Develop AI Agents using Azure OpenAI and the Semantic Kernel SDK',
    'issuer' => 'Microsoft',
    'issued' => 'Feb 2025',
    'credential' => null,
    'verify' => 'https://learn.microsoft.com/api/achievements/share/en-us/MuhamadFikriHaikal-3687/ES2479QP?sharingId=25B381486069D495',
    'group' => 'ai',
    'skills' => ['Azure OpenAI', 'Semantic Kernel', 'AI agents'],
  ],
  [
    'slug' => 'azure-ai-services',
    'name' => 'Get Started with Azure AI Services',
    'issuer' => 'Microsoft',
    'issued' => 'Feb 2025',
    'credential' => null,
    'verify' => 'https://learn.microsoft.com/api/achievements/share/en-us/MuhamadFikriHaikal-3687/HA9XMHQ8?sharingId=25B381486069D495',
    'group' => 'ai',
    'skills' => ['Azure AI Services', 'Cognitive Services'],
  ],
  [
    'slug' => 'azure-cloud-concepts',
    'name' => 'Microsoft Azure Cloud Concepts',
    'issuer' => 'Microsoft',
    'issued' => 'Feb 2025',
    'credential' => null,
    'verify' => 'https://learn.microsoft.com/api/achievements/share/en-us/MuhamadFikriHaikal-3687/UYLGETF3?sharingId=25B381486069D495',
    'group' => 'cloud',
    'skills' => ['Cloud architecture', 'Cloud computing'],
  ],
  [
    'slug' => 'azure-ai-fundamentals',
    'name' => 'Microsoft Azure AI Fundamentals',
    'issuer' => 'Microsoft',
    'issued' => 'Feb 2025',
    'credential' => null,
    'verify' => 'https://learn.microsoft.com/api/achievements/share/en-us/MuhamadFikriHaikal-3687/UYTTA7L3?sharingId=25B381486069D495',
    'group' => 'ai',
    'skills' => ['Microsoft Azure', 'Azure AI', 'Machine learning'],
  ],
  [
    'slug' => 'ms-security-compliance-identity',
    'name' => 'Microsoft Security, Compliance, and Identity Fundamentals',
    'issuer' => 'Microsoft',
    'issued' => 'Jan 2024',
    'expires' => 'Jan 2028',
    'credential' => '70882_77',
    'verify' => 'https://drive.google.com/file/d/1KNQ7yN_0F9rtzYAQ-LYzovx6K-11yxer/view',
    'group' => 'security',
    'skills' => ['Identity fundamentals', 'Compliance', 'Zero trust'],
  ],
  [
    'slug' => 'harisenin-fullstack',
    'name' => 'Fullstack Web Development',
    'issuer' => 'Harisenin.com',
    'issued' => 'Jul 2024',
    'credential' => 'HSBC/FSD/01/20240728052',
    'verify' => 'https://drive.google.com/file/d/1zb7eL4CoIIHfSC6npPI1w8jmvCn1YtV6/view',
    'group' => 'web',
    'skills' => ['React.js', 'Node.js', 'Database design', 'JSON'],
  ],
  [
    'slug' => 'fcc-responsive-web',
    'name' => 'Responsive Web Design',
    'issuer' => 'freeCodeCamp',
    'issued' => 'Mar 2024',
    'credential' => null,
    'verify' => 'https://www.freecodecamp.org/certification/Fikri_Haikal/responsive-web-design',
    'group' => 'web',
    'skills' => ['HTML5', 'CSS3', 'Flexbox', 'Grid', 'Accessibility'],
  ],
  [
    'slug' => 'simplilearn-php',
    'name' => 'PHP Programming',
    'issuer' => 'Simplilearn',
    'issued' => 'Jun 2024',
    'credential' => '6755604',
    'verify' => 'https://drive.google.com/file/d/1as791MLbekFMp6fm5I0GPGkFCwUeefH3/view',
    'group' => 'web',
    'skills' => ['PHP', 'phpMyAdmin', 'MySQL'],
  ],
  [
    'slug' => 'kelas-uiux-figma',
    'name' => 'Certification of UI/UX Design by Figma',
    'issuer' => 'Kelas.com',
    'issued' => 'Sep 2023',
    'expires' => 'Sep 2027',
    'credential' => 'CERT-2FCF372C',
    'verify' => 'https://kelas.com/certificates/prakerja/Nzk5ODUz/NjA=',
    'group' => 'web',
    'skills' => ['Web design', 'Figma', 'Design systems'],
  ],
  [
    'slug' => 'kelas-backend-node',
    'name' => 'Back-End Development with JavaScript and Node.js',
    'issuer' => 'Kelas.com',
    'issued' => 'Sep 2023',
    'expires' => 'Sep 2027',
    'credential' => 'CERT-196AF385',
    'verify' => 'https://kelas.com/certificates/prakerja/Nzk5ODUz/NzE=',
    'group' => 'web',
    'skills' => ['Node.js', 'Express.js', 'REST API', 'Database design'],
  ],
  [
    'slug' => 'habiskerja-wordpress',
    'name' => 'WordPress Developer Certificate',
    'issuer' => 'Habiskerja.com',
    'issued' => 'Feb 2024',
    'expires' => 'Feb 2027',
    'credential' => '010024/HK/22',
    'verify' => 'https://drive.google.com/file/d/1iA58uFVr4g1aP_w3orpW3Xr9wqwXWMQF/view',
    'group' => 'web',
    'skills' => ['WordPress', 'Learning Management Systems', 'Hosting'],
  ],
  [
    'slug' => 'cyber-academy-infosec',
    'name' => 'Introduction to Information Security',
    'issuer' => 'Cyber Academy Indonesia',
    'issued' => 'Jan 2024',
    'expires' => 'Jan 2028',
    'credential' => 'PKMI01101240118',
    'verify' => 'https://drive.google.com/file/d/12FCWrWySuUtxDJ_jX-uy8lcJk9uO4O1_/view',
    'group' => 'security',
    'skills' => ['CIA triad', 'Threat modelling', 'Database design'],
  ],
  [
    'slug' => 'cambridge-advanced',
    'name' => 'Cambridge English Advanced (CAE)',
    'issuer' => 'Cambridge English',
    'issued' => 'Jan 2024',
    'expires' => 'Jan 2035',
    'credential' => 'MY959_MSTFIKRI_HAIKAL',
    'verify' => null,
    'group' => 'language',
    'skills' => ['English C1', 'Professional writing'],
  ],
  [
    'slug' => 'toafl-arabic',
    'name' => 'Test of Arabic as a Foreign Language (TOAFL)',
    'issuer' => 'Lisanul Arab',
    'issued' => 'Aug 2022',
    'expires' => 'Aug 2024',
    'credential' => 'K5669305',
    'verify' => 'https://drive.google.com/file/d/1i_TLAdhR3k1q5B8OmBp-Bir89ENlBZwO/view',
    'group' => 'language',
    'skills' => ['Arabic', 'Arabic language skill'],
  ],
];

/**
 * Returns a local preview image path when the user has dropped a real scan into
 * assets/certs/, otherwise null so we fall back to generated artwork.
 */
function fh_cert_image(string $slug): ?string
{
  foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
    $rel = "assets/certs/{$slug}.{$ext}";
    if (is_file(__DIR__ . '/../' . $rel)) {
      return $rel;
    }
  }
  return null;
}

/** Generated credential artwork: brand-tinted, no stock imagery, no emoji. */
function fh_cert_artwork(array $cert): string
{
  [$color, $mono] = FH_ISSUER_BRAND[$cert['issuer']] ?? ['#8899a6', 'CT'];
  $seed = crc32($cert['slug']);
  $angle = $seed % 60 + 15;
  $title = htmlspecialchars(mb_strimwidth($cert['name'], 0, 46, '…'), ENT_QUOTES);
  $issuer = htmlspecialchars(mb_strimwidth($cert['issuer'], 0, 30, '…'), ENT_QUOTES);
  $id = 'cw' . $seed;

  return <<<SVG
<svg class="cert-art" viewBox="0 0 320 200" preserveAspectRatio="xMidYMid slice" role="img" aria-label="{$title}">
  <defs>
    <linearGradient id="{$id}g" gradientTransform="rotate({$angle} .5 .5)">
      <stop offset="0" stop-color="{$color}" stop-opacity=".85"/>
      <stop offset="1" stop-color="{$color}" stop-opacity=".22"/>
    </linearGradient>
    <radialGradient id="{$id}r" cx="18%" cy="14%" r="78%">
      <stop offset="0" stop-color="#fff" stop-opacity=".45"/>
      <stop offset="1" stop-color="#fff" stop-opacity="0"/>
    </radialGradient>
  </defs>
  <rect width="320" height="200" fill="url(#{$id}g)"/>
  <rect width="320" height="200" fill="url(#{$id}r)"/>
  <g fill="none" stroke="#fff" stroke-opacity=".22" stroke-width="1">
    <circle cx="272" cy="42" r="54"/><circle cx="272" cy="42" r="34"/><circle cx="40" cy="172" r="46"/>
  </g>
  <text x="24" y="52" font-family="Space Grotesk, Inter, sans-serif" font-size="26" font-weight="700" fill="#fff" fill-opacity=".92">{$mono}</text>
  <text x="24" y="126" font-family="Inter, sans-serif" font-size="14" font-weight="600" fill="#fff" fill-opacity=".95">{$title}</text>
  <text x="24" y="150" font-family="Inter, sans-serif" font-size="11" font-weight="500" fill="#fff" fill-opacity=".7">{$issuer}</text>
</svg>
SVG;
}
