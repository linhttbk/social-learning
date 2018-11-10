<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1b6d6c21c971510de3afdfbe98a7b9f8
{
    public static $files = array (
        'c78728b4802e1a9e0e9e89908b46d100' => __DIR__ . '/..' . '/captcha-com/laravel-captcha/src/Support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LaravelCaptcha\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LaravelCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/captcha-com/laravel-captcha/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1b6d6c21c971510de3afdfbe98a7b9f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1b6d6c21c971510de3afdfbe98a7b9f8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}