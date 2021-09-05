<?php

namespace App\DataFixtures;

use App\Factory\RecipeTypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recipeTypes = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'RecipeType.json'])), true);

        foreach ($recipeTypes as $recipeType) {
            RecipeTypeFactory::new()->create($recipeType);
        }
    }
}
