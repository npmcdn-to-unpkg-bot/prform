## PR Form

Full requirements is in the 'full_requirements' folder.


THis project is based on PHP Laravel 5.2 framework and frontend is nased on AngularJS 2 in FrontEnd.

### Server Config

Change in php.ini file-

'
zend_extension = "c:/wamp/bin/php/php5.5.12/zend_ext/php_xdebug-2.2.5-5.5-vc11-x86_64.dll"

;xdebug

xdebug.remote_enable = off

xdebug.profiler_enable = off

xdebug.profiler_enable_trigger = off

xdebug.profiler_output_name = cachegrind.out.%t.%p

xdebug.profiler_output_dir = "c:/wamp/tmp"

xdebug.show_local_vars=0

xdebug.max_nesting_level = 200
'

=============================================================================


###Installation

Install composer take composer update git clone go to the directory

run "composer install" and if composer packages already installed and if you add any new package you need to do composer update

then after -> set up .env file from .env.eexample and change he .env file to configurations, run these below commands

```bash

composer dump-autoload

php artisan key:generate

php artisan migrate:reset

php artisan migrate --seed

```

or for every time use-

```bash

php artisan migrate:refresh --seed

```
