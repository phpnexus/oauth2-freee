# Freee Provider for OAuth 2.0 Client

[![Actions Status](https://github.com/phpnexus/oauth2-freee/workflows/Pipeline/badge.svg)](https://github.com/phpnexus/oauth2-freee/actions)
[![Coverage Status](https://img.shields.io/coveralls/phpnexus/oauth2-freee/main.svg)](https://coveralls.io/github/phpnexus/oauth2-freee?branch=main)
[![License](https://img.shields.io/packagist/l/phpnexus/oauth2-freee.svg)](https://github.com/phpnexus/oauth2-freee/blob/main/LICENSE)
[![Version](https://img.shields.io/packagist/v/phpnexus/oauth2-freee.svg)](https://packagist.org/packages/phpnexus/oauth2-freee)
[![Downloads](https://img.shields.io/packagist/dt/phpnexus/oauth2-freee.svg)](https://packagist.org/packages/phpnexus/oauth2-freee/stats)

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

Please see [CONTRIBUTING](https://github.com/phpnexus/oauth2-freee/blob/main/CONTRIBUTING.md) for details.


## Credits

- [Mark Prosser](https://github.com/markinjapan)
- [All Contributors](https://github.com/phpnexus/oauth2-freee/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/phpnexus/oauth2-freee/blob/main/LICENSE) for more information.
