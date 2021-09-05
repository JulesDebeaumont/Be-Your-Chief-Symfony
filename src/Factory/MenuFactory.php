<?php

namespace App\Factory;

use App\Entity\Menu;
use App\Repository\MenuRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static     Menu|Proxy createOne(array $attributes = [])
 * @method static     Menu[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static     Menu|Proxy find($criteria)
 * @method static     Menu|Proxy findOrCreate(array $attributes)
 * @method static     Menu|Proxy first(string $sortedField = 'id')
 * @method static     Menu|Proxy last(string $sortedField = 'id')
 * @method static     Menu|Proxy random(array $attributes = [])
 * @method static     Menu|Proxy randomOrCreate(array $attributes = [])
 * @method static     Menu[]|Proxy[] all()
 * @method static     Menu[]|Proxy[] findBy(array $attributes)
 * @method static     Menu[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static     Menu[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static     MenuRepository|RepositoryProxy repository()
 * @method Menu|Proxy create($attributes = [])
 */
final class MenuFactory extends ModelFactory
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
            // ->afterInstantiate(function(MenuFixtures $menu) {})
        ;
    }

    protected static function getClass(): string
    {
        return Menu::class;
    }
}
