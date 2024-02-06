<?php

declare(strict_types=1);

namespace PhpNexus\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Freee extends AbstractProvider
{
    use BearerAuthorizationTrait;

    const ACCESS_TOKEN_RESOURCE_OWNER_ID = 'id';

    public function getBaseAuthorizationUrl(): string
    {
        return 'https://accounts.secure.freee.co.jp/public_api/authorize';
    }

    public function getBaseAccessTokenUrl(array $params): string
    {
        return 'https://accounts.secure.freee.co.jp/public_api/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return 'https://api.freee.co.jp/api/1/users/me';
    }

    protected function getDefaultScopes(): array
    {
        return [];
    }

    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if (!empty($data['error_description'])) {
            throw new IdentityProviderException(
                $data['error_description'],
                $response->getStatusCode(),
                $data
            );
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token): ResourceOwnerInterface
    {
        return new FreeeResourceOwner($response);
    }
}

