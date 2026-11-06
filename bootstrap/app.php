<?php
/**
 * Laravel Application Bootstrapper & HTTP Kernel Dispatcher
 */

require_once __DIR__ . '/../vendor/autoload.php';

class Application {
    public function handleHttpRequest(): void {
        if (session_status() === PHP_SESSION_NONE && !headers_sent() && php_sapi_name() !== 'cli') {
            $sessPath = LARAVEL_BASE_PATH . '/storage/framework/sessions';
            if (!is_dir($sessPath)) {
                @mkdir($sessPath, 0777, true);
            }
            if (is_dir($sessPath)) {
                @session_save_path($sessPath);
            }
            @session_start();
        }

        $this->ensureDatabaseMigrated();

        require_once LARAVEL_BASE_PATH . '/routes/web.php';

        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($requestMethod === 'POST' && !empty($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        } elseif (!empty($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            $requestMethod = strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }

        $requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $requestUri = '/' . trim($requestUri, '/');
        if ($requestUri !== '/') {
            $requestUri = rtrim($requestUri, '/');
        }

        $staticFile = LARAVEL_BASE_PATH . '/public' . $requestUri;
        if ($requestUri !== '/' && file_exists($staticFile) && !is_dir($staticFile)) {
            $ext = strtolower(pathinfo($staticFile, PATHINFO_EXTENSION));
            if ($ext !== 'php') {
                $mimeTypes = [
                    'css'   => 'text/css; charset=utf-8',
                    'js'    => 'application/javascript; charset=utf-8',
                    'json'  => 'application/json; charset=utf-8',
                    'svg'   => 'image/svg+xml',
                    'png'   => 'image/png',
                    'jpg'   => 'image/jpeg',
                    'jpeg'  => 'image/jpeg',
                    'gif'   => 'image/gif',
                    'webp'  => 'image/webp',
                    'ico'   => 'image/x-icon',
                ];
                header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
                header('Content-Length: ' . filesize($staticFile));
                readfile($staticFile);
                return;
            }
        }

        $request = new \Illuminate\Http\Request();

        foreach (\Illuminate\Support\Facades\Route::$routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $route['uri']);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $requestUri, $matches)) {
                if (in_array('admin.auth', $route['middleware'], true)) {
                    if (empty($_SESSION['admin_logged_in'])) {
                        header('Location: /admin/login');
                        exit;
                    }
                }

                $params = [];
                foreach ($matches as $k => $v) {
                    if (!is_int($k)) {
                        $params[] = $v;
                    }
                }

                $action = $route['action'];
                if (is_array($action)) {
                    list($controllerClass, $method) = $action;
                    $controller = new $controllerClass();
                    $ref = new \ReflectionMethod($controller, $method);
                    $callArgs = [];
                    foreach ($ref->getParameters() as $param) {
                        $type = $param->getType();
                        if ($type && $type->getName() === \Illuminate\Http\Request::class) {
                            $callArgs[] = $request;
                        } else {
                            $callArgs[] = array_shift($params);
                        }
                    }
                    $response = call_user_func_array([$controller, $method], $callArgs);
                } elseif (is_callable($action)) {
                    $response = call_user_func_array($action, array_merge([$request], $params));
                }

                if ($response instanceof \Illuminate\Http\RedirectResponse) {
                    $response->send();
                } elseif (is_array($response)) {
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($response);
                } elseif (is_string($response)) {
                    echo $response;
                }
                return;
            }
        }

        http_response_code(404);
        echo "<!DOCTYPE html><html lang='id'><head><meta charset='UTF-8'><title>404 — Halaman Tidak Ditemukan</title><style>body{background:#090b10;color:#e2e8f0;font-family:'Inter',system-ui,sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}.box{border:1px solid #1e293b;background:#0f141c;padding:2.5rem 3rem;border-radius:14px;max-width:460px;}code{color:#10b981;font-family:monospace;font-size:0.9rem;}a{color:#10b981;text-decoration:none;font-weight:600;margin:0 0.5rem;}a:hover{text-decoration:underline;}</style></head><body><div class='box'><code>[ error 404 : route_not_found ]</code><h1 style='margin:0.8rem 0;font-size:1.6rem;'>Halaman Tidak Ditemukan</h1><p style='color:#94a3b8;font-size:0.95rem;margin-bottom:1.5rem;'>Halaman yang Anda tuju tidak tersedia atau telah dipindahkan.</p><div><a href='/'>← Beranda Portofolio</a> • <a href='/projects'>Semua Projek</a> • <a href='/admin'>Admin CMS</a></div></div></body></html>";
    }

    public function ensureDatabaseMigrated(): void {
        if (!\Illuminate\Support\Facades\Schema::hasTable('profile_settings')) {
            $this->runMigrations();
            $this->runSeeders();
        }
    }

    public function runMigrations(bool $fresh = false): void {
        if ($fresh) {
            $tables = ['profile_settings', 'experiences', 'educations', 'projects', 'skills', 'contact_messages'];
            foreach ($tables as $t) {
                \Illuminate\Support\Facades\Schema::dropIfExists($t);
            }
        }
        $migrationFiles = glob(LARAVEL_BASE_PATH . '/database/migrations/*.php');
        sort($migrationFiles);
        foreach ($migrationFiles as $file) {
            $migration = require $file;
            if (is_object($migration) && method_exists($migration, 'up')) {
                $migration->up();
            }
        }
    }

    public function runSeeders(): void {
        $seederFile = LARAVEL_BASE_PATH . '/database/seeders/DatabaseSeeder.php';
        if (file_exists($seederFile)) {
            require_once $seederFile;
            $seeder = new \Database\Seeders\DatabaseSeeder();
            $seeder->run();
        }
    }
}

return new Application();
