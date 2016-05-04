<?php
use Cake\Routing\Router;

Router::plugin(
    'KoVicky',
    ['path' => '/ko-vicky'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
        $routes->connect('/', ['controller' => 'Problems', 'action' => 'index']);
        $routes->prefix('admin', function ($routes) {
	        $routes->connect('/', ['controller' => 'Problems', 'action' => 'index']);
	        $routes->fallbacks('DashedRoute');
	    });
    }
);