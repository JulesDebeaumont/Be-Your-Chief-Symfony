<?php

declare(strict_types=1);

namespace App\Tests\TestCases;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Security\Core\User\UserInterface;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

abstract class ApiPlatformTestCase extends WebTestCase
{
    use ResetDatabase;
    use Factories;

    const ENTITY = 'ENTITY';
    const COLLECTION = 'COLLECTION';

    protected static $client;

    protected static function getJSONLDProperties($properties): array
    {
        return array_merge($properties, ['@id', '@type']);
    }

    public function setUp(): void
    {
        static::ensureKernelShutdown(); // creating factories boots the kernel; shutdown before creating the client
        self::$client = self::createClient();
    }

    protected static function jsonld_request($methode, $url, $parameters = []): Crawler
    {
        $contentType = isset($parameters['contentType']) ? ['CONTENT_TYPE' => $parameters['contentType']] : [];
        $headers = array_merge(['HTTP_ACCEPT' => 'application/ld+json'], $contentType, $parameters['headers'] ?? []);

        return self::$client->request($methode, $url, $parameters['parameters'] ?? [], [], $headers, $parameters['content'] ?? null);
    }

    protected static function lastJsonResponseWithAsserts($type, $entity, $route = null): array
    {
        self::assertResponseIsSuccessful();
        self::assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');

        $route = $route ?? self::$client->getRequest()->getPathInfo();
        $json = json_decode(self::$client->getResponse()->getContent(), true);
        switch ($type) {
            case self::ENTITY:
                self::assertJsonIsAnEntity($route, $entity, $json);
                break;
            case self::COLLECTION:
                    self::assertJsonIsACollection($route, $entity, $json);
                break;
        }

        return $json;
    }

    protected static function assertJsonIsACollection(string $route, string $entity, array $json): void
    {
        self::assertJsonProperties($json, [
            '@context' => '/api/contexts/'.$entity,
            '@id' => $route,
            '@type' => 'hydra:Collection',
        ]);
    }

    protected static function assertJsonIsAnEntity(string $route, string $entity, array $json): void
    {
        self::assertJsonProperties($json, [
            '@context' => '/api/contexts/'.$entity,
            '@id' => $route,
            '@type' => $entity,
        ]);
    }

    protected static function assertJsonIsAnItem(array $json, array $properties, array $values = []): void
    {
        $properties = self::getJSONLDProperties($properties);
        foreach ($properties as $property) {
            self::assertArrayHasKey($property, $json);
            if (isset($values[$property])) {
                self::assertSame($values[$property], $json[$property]);
            }
        }
        foreach ($json as $property => $value) {
            if ('@context' !== $property) {
                self::assertContains($property, $properties, 'JSON contain property ('.$property.') not expected ['.join(', ', $properties).']');
            }
        }
    }

    protected static function assertJsonIsPaginated(array $json, int $lastPage, int $currentPage = 1): void
    {
        $route = self::$client->getRequest()->getPathInfo();
        $asserts = [
            '@id' => $route.'?page='.$currentPage,
            '@type' => 'hydra:PartialCollectionView',
            'hydra:first' => $route.'?page=1',
            'hydra:last' => $route.'?page='.$lastPage,
        ];
        if ($currentPage < $lastPage) {
            $asserts['hydra:next'] = $route.'?page='.($currentPage + 1);
        }
        if ($currentPage > 1) {
            $asserts['hydra:previous'] = $route.'?page='.($currentPage - 1);
        }
        self::assertJsonProperties($json['hydra:view'], $asserts);
    }

    protected static function assertJsonProperties(array $json, array $asserts, bool $only = false): void
    {
        foreach ($asserts as $property => $value) {
            self::assertArrayHasKey($property, $json);
            self::assertSame($value, $json[$property]);
        }
        if ($only) {
            foreach ($json as $property => $value) {
                self::assertArrayHasKey($property, $asserts, 'JSON contain property ('.$property.') not expected ['.join(', ', $asserts).']');
            }
        }
    }

    /**
     * @return ApiPlatformTestCase
     */
    public function loginUser(UserInterface $user, string $firewallContext = 'main'): self
    {
        if (!interface_exists(UserInterface::class)) {
            throw new \LogicException(sprintf('"%s" requires symfony/security-core to be installed.', __METHOD__));
        }

        if (!$user instanceof UserInterface) {
            throw new \LogicException(sprintf('The first argument of "%s" must be instance of "%s", "%s" provided.', __METHOD__, UserInterface::class, \is_object($user) ? \get_class($user) : \gettype($user)));
        }

        $token = new TestBrowserToken($user->getRoles(), $user);
        $token->setAuthenticated(true);
        $session = self::$client->getContainer()->get('session');
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        self::$client->getCookieJar()->set($cookie);

        return $this;
    }
}
