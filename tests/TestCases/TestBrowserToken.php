<?php

namespace App\Tests\TestCases;

use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * A very limited token that is used to login in tests using the KernelBrowser.
 *
 * @author Wouter de Jong <wouter@wouterj.nl>
 */
class TestBrowserToken extends AbstractToken
{
    public function __construct(array $roles = [], UserInterface $user = null)
    {
        parent::__construct($roles);

        if (null !== $user) {
            $this->setUser($user);
        }
    }

    public function getCredentials()
    {
        return null;
    }
}
