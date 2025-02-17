<?php

use StubsGenerator\Finder;

return Finder::create()
    ->in(array(
        'source/vendor/freemius/wordpress-sdk/',
    ))
    ->notPath('customizer')
    ->notPath('debug')
    ->append(
        Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk/'])
            ->files()
            ->depth('< 1')
            ->path('start.php')
    )
    ->sortByName(true)
;
