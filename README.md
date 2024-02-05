# Freee Provider for OAuth 2.0 Client

[![Latest Version](https://img.shields.io/github/release/phpnexus/oauth2-freee.svg?style=flat-square)](https://github.com/phpnexus/oauth2-freee/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/phpnexus/oauth2-freee/master.svg?style=flat-square)](https://travis-ci.org/phpnexus/oauth2-freee)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/phpnexus/oauth2-freee.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpnexus/oauth2-freee/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpnexus/oauth2-freee.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpnexus/oauth2-freee)
[![Total Downloads](https://img.shields.io/packagist/dt/phpnexus/oauth2-freee.svg?style=flat-square)](https://packagist.org/packages/phpnexus/oauth2-freee)

This package provides Freee OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Installation

To install, use composer:

```
composer require phpnexus/oauth2-freee
```

## Usage

Usage is the same as The League's OAuth client, using `\PhpNexus\OAuth2\Client\Provider\Freee` as the provider.

### Authorization Code Flow

```php
$provider = new PhpNexus\OAuth2\Client\Provider\Freee([
    'clientId'          => '{freee-app-client-id}',
    'clientSecret'      => '{freee-app-client-secret}',
    'redirectUri'       => 'https://example.com/redirect-url'
]);
```

For further usage of this package please refer to the [core package documentation on "Authorization Code Grant"](https://github.com/thephpleague/oauth2-client#usage).

### Refreshing a Token

Once your application is authorized, you can refresh an expired token using a refresh token rather than going through the entire process of obtaining a brand new token. To do so, simply reuse this refresh token from your data store to request a refresh.

```php
$existingAccessToken = getAccessTokenFromYourDataStore();

if ($existingAccessToken->hasExpired()) {
    $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $existingAccessToken->getRefreshToken()
    ]);

    // Purge old access token and store new access token to your data store.
}
```

For further usage of this package please refer to the [core package documentation on "Refreshing a Token"](https://github.com/thephpleague/oauth2-client#refreshing-a-token).

## Testing

``` bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/phpnexus/oauth2-freee/blob/master/CONTRIBUTING.md) for details.


## Credits

- [Mark Prosser](https://github.com/phpnexus)
- [All Contributors](https://github.com/phpnexus/oauth2-freee/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/phpnexus/oauth2-freee/blob/master/LICENSE) for more information.
