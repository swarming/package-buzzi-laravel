# package-buzzi-laravel
Buzzi for the PHP framework Laravel

## Installation

The recommended way to install swarming/buzzi-laravel is [through composer](http://getcomposer.org).

```bash
composer require swarming/buzzi-laravel
```

### Lumen
In Lumen find the `Register Service Providers` in your `bootstrap/app.php` and register the Buzzi Service Provider.

```php
    $app->register(Buzzi\Laravel\ServiceProvider::class);
```

### Laravel
In Laravel find the providers key in your config/app.php and register the Buzzi Service Provider.
```php
    'providers' => array(
        // ...
        Buzzi\Laravel\ServiceProvider::class,
    )
```
Find the aliases key in your config/app.php and add the Buzzi facade alias.
```php
    'aliases' => array(
        // ...
        'Buzzi' => Buzzi\Laravel\Facade::class,
    )
```

## Configuration

By default, the package uses the following environment variables to auto-configure the plugin without modification:
```
BUZZI_API_ID
BUZZI_API_SECRET
```

To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish
```

Update your settings in the generated `app/config/buzzi.php` configuration file.

```php
return [

    'api' => [
    	'id'     => env('BUZZI_API_ID',     '<your-buzzi-api-id-here>'),
		'secret' => env('BUZZI_API_SECRET', '<your-buzzi-api-secret-here>')
	]

];
```

## Usage

In order to use the Buzzi SDK for PHP within your app, you need to retrieve it from the [Laravel Service
Container](https://laravel.com/docs/5.4/container). The following example uses the Buzzi client to send an event.

```php
$buzzi = App::make('buzzi');

$buzzi->send('buzzi.ecommerce.test', ["message" => "Hello, World", "timestamp" => date(DATE_ATOM)]);
```

If the Buzzi facade is registered within the `aliases` section of the application configuration, you can also use the
following technique.

```php
Buzzi::send('buzzi.ecommerce.test', ["message" => "Hello, World", "timestamp" => date(DATE_ATOM)]);
```