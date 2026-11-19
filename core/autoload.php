<?php
/**
 * Laravel Framework Core Autoloader & Runtime Support
 * Supports MVC, Eloquent ORM, Blade Compiler, Routing, Migrations & Seeders
 */

namespace {
    define('LARAVEL_BASE_PATH', dirname(__DIR__));

    if (session_status() === PHP_SESSION_NONE && php_sapi_name() !== 'cli') {
        $sessPath = LARAVEL_BASE_PATH . '/storage/framework/sessions';
        if (!is_dir($sessPath)) {
            @mkdir($sessPath, 0777, true);
        }
        if (is_dir($sessPath)) {
            @session_save_path($sessPath);
        }
        @session_start();
    }

    spl_autoload_register(function ($class) {
        $prefixes = [
            'App\\' => LARAVEL_BASE_PATH . '/app/',
            'Database\\Seeders\\' => LARAVEL_BASE_PATH . '/database/seeders/',
        ];
        foreach ($prefixes as $prefix => $baseDir) {
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) === 0) {
                $relativeClass = substr($class, $len);
                $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
                if (file_exists($file)) {
                    require_once $file;
                    return;
                }
            }
        }
    });

    $GLOBALS['__LARAVEL_ENV'] = [];
    $envFile = LARAVEL_BASE_PATH . '/.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($k, $v) = explode('=', $line, 2);
                $k = trim($k);
                $v = trim($v, " \t\n\r\0\x0B\"'");
                $GLOBALS['__LARAVEL_ENV'][$k] = $v;
            }
        }
    }
}

namespace Illuminate\Support\Facades {
    class DB {
        private static $pdo = null;

        public static function connection(): \PDO {
            if (self::$pdo !== null) {
                return self::$pdo;
            }
            $conn = \env('DB_CONNECTION', 'sqlite');
            if ($conn === 'mysql') {
                $host = \env('DB_HOST', '127.0.0.1');
                $port = \env('DB_PORT', '3306');
                $db   = \env('DB_DATABASE', 'arjuna_portfolio');
                $user = \env('DB_USERNAME', 'root');
                $pass = \env('DB_PASSWORD', '');
                self::$pdo = new \PDO("mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4", $user, $pass);
            } else {
                $dbPath = LARAVEL_BASE_PATH . '/' . \env('DB_DATABASE', 'database/database.sqlite');
                $dir = dirname($dbPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                if (!file_exists($dbPath)) {
                    touch($dbPath);
                }
                self::$pdo = new \PDO("sqlite:" . $dbPath);
            }
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            return self::$pdo;
        }

        public static function statement(string $sql, array $bindings = []): bool {
            $stmt = self::connection()->prepare($sql);
            return $stmt->execute($bindings);
        }

        public static function select(string $sql, array $bindings = []): array {
            $stmt = self::connection()->prepare($sql);
            $stmt->execute($bindings);
            return $stmt->fetchAll();
        }
    }

    class Schema {
        public static function create(string $table, callable $callback): void {
            $blueprint = new \Illuminate\Database\Schema\Blueprint($table);
            $callback($blueprint);
            DB::statement($blueprint->toSql());
        }

        public static function dropIfExists(string $table): void {
            DB::statement("DROP TABLE IF EXISTS {$table}");
        }

        public static function hasTable(string $table): bool {
            try {
                $res = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name=?", [$table]);
                return count($res) > 0;
            } catch (\Throwable $e) {
                return false;
            }
        }
    }

    class Route {
        public static $routes = [];
        private static $prefixStack = [];
        private static $middlewareStack = [];

        public static function get(string $uri, $action): RouteRegistrar {
            return self::addRoute('GET', $uri, $action);
        }
        public static function post(string $uri, $action): RouteRegistrar {
            return self::addRoute('POST', $uri, $action);
        }
        public static function put(string $uri, $action): RouteRegistrar {
            return self::addRoute('PUT', $uri, $action);
        }
        public static function patch(string $uri, $action): RouteRegistrar {
            return self::addRoute('PATCH', $uri, $action);
        }
        public static function delete(string $uri, $action): RouteRegistrar {
            return self::addRoute('DELETE', $uri, $action);
        }

