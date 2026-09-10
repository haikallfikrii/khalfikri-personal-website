# Fikri Haikal — Horizon Glass Portfolio

Personal portfolio for **Muhamad Fikri Haikal** — Full-Stack Developer & AI Automation Engineer.

Built with plain **HTML · CSS · JavaScript · PHP**. Visual direction: coastal golden-hour light + liquid glass (not purple glassmorphism).

## Features

- Dark / light mode (saved in `localStorage`)
- Languages: English, Bahasa Indonesia, 日本語, العربية (RTL), Deutsch
- Liquid glass panels with specular rim + optional SVG refraction (Chromium)
- Interactive photo tilt, scroll reveals, floating glass nav
- Contact form via `api/contact.php` (logs to `storage/contacts.log`, tries `mail()`)

## Run locally

Needs PHP (built-in server is enough):

```bash
cd ~/Desktop/fikri-portfolio
php -S localhost:8080
```

Open [http://localhost:8080](http://localhost:8080).

Static preview without PHP form: open `index.php` through any local server that serves PHP, or rename to `.html` and skip the form endpoint.

## Folder

```
fikri-portfolio/
├── index.php
├── api/contact.php
├── assets/
│   ├── css/styles.css
│   ├── js/i18n.js
│   ├── js/main.js
│   └── img/photo.png
└── README.md
```

## Links

- LinkedIn: https://www.linkedin.com/in/muhamad-fikri-haikal-fullstack-web-developer/
- GitHub: https://github.com/haikallfikrii
- SaaS: https://tabletap.my · https://chatlm.tech
