<?php

namespace App\Factory;

use App\Entity\Person;
use App\Repository\PersonRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static       Person|Proxy createOne(array $attributes = [])
 * @method static       Person[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static       Person|Proxy find($criteria)
 * @method static       Person|Proxy findOrCreate(array $attributes)
 * @method static       Person|Proxy first(string $sortedField = 'id')
 * @method static       Person|Proxy last(string $sortedField = 'id')
 * @method static       Person|Proxy random(array $attributes = [])
 * @method static       Person|Proxy randomOrCreate(array $attributes = [])
 * @method static       Person[]|Proxy[] all()
 * @method static       Person[]|Proxy[] findBy(array $attributes)
 * @method static       Person[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static       Person[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static       PersonRepository|RepositoryProxy repository()
 * @method Person|Proxy create($attributes = [])
 */
final class PersonFactory extends ModelFactory
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        parent::__construct();

        $this->passwordEncoder = $passwordEncoder;
    }

    protected function getDefaults(): array
    {
        return [
            'firstname' => self::faker()->name,
            'lastname' => self::faker()->lastName,
            'password' => 'iutinfo',
            'email' => self::faker()->email,
        ];
    }

    protected function initialize(): self
    {
        return $this->afterInstantiate(function (Person $person) {
            $person->setPassword($this->passwordEncoder->encodePassword($person, $person->getPassword()));
        })
        ;
    }

    protected static function getClass(): string
    {
        return Person::class;
    }
}
