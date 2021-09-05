<?php

namespace App\Factory;

use App\Entity\RecipeOrigin;
use App\Repository\RecipOriginRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static             RecipeOrigin|Proxy createOne(array $attributes = [])
 * @method static             RecipeOrigin[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static             RecipeOrigin|Proxy find($criteria)
 * @method static             RecipeOrigin|Proxy findOrCreate(array $attributes)
 * @method static             RecipeOrigin|Proxy first(string $sortedField = 'id')
 * @method static             RecipeOrigin|Proxy last(string $sortedField = 'id')
 * @method static             RecipeOrigin|Proxy random(array $attributes = [])
 * @method static             RecipeOrigin|Proxy randomOrCreate(array $attributes = [])
 * @method static             RecipeOrigin[]|Proxy[] all()
 * @method static             RecipeOrigin[]|Proxy[] findBy(array $attributes)
 * @method static             RecipeOrigin[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static             RecipeOrigin[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static             RecipOriginRepository|RepositoryProxy repository()
 * @method RecipeOrigin|Proxy create($attributes = [])
 */
final class RecipeOriginFactory extends ModelFactory
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
            // ->afterInstantiate(function(RecipeOriginFixtures $recipeOrigin) {})
        ;
    }

    protected static function getClass(): string
    {
        return RecipeOrigin::class;
    }
}
