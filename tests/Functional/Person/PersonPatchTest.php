<?php

namespace App\Tests\Functional\Person;

use App\Entity\Person;
use App\Factory\PersonFactory;
use App\Tests\TestCases\ApiPlatformTestCase;

class PersonPatchTest extends ApiPlatformTestCase
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

    public function testAnonymousUserForbiddenToPatchUser()
    {
        // 1. 'Arrange'
        PersonFactory::new()->create();

        // 2. 'Act'
        self::jsonld_request('PATCH', '/api/people/1');

        // 3. 'Assert'
        $this->assertResponseStatusCodeSame(401);
    }

    public function testAuthenticatedUserForbiddenToPatchOtherUser()
    {
        // 1. 'Arrange'
        /** @var Person $person */
        $person = PersonFactory::new()->create()->object();
        PersonFactory::new()->create();
        self::loginUser($person);

        // 2. 'Act'
        self::jsonld_request('PATCH', '/api/people/2');

        // 3. 'Assert'
        $this->assertResponseStatusCodeSame(403);
    }

    public function testAuthenticatedUserCanPatchOwnData()
    {
        // 1. 'Arrange'
        /** @var Person $person */
        $dataInit = [
            'email' => 'user1@pouet.com',
            'firstName' => 'firstName1',
            'lastName' => 'lastName1',
        ];
        $person = PersonFactory::new()->create($dataInit)->object();
        self::loginUser($person);

        // 2. 'Act'
        $dataPatch = ['lastName' => 'lastName2'];
        $parameters = [
            'contentType' => 'application/merge-patch+json',
            'content' => json_encode($dataPatch),
        ];
        self::jsonld_request('PATCH', '/api/people/1', $parameters);

        // 3. 'Assert'
        $json = self::lastJsonResponseWithAsserts(ApiPlatformTestCase::ENTITY, 'Person');
        self::assertJsonIsAnItem($json, self::getProperties(), array_merge($dataInit, $dataPatch));
    }

    public function testAuthenticatedUserCanChangeHisPassword()
    {
        // 1. 'Arrange'
        /** @var Person $person */
        $data = [
            'email' => 'user1@pouet.com',
            'firstName' => 'firstName1',
            'lastName' => 'lastName1',
            'password' => 'iutinfo',
        ];
        $person = PersonFactory::new()->create($data)->object();
        self::loginUser($person);

        // 2. 'Act'
        self::jsonld_request('PATCH', '/api/people/1', [
            'contentType' => 'application/merge-patch+json',
            'content' => json_encode(['password' => 'new password']),
        ]);
        self::$client->request('GET', '/logout');
        self::$client->request('GET', '/login');

        //self::$client->getResponse()->getContent();

        $crawler = self::$client->submitForm('Se connecter', ['email' => 'user1@pouet.com', 'password' => 'new password']);

        // 3. 'Assert'
        self::assertResponseStatusCodeSame(302);
        //TODO: Check l'url de redirecte
    }
}
