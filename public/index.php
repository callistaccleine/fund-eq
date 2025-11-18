<?php

declare(strict_types=1);

use App\Controllers\PageController;
use App\Services\SupabaseService;

$config = require __DIR__ . '/../app/config.php';

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$supabase = new SupabaseService($config['supabase']);
$controller = new PageController($supabase);

$page = $_GET['page'] ?? 'home';
$method = method_exists($controller, $page) ? $page : 'home';

$controller->{$method}();
