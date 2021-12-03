<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63c32fd0baa07e78bb624593e1b41017
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Michelf\\' => 8,
        ),
        'J' => 
        array (
            'Jerem\\Test\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Michelf\\' => 
        array (
            0 => __DIR__ . '/..' . '/michelf/php-markdown/Michelf',
        ),
        'Jerem\\Test\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit63c32fd0baa07e78bb624593e1b41017::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63c32fd0baa07e78bb624593e1b41017::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63c32fd0baa07e78bb624593e1b41017::$classMap;

        }, null, ClassLoader::class);
    }
}