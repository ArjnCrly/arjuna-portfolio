<?php
/**
 * Laravel Local Development Server Router
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$publicFile = __DIR__ . '/public' . $uri;

if ($uri !== '/' && file_exists($publicFile) && !is_dir($publicFile)) {
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $pubRoot = realpath(__DIR__ . '/public');
    if ($docRoot && $pubRoot && $docRoot === $pubRoot) {
        return false;
    }

    $ext = strtolower(pathinfo($publicFile, PATHINFO_EXTENSION));
    $mimeTypes = [
        'css'   => 'text/css; charset=utf-8',
        'js'    => 'application/javascript; charset=utf-8',
        'mjs'   => 'application/javascript; charset=utf-8',
        'json'  => 'application/json; charset=utf-8',
        'svg'   => 'image/svg+xml',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'webp'  => 'image/webp',
        'ico'   => 'image/x-icon',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
        'otf'   => 'font/otf',
        'pdf'   => 'application/pdf',
        'txt'   => 'text/plain; charset=utf-8',
        'html'  => 'text/html; charset=utf-8',
    ];
    $contentType = $mimeTypes[$ext] ?? (function_exists('mime_content_type') ? mime_content_type($publicFile) : 'application/octet-stream');
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($publicFile));
    readfile($publicFile);
    exit;
}

require_once __DIR__ . '/public/index.php';