        public static function group(array $attrs, callable $callback): void {
            if (isset($attrs['prefix'])) self::$prefixStack[] = trim($attrs['prefix'], '/');
            if (isset($attrs['middleware'])) self::$middlewareStack[] = (array)$attrs['middleware'];
            $callback();
            if (isset($attrs['prefix'])) array_pop(self::$prefixStack);
            if (isset($attrs['middleware'])) array_pop(self::$middlewareStack);
        }

        private static function addRoute(string $method, string $uri, $action): RouteRegistrar {
            $prefix = implode('/', self::$prefixStack);
            $fullUri = '/' . trim(($prefix ? $prefix . '/' : '') . trim($uri, '/'), '/');
            if ($fullUri !== '/') $fullUri = rtrim($fullUri, '/');

            $middlewares = [];
            foreach (self::$middlewareStack as $mGroup) {
                $middlewares = array_merge($middlewares, $mGroup);
            }

            $route = [
                'method' => $method,
                'uri' => $fullUri,
                'action' => $action,
                'name' => null,
                'middleware' => $middlewares,
            ];
            self::$routes[] = &$route;
            return new RouteRegistrar($route);
        }
    }

    class RouteRegistrar {
        private $routeRef;
        public function __construct(array &$routeRef) {
            $this->routeRef = &$routeRef;
        }
        public function name(string $name): self {
            $this->routeRef['name'] = $name;
            return $this;
        }
        public function middleware($mw): self {
            $this->routeRef['middleware'] = array_merge($this->routeRef['middleware'], (array)$mw);
            return $this;
        }
    }
}

namespace Illuminate\Database\Schema {
    class ColumnDefinition {
        public $sql;
        private $blueprint;
        private $idx;

        public function __construct(Blueprint $bp, int $idx, string $sql) {
            $this->blueprint = $bp;
            $this->idx = $idx;
            $this->sql = $sql;
        }
        public function nullable(): self {
            $this->blueprint->modifyColumn($this->idx, ' NULL');
            return $this;
        }
        public function default($val): self {
            $escaped = is_bool($val) ? ($val ? 1 : 0) : (is_numeric($val) ? $val : "'" . addslashes((string)$val) . "'");
            $this->blueprint->modifyColumn($this->idx, " DEFAULT {$escaped}");
            return $this;
        }
        public function unique(): self {
            $this->blueprint->modifyColumn($this->idx, ' UNIQUE');
            return $this;
        }
    }

    class Blueprint {
        private $table;
        private $columns = [];

        public function __construct(string $table) {
            $this->table = $table;
        }
        private function addCol(string $def): ColumnDefinition {
            $idx = count($this->columns);
            $this->columns[] = $def;
            return new ColumnDefinition($this, $idx, $def);
        }
        public function modifyColumn(int $idx, string $append): void {
            $this->columns[$idx] .= $append;
        }
        public function id(): ColumnDefinition {
            return $this->addCol("id INTEGER PRIMARY KEY AUTOINCREMENT");
        }
        public function string(string $name, int $len = 255): ColumnDefinition {
            return $this->addCol("{$name} VARCHAR({$len})");
        }
        public function text(string $name): ColumnDefinition {
            return $this->addCol("{$name} TEXT");
        }
        public function integer(string $name): ColumnDefinition {
            return $this->addCol("{$name} INTEGER");
        }
        public function boolean(string $name): ColumnDefinition {
            return $this->addCol("{$name} INTEGER");
        }
        public function timestamps(): void {
            $this->addCol("created_at DATETIME NULL");
            $this->addCol("updated_at DATETIME NULL");
        }
        public function toSql(): string {
            return "CREATE TABLE IF NOT EXISTS {$this->table} (" . implode(', ', $this->columns) . ")";
        }
    }
}

namespace Illuminate\Database\Migrations {
    abstract class Migration {
        abstract public function up();
        public function down() {}
    }
}

namespace Illuminate\Database\Seeder {
    abstract class Seeder {
        abstract public function run();
    }
}

namespace Illuminate\Database\Eloquent {
    use Illuminate\Support\Facades\DB;

    class QueryBuilder {
        private $modelClass;
        private $table;
        private $wheres = [];
        private $bindings = [];
        private $orderBys = [];
        private $limitVal = null;

        public function __construct(string $modelClass, string $table) {
            $this->modelClass = $modelClass;
            $this->table = $table;
        }

