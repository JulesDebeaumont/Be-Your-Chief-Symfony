<?php

namespace App\Tests\Functional\Person;

use App\Factory\PersonFactory;
use App\Tests\TestCases\ApiPlatformTestCase;

class PersonGetTest extends ApiPlatformTestCase
{
    protected static function getProperties(): array
    {
        return [
            'id',
            'firstName',
            'lastName',
            'recipes',
        ];
    }

    public function testAnonymousUserGetSimpleUserElement()
    {
        // 1. 'Arrange'
        $data = [
            'email' => 'user1@pouet.com',
            'firstname' => 'firstname1',
            'lastname' => 'lastname1',
        ];
        PersonFactory::new()->create($data);

        // 2. 'Act'
        self::jsonld_request('GET', '/api/people/1');

        // 3. 'Assert'
        $json = self::lastJsonResponseWithAsserts(ApiPlatformTestCase::ENTITY, 'Person');
        unset($data['password']);
        self::assertJsonIsAnItem($json, self::getProperties(), $data);
    }

    public function testAuthenticatedUserGetSimpleUserElementForOthers()
    {
        // 1. 'Arrange'
        $data = [
            'email' => 'user1@pouet.com',
            'firstname' => 'firstname1',
            'lastname' => 'lastname1',
        ];

        $person = PersonFactory::new()->create()->object();
        PersonFactory::new()->create($data);
        self::loginUser($person);

        // 2. 'Act'
        self::jsonld_request('GET', '/api/people/2');

        // 3. 'Assert'
        $json = self::lastJsonResponseWithAsserts(ApiPlatformTestCase::ENTITY, 'Person');
        self::assertJsonIsAnItem($json, self::getProperties(), $data);
    }
}
