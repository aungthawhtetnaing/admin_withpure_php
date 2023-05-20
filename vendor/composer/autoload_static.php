<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb81a6646c388fe347e722a2323f505ee
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libs\\' => 5,
        ),
        'H' => 
        array (
            'Helpers\\' => 8,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/_classes/Libs',
        ),
        'Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/_classes/Helpers',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb81a6646c388fe347e722a2323f505ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb81a6646c388fe347e722a2323f505ee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb81a6646c388fe347e722a2323f505ee::$classMap;

        }, null, ClassLoader::class);
    }
}
