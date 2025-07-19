<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables for tests
if (file_exists(__DIR__ . '/../.env.test')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', '.env.test');
    $dotenv->load();
} 