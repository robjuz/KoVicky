# KoVicky
wiki plugin for CakePHP 3.x
````
PROBLEM
  ├──> DESCRIPTION
  └──> RELATED PROBLEMS
        └──> DESCRIPTION
````
## Install

    composer require robjuz/cakephp-kovicky:dev-master

add to your __config/bootstrap.php__

    Plugin::load('KoVicky',['routes' => true]);
    
add to your webroots folder _(webserver need write access)_

    /webroot/uploads

## Create database tables

To create the required database tables use the migrations plugin

    bin/cake migrations migrate -p KoVicky
    
## Requirements

* Be sure your database has a ```` users ```` table with ```` username ```` and ```` password ```` columns

* Add this to __src/AppController.php__
````
$this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false,
                'plugin' => false
            ],
            'authorize' => 'Controller'
        ]);
````

* in __src/AppController.php__ implement 
````
public function isAdmin(){

}
````
