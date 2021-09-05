<?php

namespace App\Factory;

use App\Entity\RecipeType;
use App\Repository\RecipeTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static           RecipeType|Proxy createOne(array $attributes = [])
 * @method static           RecipeType[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static           RecipeType|Proxy find($criteria)
 * @method static           RecipeType|Proxy findOrCreate(array $attributes)
 * @method static           RecipeType|Proxy first(string $sortedField = 'id')
 * @method static           RecipeType|Proxy last(string $sortedField = 'id')
 * @method static           RecipeType|Proxy random(array $attributes = [])
 * @method static           RecipeType|Proxy randomOrCreate(array $attributes = [])
 * @method static           RecipeType[]|Proxy[] all()
 * @method static           RecipeType[]|Proxy[] findBy(array $attributes)
 * @method static           RecipeType[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static           RecipeType[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static           RecipeTypeRepository|RepositoryProxy repository()
 * @method RecipeType|Proxy create($attributes = [])
 */
final class RecipeTypeFactory extends ModelFactory
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
            // ->afterInstantiate(function(RecipeType $recipeType) {})
        ;
    }

    protected static function getClass(): string
    {
        return RecipeType::class;
    }
}
