<?php

namespace App\Factory;

use App\Entity\Allergen;
use App\Repository\AllergenRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static         Allergen|Proxy createOne(array $attributes = [])
 * @method static         Allergen[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static         Allergen|Proxy find($criteria)
 * @method static         Allergen|Proxy findOrCreate(array $attributes)
 * @method static         Allergen|Proxy first(string $sortedField = 'id')
 * @method static         Allergen|Proxy last(string $sortedField = 'id')
 * @method static         Allergen|Proxy random(array $attributes = [])
 * @method static         Allergen|Proxy randomOrCreate(array $attributes = [])
 * @method static         Allergen[]|Proxy[] all()
 * @method static         Allergen[]|Proxy[] findBy(array $attributes)
 * @method static         Allergen[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static         Allergen[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static         AllergenRepository|RepositoryProxy repository()
 * @method Allergen|Proxy create($attributes = [])
 */
final class AllergenFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Allergen $allergen) {})
        ;
    }

    protected static function getClass(): string
    {
        return Allergen::class;
    }
}
