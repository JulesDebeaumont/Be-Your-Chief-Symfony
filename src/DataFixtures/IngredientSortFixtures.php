<?php

namespace App\DataFixtures;

use App\Factory\IngredientSortFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientSortFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ingredientSorts = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'IngredientSort.json'])), true);
        foreach ($ingredientSorts as $ingredientSort) {
            IngredientSortFactory::new()->create($ingredientSort);
        }
    }
}
