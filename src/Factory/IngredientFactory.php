<?php

namespace App\Factory;

use App\Entity\Ingredient;
use App\Repository\IngredientsRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static           Ingredient|Proxy createOne(array $attributes = [])
 * @method static           Ingredient[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static           Ingredient|Proxy find($criteria)
 * @method static           Ingredient|Proxy findOrCreate(array $attributes)
 * @method static           Ingredient|Proxy first(string $sortedField = 'id')
 * @method static           Ingredient|Proxy last(string $sortedField = 'id')
 * @method static           Ingredient|Proxy random(array $attributes = [])
 * @method static           Ingredient|Proxy randomOrCreate(array $attributes = [])
 * @method static           Ingredient[]|Proxy[] all()
 * @method static           Ingredient[]|Proxy[] findBy(array $attributes)
 * @method static           Ingredient[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static           Ingredient[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static           IngredientsRepository|RepositoryProxy repository()
 * @method Ingredient|Proxy create($attributes = [])
 */
final class IngredientFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->words(1, true),
            'nbKal' => self::faker()->numberBetween(0, 600),
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Ingredient $ingredient) {})
        ;
    }

    protected static function getClass(): string
    {
        return Ingredient::class;
    }
}
