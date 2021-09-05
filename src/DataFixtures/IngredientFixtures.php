<?php

namespace App\DataFixtures;

use App\Factory\AllergenFactory;
use App\Factory\IngredientFactory;
use App\Factory\IngredientSortFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ingredients = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'Ingredient.json'])), true);

        foreach ($ingredients as $ingredient) {
            $ingredient['allergens'] = AllergenFactory::randomRange(1, 3);
            $ingredient['sort'] = IngredientSortFactory::random();
            IngredientFactory::new()->create($ingredient);
        }
    }

    public function getDependencies(): array
    {
        return [
            IngredientSortFixtures::class,
        ];
    }
}
