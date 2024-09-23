<?php

class Config {
    protected static $config;

    public static function load($filePath) {
        self::$config = require $filePath;
    }

    public static function get($key) {
        return self::$config[$key] ?? null;
    }
}