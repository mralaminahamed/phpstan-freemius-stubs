<?php

use StubsGenerator\Finder;

return Finder::create()
    ->in( array(
        'source/vendor/freemius/wordpress-sdk/freemius',
    ) )
    ->notPath('customizer')
    ->notPath('debug')
    ->append(
        Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk/freemius'])
            ->files()
            ->depth('< 1')
            ->path('start.php')
    )
    ->sortByName(true)
;