        public function where(string $col, $opOrVal, $val = null): self {
            if ($val === null) {
                $op = '=';
                $val = $opOrVal;
            } else {
                $op = $opOrVal;
            }
            $this->wheres[] = "{$col} {$op} ?";
            $this->bindings[] = is_bool($val) ? ($val ? 1 : 0) : $val;
            return $this;
        }

        public function orderBy(string $col, string $dir = 'asc'): self {
            $dir = strtoupper($dir) === 'DESC' ? 'DESC' : 'ASC';
            $this->orderBys[] = "{$col} {$dir}";
            return $this;
        }

        public function latest(string $col = 'id'): self {
            return $this->orderBy($col, 'DESC');
        }

        public function limit(int $num): self {
            $this->limitVal = $num;
            return $this;
        }

        public function take(int $num): self {
            return $this->limit($num);
        }

        public function whereIn(string $col, array $values): self {
            if (empty($values)) {
                $this->wheres[] = "1 = 0";
                return $this;
            }
            $placeholders = implode(',', array_fill(0, count($values), '?'));
            $this->wheres[] = "{$col} IN ({$placeholders})";
            foreach ($values as $val) {
                $this->bindings[] = is_bool($val) ? ($val ? 1 : 0) : $val;
            }
            return $this;
        }

        public function inRandomOrder(): self {
            $this->orderBys[] = "RANDOM()";
            return $this;
        }

        public function get(): array {
            $sql = "SELECT * FROM {$this->table}";
            if (!empty($this->wheres)) {
                $sql .= " WHERE " . implode(' AND ', $this->wheres);
            }
            if (!empty($this->orderBys)) {
                $sql .= " ORDER BY " . implode(', ', $this->orderBys);
            }
            if ($this->limitVal !== null) {
                $sql .= " LIMIT " . (int)$this->limitVal;
            }
            $rows = DB::select($sql, $this->bindings);
            $cls = $this->modelClass;
            return array_map(fn($r) => new $cls($r, true), $rows);
        }

        public function first() {
            $this->limit(1);
            $res = $this->get();
            return $res[0] ?? null;
        }

        public function count(): int {
            $sql = "SELECT COUNT(*) as cnt FROM {$this->table}";
            if (!empty($this->wheres)) {
                $sql .= " WHERE " . implode(' AND ', $this->wheres);
            }
            $rows = DB::select($sql, $this->bindings);
            return (int)($rows[0]['cnt'] ?? 0);
        }
    }

    abstract class Model implements \ArrayAccess {
        protected $table;
        protected $fillable = [];
        protected $attributes = [];
        protected $exists = false;

        public function __construct(array $attributes = [], bool $exists = false) {
            $this->attributes = $attributes;
            $this->exists = $exists;
        }

        public static function getTableName(): string {
            $instance = new static();
            if ($instance->table) return $instance->table;
            $short = (new \ReflectionClass($instance))->getShortName();
            $snake = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $short));
            return $snake . 's';
        }

        public static function query(): QueryBuilder {
            return new QueryBuilder(static::class, static::getTableName());
        }

        public static function __callStatic($method, $args) {
            return static::query()->$method(...$args);
        }

        public static function all(): array {
            return static::query()->get();
        }

        public static function where(string $col, $opOrVal, $val = null): QueryBuilder {
            return static::query()->where($col, $opOrVal, $val);
        }

        public static function orderBy(string $col, string $dir = 'asc'): QueryBuilder {
            return static::query()->orderBy($col, $dir);
        }

        public static function latest(string $col = 'id'): QueryBuilder {
            return static::query()->latest($col);
        }

        public static function count(): int {
            return static::query()->count();
        }

        public static function first() {
            return static::query()->first();
        }

        public static function find($id) {
            return static::query()->where('id', $id)->first();
        }

        public static function findOrFail($id) {
            $item = static::find($id);
            if (!$item) {
                http_response_code(404);
                die("404 Data tidak ditemukan.");
            }
            return $item;
        }

        public static function create(array $data) {
            $instance = new static($data);
            $instance->save();
            return $instance;
        }

        public function update(array $data): bool {
            foreach ($data as $k => $v) {
                $this->attributes[$k] = $v;
            }
            return $this->save();
        }

