<?php

namespace App\DataFixtures;

use App\Factory\RecipeRegimenFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeRegimenFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recipeRegimens = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'RecipeRegimen.json'])), true);

        foreach ($recipeRegimens as $recipeRegimen) {
            RecipeRegimenFactory::new()->create($recipeRegimen);
        }
    }
}
