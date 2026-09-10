<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
  exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));
$honeypot = trim((string) ($_POST['website'] ?? ''));

if ($honeypot !== '') {
  echo json_encode(['ok' => true]);
  exit;
}

if ($name === '' || $email === '' || $message === '') {
  http_response_code(422);
  echo json_encode(['ok' => false, 'message' => 'Missing fields']);
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($name) > 120 || strlen($message) > 4000) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'message' => 'Invalid input']);
  exit;
}

$to = 'muhamadfikrih29@gmail.com';
$subject = 'Portfolio contact from ' . $name;
$body = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n";
$host = preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? 'haikal.chatlm.tech'));
$host = $host !== '' ? $host : 'haikal.chatlm.tech';
$from = 'noreply@' . $host;

$logDir = dirname(__DIR__) . '/storage';
if (!is_dir($logDir)) {
  @mkdir($logDir, 0755, true);
}
$logLine = sprintf(
  "[%s] %s <%s> — %s\n",
  date('c'),
  $name,
  $email,
  preg_replace('/\s+/', ' ', $message)
);
$logged = @file_put_contents($logDir . '/contacts.log', $logLine, FILE_APPEND | LOCK_EX) !== false;

$mailed = false;
$headers = [
  'MIME-Version: 1.0',
  'Content-Type: text/plain; charset=UTF-8',
  'From: Portfolio <' . $from . '>',
  'Reply-To: ' . $name . ' <' . $email . '>',
  'X-Mailer: PHP/' . PHP_VERSION,
];
$envelope = '-f' . $from;
$mailed = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers), $envelope);

/* Hostinger and many shared hosts silently drop mail(). FormSubmit is a
   reliable secondary path once the destination inbox confirms the first ping. */
$relayed = fh_formsubmit($to, $name, $email, $message, $subject);

$ok = $mailed || $relayed;
if (!$ok) {
  http_response_code(502);
  echo json_encode([
    'ok' => false,
    'message' => 'Delivery failed',
    'logged' => $logged,
  ]);
  exit;
}

echo json_encode([
  'ok' => true,
  'mailed' => $mailed,
  'relayed' => $relayed,
  'logged' => $logged,
]);

function fh_formsubmit(string $to, string $name, string $email, string $message, string $subject): bool
{
  if (!function_exists('curl_init')) {
    return false;
  }

  $payload = http_build_query([
    'name' => $name,
    'email' => $email,
    'message' => $message,
    '_subject' => $subject,
    '_template' => 'table',
    '_captcha' => 'false',
  ]);

  $ch = curl_init('https://formsubmit.co/ajax/' . rawurlencode($to));
  if ($ch === false) {
    return false;
  }

  curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 12,
    CURLOPT_HTTPHEADER => [
      'Accept: application/json',
      'Content-Type: application/x-www-form-urlencoded',
    ],
  ]);

  $raw = curl_exec($ch);
  $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($raw === false || $status >= 400) {
    return false;
  }

  $json = json_decode($raw, true);
  if (!is_array($json)) {
    return $status >= 200 && $status < 300;
  }

  return !empty($json['success'])
    || (isset($json['success']) && $json['success'] === true)
    || (isset($json['success']) && $json['success'] === 'true');
}
