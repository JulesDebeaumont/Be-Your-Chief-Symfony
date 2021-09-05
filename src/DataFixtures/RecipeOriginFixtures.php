<?php

namespace App\DataFixtures;

use App\Factory\RecipeOriginFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeOriginFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $recipeOrigines = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'RecipeOrigin.json'), true);

        foreach ($recipeOrigines as $recipeOrigine) {
            RecipeOriginFactory::new()->create($recipeOrigine);
        }
    }
}
