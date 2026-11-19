<?php

if (!is_dir('/tmp/storage/framework/sessions')) {
    mkdir('/tmp/storage/framework/sessions', 0755, true);
}
if (!is_dir('/tmp/database')) {
    mkdir('/tmp/database', 0755, true);
}

$sourceDb = dirname(__DIR__) . '/database/database.sqlite';
$tmpDb    = '/tmp/database/database.sqlite';
if (!file_exists($tmpDb)) {
    if (file_exists($sourceDb)) {
        copy($sourceDb, $tmpDb);
    } else {
        touch($tmpDb);
    }
}


chdir(dirname(__DIR__) . '/public');
require dirname(__DIR__) . '/public/index.php';