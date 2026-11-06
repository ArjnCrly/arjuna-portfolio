<?php
/**
 * Laravel Public Front Controller
 */

define('LARAVEL_START', microtime(true));

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->handleHttpRequest();
