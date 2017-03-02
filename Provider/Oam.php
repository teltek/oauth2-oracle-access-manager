<?php

namespace Teltek\Oauth2OracleAccessManagerBundle\Provider;

use League\OAuth2\Client\Provider\GenericProvider as BaseGenericProvider;

/**
 * Represents a generic service provider that may be used to interact with any
 * OAuth 2.0 service provider, using Bearer token authentication.
 */
class Oam extends BaseGenericProvider
{
    public $defaultSeparatorScope = ' ';

    /**
     * Builds request options used for requesting an access token.
     *
     * @param array $params
     *
     * @return array
     */
    protected function getAccessTokenOptions(array $params)
    {
        $options = ['headers' => [
                                  'content-type' => 'application/x-www-form-urlencoded',
                                  'Authorization' => 'Basic '.base64_encode($params['client_id'].':'.$params['client_secret']),
                                ],
                ];

        if ($this->getAccessTokenMethod() === self::METHOD_POST) {
            $options['body'] = $this->getAccessTokenBody($params);
        }

        return $options;
    }

    protected function getScopeSeparator()
    {
        return $this->defaultSeparatorScope;
    }
}
