<?php

namespace App\DataFixtures;

use App\Factory\StepFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $steps = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Step.json'), true);

        foreach ($steps as $step) {
            StepFactory::new()->create($step);
        }
    }
}
