<?php

namespace App\Factory;

use App\Entity\Quantity;
use App\Repository\QuantityRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static         Quantity|Proxy createOne(array $attributes = [])
 * @method static         Quantity[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static         Quantity|Proxy find($criteria)
 * @method static         Quantity|Proxy findOrCreate(array $attributes)
 * @method static         Quantity|Proxy first(string $sortedField = 'id')
 * @method static         Quantity|Proxy last(string $sortedField = 'id')
 * @method static         Quantity|Proxy random(array $attributes = [])
 * @method static         Quantity|Proxy randomOrCreate(array $attributes = [])
 * @method static         Quantity[]|Proxy[] all()
 * @method static         Quantity[]|Proxy[] findBy(array $attributes)
 * @method static         Quantity[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static         Quantity[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static         QuantityRepository|RepositoryProxy repository()
 * @method Quantity|Proxy create($attributes = [])
 */
final class QuantityFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://github.com/zenstruck/foundry#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://github.com/zenstruck/foundry#model-factories)
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Quantity $quantity) {})
        ;
    }

    protected static function getClass(): string
    {
        return Quantity::class;
    }
}
