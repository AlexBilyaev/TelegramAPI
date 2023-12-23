<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb91f956bf26cf52ddf736f0b7145a266
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Curl' => 
            array (
                0 => __DIR__ . '/..' . '/curl/curl/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb91f956bf26cf52ddf736f0b7145a266::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb91f956bf26cf52ddf736f0b7145a266::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb91f956bf26cf52ddf736f0b7145a266::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb91f956bf26cf52ddf736f0b7145a266::$classMap;

        }, null, ClassLoader::class);
    }
}
