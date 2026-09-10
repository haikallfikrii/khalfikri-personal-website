# Fikri Haikal — Horizon Glass Portfolio

Personal portfolio for **Muhamad Fikri Haikal** — Full-Stack Developer & AI Automation Engineer.

Built with plain **HTML · CSS · JavaScript · PHP**.

## Live sites

| Host | Repo | Notes |
|------|------|--------|
| https://haikal.chatlm.tech/ | [khalfikri-personal-website](https://github.com/haikallfikrii/khalfikri-personal-website) | Hostinger PHP (full `index.php` + `api/contact.php`) |
| https://haikallfikrii.github.io/ | [haikallfikrii.github.io](https://github.com/haikallfikrii/haikallfikrii.github.io) | GitHub Pages static export (`index.html`) |

## Features

* Dark / light mode (saved in `localStorage`)
* Languages: English, Bahasa Indonesia, 日本語, العربية (RTL), Deutsch
* Liquid glass panels, scroll cinema, pinned project rail
* Contact form: PHP mail + FormSubmit on Hostinger; FormSubmit AJAX on GitHub Pages

## Run locally (PHP)

```bash
cd ~/Desktop/fikri-portfolio
php -S localhost:8080
```

## Build GitHub Pages static export

```bash
php scripts/build-pages.php > /tmp/index.html
# then copy assets/ + index.html into the github.io repo root
```

## Links

* LinkedIn: https://www.linkedin.com/in/muhamad-fikri-haikal-fullstack-web-developer/
* GitHub: https://github.com/haikallfikrii
* SaaS: https://tabletap.my · https://chatlm.tech
