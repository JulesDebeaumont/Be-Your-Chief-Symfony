<?php

namespace App\DataFixtures;

use App\Factory\IngredientFactory;
use App\Factory\QuantityFactory;
use App\Factory\RecipeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuantityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $quantities = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Quantity.json'), true);

        foreach ($quantities as $quantity) {
            $quantity['ingredient'] = IngredientFactory::random();
            $quantity['recipe'] = RecipeFactory::random();
            QuantityFactory::new()->create($quantity);
        }
    }

    public function getDependencies(): array
    {
        return [
            RecipeFixtures::class,
            IngredientFixtures::class,
        ];
    }
}
