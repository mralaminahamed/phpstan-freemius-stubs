<?php

return \StubsGenerator\Finder::create()
    ->in( array(
        'source/vendor/freemius/wordpress-sdk/includes',
    ) )
    ->notPath('customizer')
    ->notPath('debug')
    ->append(
        \StubsGenerator\Finder::create()
            ->in(['source/vendor/freemius/wordpress-sdk'])
            ->files()
            ->depth('< 1')
            ->path('start.php')
    )
    ->sortByName(true)
;
