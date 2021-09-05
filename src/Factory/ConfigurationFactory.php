<?php

namespace App\Factory;

use App\Entity\Configuration;
use App\Repository\ConfigurationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static              Configuration|Proxy createOne(array $attributes = [])
 * @method static              Configuration[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static              Configuration|Proxy find($criteria)
 * @method static              Configuration|Proxy findOrCreate(array $attributes)
 * @method static              Configuration|Proxy first(string $sortedField = 'id')
 * @method static              Configuration|Proxy last(string $sortedField = 'id')
 * @method static              Configuration|Proxy random(array $attributes = [])
 * @method static              Configuration|Proxy randomOrCreate(array $attributes = [])
 * @method static              Configuration[]|Proxy[] all()
 * @method static              Configuration[]|Proxy[] findBy(array $attributes)
 * @method static              Configuration[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static              Configuration[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static              ConfigurationRepository|RepositoryProxy repository()
 * @method Configuration|Proxy create($attributes = [])
 */
final class ConfigurationFactory extends ModelFactory
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
            // ->afterInstantiate(function(Configuration $configuration) {})
        ;
    }

    protected static function getClass(): string
    {
        return Configuration::class;
    }
}
