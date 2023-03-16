# Firebird for Laravel 8.x, 9.x, 10.x

[![Latest Stable Version](https://poser.pugx.org/onezerotrash/laravel-firebird/v/stable)](https://packagist.org/packages/onezerotrash/laravel-firebird)
[![Total Downloads](https://poser.pugx.org/onezerotrash/laravel-firebird/downloads)](https://packagist.org/packages/onezerotrash/laravel-firebird)
[![License](https://poser.pugx.org/onezerotrash/laravel-firebird/license)](https://packagist.org/packages/onezerotrash/laravel-firebird)

This package adds support for the Firebird PDO Database Driver in Laravel applications.
Package is a fork from [harrygulliford/laravel-firebird](https://github.com/harrygulliford/laravel-firebird) and adds support for dialect 1.

## Version Support

- **PHP:** 7.4, 8.0, 8.1, 8.2
- **Laravel:** 8.x, 9.x, 10.x
- **Firebird:** 2.5, 3.0, 4.0
- **Firebird Dialect:** 1, 3

## Installation

You can install the package via composer:

```bash
composer require onezerotrash/laravel-firebird
```

_The package will automatically register itself._

Declare the connection within your `config/database.php` file by using `firebird` as the
driver (use `PDO::ATTR_CASE => PDO::CASE_LOWER`):
```php
'connections' => [

    'firebird' => [
        'driver'   => 'firebird',
        'host'     => env('DB_FIREBIRD_HOST', 'localhost'),
        'port'     => env('DB_FIREBIRD_PORT', '3050'),
        'database' => env('DB_FIREBIRD_DATABASE', '/path_to/database.fdb'),
        'username' => env('DB_FIREBIRD_USERNAME', 'SYSDBA'),
        'password' => env('DB_FIREBIRD_PASSWORD', 'masterkey'),
        'charset'  => env('DB_FIREBIRD_CHARSET', 'UTF8'),
        'dialect'  => env('DB_FIREBIRD_DIALECT', '3'),
        'role'     => env('DB_FIREBIRD_ROLE', 'NONE'),
        'options' => [
            PDO::ATTR_CASE => PDO::CASE_LOWER,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
            PDO::ATTR_STRINGIFY_FETCHES => false,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ],

],
```

Add the `DB_FIREBIRD_*` environment variables to your `.env` file, for example:
```
DB_FIREBIRD_HOST=localhost
DB_FIREBIRD_PORT=3050
DB_FIREBIRD_DATABASE=/opt/firebird/database.fdb
DB_FIREBIRD_USERNAME=user
DB_FIREBIRD_PASSWORD=password
DB_FIREBIRD_CHARSET=WIN1250
DB_FIREBIRD_DIALECT=3
```

To register this package in Lumen, you'll also need to add the following line to the service providers in your `config/app.php` file:
`$app->register(\onezerotrash\Firebird\FirebirdServiceProvider::class);`

## Limitations
This package does not intend to support database migrations and it should not be used for this use case.

## License
Licensed under the [MIT](https://choosealicense.com/licenses/mit/) license.
