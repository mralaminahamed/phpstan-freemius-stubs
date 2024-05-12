<?php

require_once 'vendor/autoload.php';

return \StubsGenerator\Finder::create()
    ->in( array(
        'source/vendor/freemius/wordpress-sdk/includes',
        'source/vendor/freemius/wordpress-sdk/templates'
    ) )
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk'])
            ->files()
            ->depth('< 1')
            ->path('config.php')
    )
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk/includes/'])
            ->files()
            ->depth('< 1')
            ->path('fs-essential-functions.php')
    )
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk'])
            ->files()
            ->depth('< 1')
            ->path('start.php')
    )
    ->notPath('source/vendor/freemius/wordpress-sdk/includes/debug/')
    ->sortByName(true)
;
