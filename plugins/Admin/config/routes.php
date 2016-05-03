<?php
use Cake\Routing\Router;

Router::plugin(
    'Admin',
    ['path' => '/admin'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
