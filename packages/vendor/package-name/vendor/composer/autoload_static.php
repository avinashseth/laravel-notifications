<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitedc3bab946cc165a58b8f081c8fd3861
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\PackageName\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\PackageName\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitedc3bab946cc165a58b8f081c8fd3861::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitedc3bab946cc165a58b8f081c8fd3861::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitedc3bab946cc165a58b8f081c8fd3861::$classMap;

        }, null, ClassLoader::class);
    }
}