        public function save(): bool {
            $table = static::getTableName();
            $now = date('Y-m-d H:i:s');
            $this->attributes['updated_at'] = $now;

            if ($this->exists && isset($this->attributes['id'])) {
                $id = $this->attributes['id'];
                $sets = [];
                $bindings = [];
                foreach ($this->attributes as $k => $v) {
                    if ($k === 'id') continue;
                    $sets[] = "{$k} = ?";
                    $bindings[] = is_bool($v) ? ($v ? 1 : 0) : $v;
                }
                $bindings[] = $id;
                $sql = "UPDATE {$table} SET " . implode(', ', $sets) . " WHERE id = ?";
                return DB::statement($sql, $bindings);
            } else {
                if (!isset($this->attributes['created_at'])) {
                    $this->attributes['created_at'] = $now;
                }
                $cols = array_keys($this->attributes);
                $placeholders = array_fill(0, count($cols), '?');
                $bindings = array_map(fn($v) => is_bool($v) ? ($v ? 1 : 0) : $v, array_values($this->attributes));
                $sql = "INSERT INTO {$table} (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $placeholders) . ")";
                DB::statement($sql, $bindings);
                $this->attributes['id'] = DB::connection()->lastInsertId();
                $this->exists = true;
                return true;
            }
        }

        public function delete(): bool {
            if (!isset($this->attributes['id'])) return false;
            $table = static::getTableName();
            return DB::statement("DELETE FROM {$table} WHERE id = ?", [$this->attributes['id']]);
        }

        public function __get($key) {
            return $this->attributes[$key] ?? null;
        }
        public function __set($key, $val) {
            $this->attributes[$key] = $val;
        }
        public function __isset($key) {
            return isset($this->attributes[$key]);
        }
        public function offsetExists($offset): bool {
            return isset($this->attributes[$offset]);
        }
        public function offsetGet($offset): mixed {
            return $this->attributes[$offset] ?? null;
        }
        public function offsetSet($offset, $value): void {
            $this->attributes[$offset] = $value;
        }
        public function offsetUnset($offset): void {
            unset($this->attributes[$offset]);
        }
        public function toArray(): array {
            return $this->attributes;
        }
    }
}

namespace Illuminate\Http {
    class UploadedFile {
        private $fileArray;
        public function __construct(array $fileArray) {
            $this->fileArray = $fileArray;
        }
        public function isValid(): bool {
            return isset($this->fileArray['error']) && $this->fileArray['error'] === UPLOAD_ERR_OK;
        }
        public function getClientOriginalExtension(): string {
            return strtolower(pathinfo($this->fileArray['name'] ?? '', PATHINFO_EXTENSION));
        }
        public function getClientOriginalName(): string {
            return $this->fileArray['name'] ?? 'file';
        }
        public function move(string $destDir, string $fileName): string {
            $fullDir = rtrim($destDir, '/\\');
            if (!is_dir($fullDir)) {
                mkdir($fullDir, 0777, true);
            }
            $target = $fullDir . DIRECTORY_SEPARATOR . $fileName;
            move_uploaded_file($this->fileArray['tmp_name'], $target);
            return $target;
        }
    }

    class Request {
        private array $jsonParsed = [];

        public function __construct() {
            if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
                $raw = @file_get_contents('php://input');
                if ($raw) {
                    $decoded = json_decode($raw, true);
                    if (is_array($decoded)) {
                        $this->jsonParsed = $decoded;
                    }
                }
            }
        }

        public function all(): array {
            return array_merge($_GET, $_POST, $this->jsonParsed);
        }
        public function input(string $key, $default = null) {
            return $_POST[$key] ?? $this->jsonParsed[$key] ?? $_GET[$key] ?? $default;
        }
        public function query(string $key, $default = null) {
            return $_GET[$key] ?? $default;
        }
        public function boolean(string $key): bool {
            $val = $this->input($key);
            return filter_var($val, FILTER_VALIDATE_BOOLEAN);
        }
        public function hasFile(string $key): bool {
            return isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK && $_FILES[$key]['size'] > 0;
        }
        public function file(string $key): ?UploadedFile {
            if (!$this->hasFile($key)) return null;
            return new UploadedFile($_FILES[$key]);
        }
        public function validate(array $rules): array {
            $data = [];
            foreach ($rules as $field => $ruleStr) {
                $val = $this->input($field);
                if (strpos($ruleStr, 'required') !== false && !$this->hasFile($field)) {
                    if ($val === null || trim((string)$val) === '') {
                        $_SESSION['__flash_error'] = "Field {$field} wajib diisi.";
                        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
                        exit;
                    }
                }
                $data[$field] = $val;
            }
            return $data;
        }
    }

    class RedirectResponse {
        private $targetUrl;
        public function __construct(string $url) {
            $this->targetUrl = $url;
        }
        public function with(string $key, $value): self {
            $_SESSION['__flash_' . $key] = $value;
            return $this;
        }
        public function send(): void {
            header("Location: {$this->targetUrl}");
            exit;
        }
    }
}

