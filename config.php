<?php

$envPath = __DIR__ . '/.env';
$env = [];

if (file_exists($envPath)) {
    $parsed = parse_ini_file($envPath, false, INI_SCANNER_RAW);
    if (is_array($parsed)) {
        $env = $parsed;
    }
}

return [
    'db_dsn' => $env['DB_DSN'] ?? 'sqlite:database.sqlite',
    'db_user' => $env['DB_USER'] ?? '',
    'db_password' => $env['DB_PASSWORD'] ?? ''
];
