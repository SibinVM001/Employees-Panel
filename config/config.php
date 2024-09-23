<?php

return [
    'app_name' => 'My Application',
    'default_language' => 'en',
    'items_per_page' => 10,
    'enable_logging' => true,
    'log_path' => __DIR__ . '/../storage/logs/app.log',
    'cache_duration' => 3600,
    'base_url' => 'http://127.0.0.1:8002/employee_panel/public',
    'mysql' => [
        'host' => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname' => getenv('DB_NAME')
    ]
];