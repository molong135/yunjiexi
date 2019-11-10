<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92adfa4c37f5a0fb077a827d35d9a102
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'OSS\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'OSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/aliyuncs/oss-sdk-php/src/OSS',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit92adfa4c37f5a0fb077a827d35d9a102::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit92adfa4c37f5a0fb077a827d35d9a102::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit92adfa4c37f5a0fb077a827d35d9a102::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
