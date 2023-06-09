<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d020beaa99ea520e71c99ed0c0da9e8
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d020beaa99ea520e71c99ed0c0da9e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d020beaa99ea520e71c99ed0c0da9e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d020beaa99ea520e71c99ed0c0da9e8::$classMap;

        }, null, ClassLoader::class);
    }
}
