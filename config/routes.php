<?php
use Cake\Routing\Router;

Router::plugin(
    'KoVicky',
    ['path' => '/ko-vicky'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);