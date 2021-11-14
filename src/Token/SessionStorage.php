<?php

namespace TotalCRM\MicrosoftGraph\Token;

use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class SessionStorage
 * @package TotalCRM\MicrosoftGraph\Token
 */
class SessionStorage implements TokenStorageInterface
{

    private $session;
    private $container;

    /**
     * SessionStorage constructor.
     * @param Session $session
     * @param Container $container
     */
    public function __construct(Session $session, Container $container)
    {
        $this->session = $session;
        $this->container = $container;
    }

    public function setToken(AccessToken $token)
    {
        $this->session->set('microsoft_graph_accesstoken', $token->getToken());
        $this->session->set('microsoft_graph_refreshtoken', $token->getRefreshToken());
        $this->session->set('microsoft_graph_expires', $token->getExpires());
        $this->session->set('microsoft_graph_resourceOwnerId', $token->getResourceOwnerId());
    }

    /**
     * @return AccessToken
     */
    public function getToken()
    {
        $options['access_token'] = $this->session->get('microsoft_graph_accesstoken');
        $options['refresh_token'] = $this->session->get('microsoft_graph_refreshtoken');
        $options['expires'] = $this->session->get('microsoft_graph_expires');
        $options['resource_owner_id'] = $this->session->get('microsoft_graph_resourceOwnerId');

        return new AccessToken($options);
    }
}
