<?php

namespace App\Factory;

use App\Entity\MerchantType;
use App\Repository\MerchantTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static             MerchantType|Proxy createOne(array $attributes = [])
 * @method static             MerchantType[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static             MerchantType|Proxy find($criteria)
 * @method static             MerchantType|Proxy findOrCreate(array $attributes)
 * @method static             MerchantType|Proxy first(string $sortedField = 'id')
 * @method static             MerchantType|Proxy last(string $sortedField = 'id')
 * @method static             MerchantType|Proxy random(array $attributes = [])
 * @method static             MerchantType|Proxy randomOrCreate(array $attributes = [])
 * @method static             MerchantType[]|Proxy[] all()
 * @method static             MerchantType[]|Proxy[] findBy(array $attributes)
 * @method static             MerchantType[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static             MerchantType[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static             MerchantTypeRepository|RepositoryProxy repository()
 * @method MerchantType|Proxy create($attributes = [])
 */
final class MerchantTypeFactory extends ModelFactory
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
            // ->afterInstantiate(function(MerchantType $merchantType) {})
        ;
    }

    protected static function getClass(): string
    {
        return MerchantType::class;
    }
}
