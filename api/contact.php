<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
  exit;
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$honeypot = trim((string)($_POST['website'] ?? ''));

if ($honeypot !== '') {
  echo json_encode(['ok' => true]);
  exit;
}

if ($name === '' || $email === '' || $message === '') {
  http_response_code(422);
  echo json_encode(['ok' => false, 'message' => 'Missing fields']);
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'message' => 'Invalid email']);
  exit;
}

$to = 'muhamadfikrih29@gmail.com';
$subject = 'Portfolio contact from ' . $name;
$body = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n";
$headers = [
  'From: portfolio@localhost',
  'Reply-To: ' . $email,
  'Content-Type: text/plain; charset=UTF-8',
];

$sent = @mail($to, $subject, $body, implode("\r\n", $headers));

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
@file_put_contents($logDir . '/contacts.log', $logLine, FILE_APPEND | LOCK_EX);

echo json_encode(['ok' => true, 'mailed' => (bool)$sent]);
