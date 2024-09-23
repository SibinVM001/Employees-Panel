<?php

require_once '../app/core/Env.php';
require_once '../app/core/Config.php';
require_once '../app/init.php';


Env::load(__DIR__ . '/../.env');
Config::load(__DIR__ . '/../config/config.php');

$app = new App; 