<?php

return \StubsGenerator\Finder::create()
    ->in( array(
        'source/vendor/freemius/wordpress-sdk/freemius/includes',
        'source/vendor/freemius/wordpress-sdk/freemius/templates'
    ) )
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk/freemius'])
            ->files()
            ->depth('< 1')
            ->path('config.php')
    )
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk/freemius'])
            ->files()
            ->depth('< 1')
            ->path('start.php')
    )
    ->sortByName(true)
;
