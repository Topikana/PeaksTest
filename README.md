PeaksTest
A Symfony project created on June 3, 2019, 14.31 pm.

Make Hero Marvel List with API Marvel (https://developer.marvel.com/)

Create an account (https://developer.marvel.com/)

Getting Started
Make you sure you have php 7.2 in your system
install dependencies with composer install

in your parameters.yml:
enter yours database parameters (host, port, name, user,password)

Put yours keys into MarvelController. You can find yours keys when you had create your account into https://developer.marvel.com/. Go to https://developer.marvel.com/account.

enter your marvel api paremeters
api_public_key
api_private_key

run server
php bin/console server:run

To test this project with phpunit :

composer require --dev symfony/phpunit-bridge
composer require --dev symfony/browser-kit symfony/css-selector
to launch yours test 
./vendor/bin/simple-phpunit

Enjoy Marvel Heros.

Build with
Symfony - The PHP framework
Bootstrap - The CSS framework
Authors
François Letellier alias @Topikana
More
Future evolution https://github.com/Topikana/PeaksTest