namespace {
    function env(string $key, $default = null) {
        return $GLOBALS['__LARAVEL_ENV'][$key] ?? $default;
    }

    function base_path(string $path = ''): string {
        return LARAVEL_BASE_PATH . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    function public_path(string $path = ''): string {
        return LARAVEL_BASE_PATH . DIRECTORY_SEPARATOR . 'public' . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    function storage_path(string $path = ''): string {
        return LARAVEL_BASE_PATH . DIRECTORY_SEPARATOR . 'storage' . ($path ? DIRECTORY_SEPARATOR . ltrim($path, '/\\') : '');
    }

    function url(string $path = ''): string {
        return '/' . ltrim($path, '/');
    }

    function asset(string $path): string {
        return '/' . ltrim($path, '/');
    }

    function route(string $name, $params = []): string {
        if (!is_array($params)) {
            $params = ['id' => $params, 'slug' => $params];
        }
        foreach (\Illuminate\Support\Facades\Route::$routes as $r) {
            if ($r['name'] === $name) {
                $uri = $r['uri'];
                foreach ($params as $k => $v) {
                    $uri = preg_replace('/\{' . preg_quote((string)$k, '/') . '\}/', (string)$v, $uri, 1);
                }
                if (!empty($params)) {
                    $firstVal = reset($params);
                    $uri = preg_replace('/\{[a-zA-Z0-9_]+\}/', (string)$firstVal, $uri, 1);
                }
                return $uri;
            }
        }
        return '/';
    }

    function csrf_token(): string {
        if (empty($_SESSION['_token'])) {
            $_SESSION['_token'] = bin2hex(random_bytes(16));
        }
        return $_SESSION['_token'];
    }

    function csrf_field(): string {
        return '<input type="hidden" name="_token" value="' . htmlspecialchars(csrf_token(), ENT_QUOTES) . '">';
    }

    function method_field(string $method): string {
        return '<input type="hidden" name="_method" value="' . htmlspecialchars(strtoupper($method), ENT_QUOTES) . '">';
    }

    function session(?string $key = null, $default = null) {
        if ($key === null) {
            return new class {
                public function has(string $k): bool {
                    return isset($_SESSION['__flash_' . $k]) || isset($_SESSION[$k]);
                }
                public function get(string $k, $def = null) {
                    return \session($k, $def);
                }
                public function put(string $k, $v): void {
                    $_SESSION[$k] = $v;
                }
                public function forget(string $k): void {
                    unset($_SESSION[$k]);
                }
            };
        }
        if (isset($_SESSION['__flash_' . $key])) {
            $val = $_SESSION['__flash_' . $key];
            unset($_SESSION['__flash_' . $key]);
            return $val;
        }
        return $_SESSION[$key] ?? $default;
    }

    function old(string $key, $default = '') {
        return $_POST[$key] ?? $default;
    }

    function redirect(?string $to = null): \Illuminate\Http\RedirectResponse {
        if ($to === null) {
            return new class('') extends \Illuminate\Http\RedirectResponse {
                public function route(string $name, $params = []): \Illuminate\Http\RedirectResponse {
                    return new \Illuminate\Http\RedirectResponse(\route($name, $params));
                }
                public function back(): \Illuminate\Http\RedirectResponse {
                    return new \Illuminate\Http\RedirectResponse($_SERVER['HTTP_REFERER'] ?? '/');
                }
            };
        }
        return new \Illuminate\Http\RedirectResponse($to);
    }

    function back(): \Illuminate\Http\RedirectResponse {
        return new \Illuminate\Http\RedirectResponse($_SERVER['HTTP_REFERER'] ?? '/');
    }

    function e($value): string {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }

    function compile_blade_string(string $content): string {
        $content = preg_replace('/\{\{--.*?--\}\}/s', '', $content);
        $content = preg_replace('/@csrf\b/', '<?php echo csrf_field(); ?>', $content);
        $content = preg_replace('/@method\(\s*[\'"](.+?)[\'"]\s*\)/', '<?php echo method_field("$1"); ?>', $content);
        $content = preg_replace('/@json\((.+?)\)/', '<?php echo json_encode($1, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>', $content);
        $content = preg_replace('/@php\b(.*?)@endphp\b/s', '<?php $1 ?>', $content);

        $content = preg_replace_callback('/@(if|elseif|foreach|for)\s*\(( (?:[^()]+|\((?:[^()]+|\([^()]*\))*\))* )\)/x', function ($m) {
            return "<?php {$m[1]}({$m[2]}): ?>";
        }, $content);
        $content = preg_replace('/@else\b/', '<?php else: ?>', $content);
        $content = preg_replace('/@endif\b/', '<?php endif; ?>', $content);
        $content = preg_replace('/@endforeach\b/', '<?php endforeach; ?>', $content);
        $content = preg_replace('/@endfor\b/', '<?php endfor; ?>', $content);

        $content = preg_replace('/\{!!\s*(.+?)\s*!!\}/s', '<?php echo $1; ?>', $content);
        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/s', '<?php echo e($1); ?>', $content);

        return $content;
    }

    function view(string $viewName, array $data = []): string {
        $viewPath = LARAVEL_BASE_PATH . '/resources/views/' . str_replace('.', '/', $viewName) . '.blade.php';
        if (!file_exists($viewPath)) {
            throw new \RuntimeException("View [{$viewName}] not found at {$viewPath}");
        }

        $raw = file_get_contents($viewPath);

        $parentLayout = null;
        if (preg_match('/@extends\(\s*[\'"](.+?)[\'"]\s*\)/', $raw, $m)) {
            $parentLayout = $m[1];
            $raw = str_replace($m[0], '', $raw);
        }

        $sections = [];
        $raw = preg_replace_callback('/@section\(\s*[\'"]([^\r\n\'"]+)[\'"]\s*,\s*([^\r\n]+)\)/', function ($m) use (&$sections) {
            $val = trim($m[2]);
            if ((str_starts_with($val, "'") && str_ends_with($val, "'")) || (str_starts_with($val, '"') && str_ends_with($val, '"'))) {
                $sections[$m[1]] = substr($val, 1, -1);
            } else {
                $sections[$m[1]] = "<?php echo e({$val}); ?>";
            }
            return '';
        }, $raw);

        $raw = preg_replace_callback('/@section\(\s*[\'"]([^\r\n\'"]+)[\'"]\s*\)(.*?)@endsection/s', function ($m) use (&$sections) {
            $sections[$m[1]] = $m[2];
            return '';
        }, $raw);

        if ($parentLayout) {
            $layoutPath = LARAVEL_BASE_PATH . '/resources/views/' . str_replace('.', '/', $parentLayout) . '.blade.php';
            $layoutRaw = file_get_contents($layoutPath);
            $layoutRaw = preg_replace_callback('/@yield\(\s*[\'"](.+?)[\'"](?:\s*,\s*[\'"](.*?)[\'"])?\s*\)/', function ($m) use ($sections) {
                $secName = $m[1];
                $defaultVal = $m[2] ?? '';
                return $sections[$secName] ?? $defaultVal;
            }, $layoutRaw);
            $compiled = compile_blade_string($layoutRaw);
        } else {
            $compiled = compile_blade_string($raw);
        }

        $cacheDir = LARAVEL_BASE_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'views';
        if (!is_dir($cacheDir)) {
            @mkdir($cacheDir, 0777, true);
        }
        $cacheFile = $cacheDir . DIRECTORY_SEPARATOR . md5($viewName . '_' . strlen($compiled) . '_' . md5($compiled)) . '.php';

        try {
            if (@file_put_contents($cacheFile, $compiled) !== false && file_exists($cacheFile)) {
                extract($data, EXTR_SKIP);
                ob_start();
                include $cacheFile;
                return ob_get_clean();
            }
        } catch (\Throwable $e) {
            // Handled below
        }

        // Robust fallback: eval in-memory
        extract($data, EXTR_SKIP);
        ob_start();
        eval('?>' . $compiled);
        return ob_get_clean();
    }
}
