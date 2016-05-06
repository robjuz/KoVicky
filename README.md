# KoVicky
wiki plugin for CakePHP 3.x
````
PROBLEMS
  ├──> SOLUTIONS
  └──> PROBLEMS
        └──> SOLUTIONS
````
## Install

    composer require robjuz/cakephp-kovicky:dev-master

add to your __config/bootstrap.php__

    Plugin::load('KoVicky',['routes' => true]);
    
add to your webroots folder _(webserver need write access)_

    /webroot/uploads

## Create database tables

To create the required database tables use the migrations plugin

    composer require cakephp/migrations "@stable"
    bin/cake plugin load Migrations

Then run the migrations

    bin/cake migrations migrate -p KoVicky
    
## Requirements

Be sure your database has a ```` users ```` table with ```` username ```` and ```` password ```` columns
