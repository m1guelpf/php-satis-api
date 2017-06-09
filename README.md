# PHP Satis API Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/m1guelpf/satis-api.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/satis-api)
[![Software License](https://img.shields.io/github/license/m1guelpf/php-satis-api.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/m1guelpf/satis-api.svg?style=flat-square)](https://packagist.org/packages/m1guelpf/satis-api)

This package makes it easy to interact with a instance.

## Installation

You can install the package via composer:

``` bash
composer require m1guelpf/satis-api
```

## Usage

You can pass the Satis Instance URL when initializing the class

``` php
$satis = new \M1guelpf\SatisAPI\Satis('URL_TO_YOUR_SATIS_INSTANCE');
```

or you can skip the URL and use the `url()` method later

``` php
$satis = new \M1guelpf\SatisAPI\Satis;

$satis->url('URL_TO_YOUR_SATIS_INSTANCE');
```

you can also pass an array of headers to use, or use the headers() method

``` php
$satis = new \M1guelpf\SatisAPI\Satis('URL_TO_YOUR_SATIS_INSTANCE', $headers);

// or

$satis->headers($headers);
```

### Get Packages
``` php
$satis->getPackages();
```

### Get Composer File
``` php
$satis->getComposer();
```

### Get Includes
``` php
$satis->getIncludes();
```

### Get Custom
``` php
$satis->getCustom($relativeUrl, $parameters);
```

### Get the Guzzle Client

``` php
$satis->getClient();
```

### Set the Guzzle Client

``` php
$client = new \GuzzleHttp\Client(); // Example Guzzle client
$satis->setClient($client);
```
where $client is an instance of `\GuzzleHttp\Client`.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

The Mozilla Public License 2.0 (MPL-2.0). Please see [License File](LICENSE.md) for more information.
