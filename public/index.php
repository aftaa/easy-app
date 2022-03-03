<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
require_once './../vendor/autoload.php';
chdir('..');

(new \common\Application(
    require_once 'app/config/config.php',
    \common\types\DebugMode::true,
    \common\types\Environment::DEV))->handle();
