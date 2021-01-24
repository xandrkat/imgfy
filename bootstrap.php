<?php

// use Buki\Router\Router;
use Jenssegers\Blade\Blade;
use Josantonius\Session\Session;
use Gt\Cookie\CookieHandler;
use Illuminate\Database\Capsule\Manager as Capsule;
use Container\Container as App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\ChromePHPHandler;

use Telegram\Bot;

$appConfig = require __DIR__ . '/config/app.php';
date_default_timezone_set($appConfig['timezone']);
ini_set('display_errors', $appConfig['debug']);
ini_set('display_startup_errors', $appConfig['debug']);
error_reporting($appConfig['error_reporting']);

set_time_limit(30);

require __DIR__ . '/vendor/autoload.php';

$app = App::getInstance();

/** app config */
$app->set('config.app', $appConfig);

/** session */
$app->mapOnce('session', new Session);
$app->session()->init(strtotime("+1 day"));

/** cookie */
$app->mapOnce('cookie', new CookieHandler($_COOKIE));

/** views */
$viewConfig = require __DIR__ . '/config/view.php';
$app->mapOnce('view', new Blade($viewConfig['templates_dir'], $viewConfig['cache_dir']));

/** telegram bot */
$botConfig = require __DIR__ . '/config/bot.php';
bot($botConfig['token']);

$app->view()->directive('app_name', function () use ($appConfig) {
    $name = $appConfig['app_name'];
    return "<?php echo with('$name'); ?>";
});

$app->map('render', function ($template, $params = []) use ($app) {
    echo $app->view()->render($template, $params);
});

/** database */
$app->mapOnce('db', function () use ($app) {
    $capsule = new Capsule;
    $capsule->addConnection(require __DIR__ . '/config/database.php');
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
});

/** cache */
$app->mapOnce('cache', function () use ($app) {
    $cache = new Memcached;
    $cache->addServer('localhost', '11211');
    return $cache;
});

/** logger */
$app->mapOnce('logger', function () {
    $logConfig = require __DIR__ . '/config/log.php';
    $logger = new Logger('app');
    $logger->pushHandler(new StreamHandler($logConfig['log_dir'], Logger::DEBUG));
    $logger->pushHandler(new ChromePHPHandler);
    return $logger;
});

/** router */
// $app->mapOnce('router', fn () => new Router([
//     'base_folder' => __DIR__,
//     'main_method ' => 'index',
//     'paths' => [
//         'controllers' => '/app/Controllers',
//         'middlewares' => '/app/Middlewares',
//     ],
//     'namespaces' => [
//         'controllers' => '\App\Controllers',
//         'middlewares' => '\App\Middlewares',
//     ]
// ]));

$app->mapOnce('router', fn () => new Chipslays\Router\Router());
$app->map('run', fn () => $app->router()->run());

require __DIR__ . '/routes/web.php';
