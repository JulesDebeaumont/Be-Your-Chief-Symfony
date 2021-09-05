<?php

namespace App\Factory;

use App\Entity\RecipeRegimen;
use App\Repository\RecipRegimenRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @method static              RecipeRegimen|Proxy createOne(array $attributes = [])
 * @method static              RecipeRegimen[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static              RecipeRegimen|Proxy find($criteria)
 * @method static              RecipeRegimen|Proxy findOrCreate(array $attributes)
 * @method static              RecipeRegimen|Proxy first(string $sortedField = 'id')
 * @method static              RecipeRegimen|Proxy last(string $sortedField = 'id')
 * @method static              RecipeRegimen|Proxy random(array $attributes = [])
 * @method static              RecipeRegimen|Proxy randomOrCreate(array $attributes = [])
 * @method static              RecipeRegimen[]|Proxy[] all()
 * @method static              RecipeRegimen[]|Proxy[] findBy(array $attributes)
 * @method static              RecipeRegimen[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static              RecipeRegimen[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static              RecipRegimenRepository|RepositoryProxy repository()
 * @method RecipeRegimen|Proxy create($attributes = [])
 */
final class RecipeRegimenFactory extends ModelFactory
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
            // ->afterInstantiate(function(RecipeRegimen $recipeRegimen) {})
        ;
    }

    protected static function getClass(): string
    {
        return RecipeRegimen::class;
    }
}
