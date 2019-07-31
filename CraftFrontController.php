<?php

declare(strict_types=1);

/**
 * CraftCMS front controller
 */

use Whoops\Run as WhoopsRun;
use Whoops\Handler\PlainTextHandler as WhoopsPlainTextHandler;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;

define('CRAFT_BASE_PATH', __DIR__);
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH . '/vendor');

require_once CRAFT_VENDOR_PATH . '/autoload.php';

define('CRAFT_ENVIRONMENT', getenv('ENVIRONMENT') ?: 'dev');

$whoops = new WhoopsRun();
$whoops->register();

require __DIR__ . '/config/devMode.php';

if (PHP_SAPI === 'cli') {
    $whoops->prependHandler(new WhoopsPlainTextHandler());

    $app = require CRAFT_VENDOR_PATH . '/craftcms/cms/bootstrap/console.php';
    $exitCode = $app->run();
    exit($exitCode);
}

$whoops->prependHandler(new WhoopsPrettyPageHandler());

require __DIR__ . '/config/devMode.php';

$app = require CRAFT_VENDOR_PATH . '/craftcms/cms/bootstrap/web.php';
$app->run();
