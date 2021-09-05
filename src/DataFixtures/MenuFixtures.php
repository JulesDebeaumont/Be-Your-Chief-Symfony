<?php

namespace App\DataFixtures;

use App\Factory\MenuFactory;
use App\Factory\MenuTypeFactory;
use App\Factory\PersonFactory;
use App\Factory\RecipeFactory;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $menus = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Menu.json'), true);

        foreach ($menus as $menu) {
            $menu['dateMenu'] = DateTime::createFromFormat(\DateTimeInterface::ATOM, $menu['dateMenu']);
            $menu['type'] = MenuTypeFactory::random();
            $menu['account'] = PersonFactory::random();
            $menu['recipe'] = [RecipeFactory::random([])];
            MenuFactory::new()->create($menu);
        }
    }

    public function getDependencies(): array
    {
        return [
            MenuTypeFixtures::class,
            PersonFixtures::class,
            RecipeFixtures::class,
        ];
    }
}
