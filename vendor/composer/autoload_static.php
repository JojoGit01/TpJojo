<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit602e579828a892132eaa006991422f28
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
            0 => __DIR__ . '/../..' . '/Src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit602e579828a892132eaa006991422f28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit602e579828a892132eaa006991422f28::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
