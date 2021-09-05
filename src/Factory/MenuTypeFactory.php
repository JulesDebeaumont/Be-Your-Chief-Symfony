<?php

namespace App\Factory;

use App\Entity\MenuType;
use App\Repository\MenuTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static         MenuType|Proxy createOne(array $attributes = [])
 * @method static         MenuType[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static         MenuType|Proxy find($criteria)
 * @method static         MenuType|Proxy findOrCreate(array $attributes)
 * @method static         MenuType|Proxy first(string $sortedField = 'id')
 * @method static         MenuType|Proxy last(string $sortedField = 'id')
 * @method static         MenuType|Proxy random(array $attributes = [])
 * @method static         MenuType|Proxy randomOrCreate(array $attributes = [])
 * @method static         MenuType[]|Proxy[] all()
 * @method static         MenuType[]|Proxy[] findBy(array $attributes)
 * @method static         MenuType[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static         MenuType[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static         MenuTypeRepository|RepositoryProxy repository()
 * @method MenuType|Proxy create($attributes = [])
 */
final class MenuTypeFactory extends ModelFactory
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
            // ->afterInstantiate(function(MenuType $menuType) {})
        ;
    }

    protected static function getClass(): string
    {
        return MenuType::class;
    }
}
