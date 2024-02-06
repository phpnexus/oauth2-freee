<?php

namespace PhpNexus\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class FreeeResourceOwner implements ResourceOwnerInterface
{
    protected array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     */
    public function getId(): int
    {
        return $this->response['id'];
    }

    /**
     * Returns the email address of the authorized resource owner.
     */
    public function getEmail(): string
    {
        return $this->response['email'];
    }

    /**
     * Returns the display name of the authorized resource owner.
     */
    public function getDisplayName(): ?string
    {
        return $this->response['display_name'];
    }

    /**
     * Returns the first name of the authorized resource owner.
     */
    public function getFirstName(): ?string
    {
        return $this->response['first_name'];
    }

    /**
     * Returns the last name of the authorized resource owner.
     */
    public function getLastName(): ?string
    {
        return $this->response['last_name'];
    }

    /**
     * Returns the first name in kana of the authorized resource owner.
     */
    public function getFirstNameKana(): ?string
    {
        return $this->response['first_name_kana'];
    }

    /**
     * Returns the last name in kana of the authorized resource owner.
     */
    public function getLastNameKana(): ?string
    {
        return $this->response['last_name_kana'];
    }

    /**
     * Returns the companies of the authorized resource owner.
     */
    public function getCompanies(): ?array
    {
        return $this->response['companies'];
    }

    /**
     * Returns the raw resource owner response.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}
