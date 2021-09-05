<?php

namespace App\Factory;

use App\Entity\IngredientSort;
use App\Repository\TypeIngredientRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static               IngredientSort|Proxy createOne(array $attributes = [])
 * @method static               IngredientSort[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static               IngredientSort|Proxy find($criteria)
 * @method static               IngredientSort|Proxy findOrCreate(array $attributes)
 * @method static               IngredientSort|Proxy first(string $sortedField = 'id')
 * @method static               IngredientSort|Proxy last(string $sortedField = 'id')
 * @method static               IngredientSort|Proxy random(array $attributes = [])
 * @method static               IngredientSort|Proxy randomOrCreate(array $attributes = [])
 * @method static               IngredientSort[]|Proxy[] all()
 * @method static               IngredientSort[]|Proxy[] findBy(array $attributes)
 * @method static               IngredientSort[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static               IngredientSort[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static               TypeIngredientRepository|RepositoryProxy repository()
 * @method IngredientSort|Proxy create($attributes = [])
 */
final class IngredientSortFactory extends ModelFactory
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
            // ->afterInstantiate(function(IngredientSort $ingredientSort) {})
        ;
    }

    protected static function getClass(): string
    {
        return IngredientSort::class;
    }
}
