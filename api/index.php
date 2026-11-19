<?php

define('LARAVEL_BASE_PATH', dirname(__DIR__));

if (!is_dir('/tmp/storage/framework/sessions')) {
    mkdir('/tmp/storage/framework/sessions', 0755, true);
}
if (!is_dir('/tmp/database')) {
    mkdir('/tmp/database', 0755, true);
}

$sourceDb = LARAVEL_BASE_PATH . '/database/database.sqlite';
$tmpDb    = '/tmp/database/database.sqlite';
if (!file_exists($tmpDb)) {
    if (file_exists($sourceDb)) {
        copy($sourceDb, $tmpDb);
    } else {
        touch($tmpDb);
    }
}

require LARAVEL_BASE_PATH . '/public/index.php';