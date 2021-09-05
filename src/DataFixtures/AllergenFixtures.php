<?php

namespace App\DataFixtures;

use App\Factory\AllergenFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AllergenFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ingredients = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Allergen.json'), true);

        foreach ($ingredients as $ingredient) {
            AllergenFactory::new()->create($ingredient);
        }
    }
}
