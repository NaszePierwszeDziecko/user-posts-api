<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload.php';

if (file_exists(dirname(__DIR__).'/.env')) {
    (new Symfony\Component\Dotenv\Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
}; 