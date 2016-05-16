<?php
use Cake\Routing\Router;

Router::plugin(
    'KoVicky',
    ['path' => '/ko-vicky'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
        $routes->connect('/', ['controller' => 'Problems', 'action' => 'index']);
        $routes->prefix('admin', function ($routes) {
            $routes->connect(
                '/upload/:type/:id',
                ['controller' => 'Mediafiles', 'action' => 'upload'],
                [
                    'pass' => ['type', 'id'],
                    // Define a pattern that `id` must match.
                    'id' => '[0-9]+'
                ]
            );
	        $routes->connect('/', ['controller' => 'Problems', 'action' => 'index']);
	        $routes->fallbacks('DashedRoute');
	    });
    }
);