<?php

namespace App\DataFixtures;

use App\Factory\MenuTypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $menuTypes = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'MenuType.json'), true);

        foreach ($menuTypes as $menuType) {
            MenuTypeFactory::new()->create($menuType);
        }
    }
}
