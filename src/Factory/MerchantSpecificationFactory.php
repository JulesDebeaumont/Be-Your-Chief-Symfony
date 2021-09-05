<?php

namespace App\Factory;

use App\Entity\MerchantSpecification;
use App\Repository\MarchantSpecificationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static                      MerchantSpecification|Proxy createOne(array $attributes = [])
 * @method static                      MerchantSpecification[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static                      MerchantSpecification|Proxy find($criteria)
 * @method static                      MerchantSpecification|Proxy findOrCreate(array $attributes)
 * @method static                      MerchantSpecification|Proxy first(string $sortedField = 'id')
 * @method static                      MerchantSpecification|Proxy last(string $sortedField = 'id')
 * @method static                      MerchantSpecification|Proxy random(array $attributes = [])
 * @method static                      MerchantSpecification|Proxy randomOrCreate(array $attributes = [])
 * @method static                      MerchantSpecification[]|Proxy[] all()
 * @method static                      MerchantSpecification[]|Proxy[] findBy(array $attributes)
 * @method static                      MerchantSpecification[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static                      MerchantSpecification[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static                      MarchantSpecificationRepository|RepositoryProxy repository()
 * @method MerchantSpecification|Proxy create($attributes = [])
 */
final class MerchantSpecificationFactory extends ModelFactory
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
            // ->afterInstantiate(function(MerchantSpecificationFixtures $merchantSpecification) {})
        ;
    }

    protected static function getClass(): string
    {
        return MerchantSpecification::class;
    }
}
