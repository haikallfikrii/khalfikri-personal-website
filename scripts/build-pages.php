#!/usr/bin/env php
<?php
declare(strict_types=1);

/**
 * Render the PHP portfolio to a static index.html for GitHub Pages.
 * Usage: php scripts/build-pages.php > /path/to/index.html
 */

$_GET = [];
$_COOKIE = [];
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['HTTP_HOST'] = 'haikallfikrii.github.io';
$_SERVER['SERVER_NAME'] = 'haikallfikrii.github.io';
$_SERVER['REQUEST_URI'] = '/';
$_SERVER['HTTPS'] = 'on';

ob_start();
require dirname(__DIR__) . '/index.php';
$html = ob_get_clean();

// Prefer index.html on Pages; drop PHP-only action hints that confuse static hosting.
$html = str_replace(
  'action="api/contact.php"',
  'action="https://formsubmit.co/ajax/muhamadfikrih29@gmail.com" data-static-form="1"',
  $html
);

echo $html;
