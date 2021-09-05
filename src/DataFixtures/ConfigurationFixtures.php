<?php

namespace App\DataFixtures;

use App\Factory\ConfigurationFactory;
use App\Factory\PersonFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConfigurationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $configurations = json_decode(file_get_contents(__DIR__.
            DIRECTORY_SEPARATOR.
            'data'.
            DIRECTORY_SEPARATOR.
            'Configuration.json'), true);

        $persons = PersonFactory::randomRange(2, 2);

        foreach ($configurations as $index => $configuration) {
            $configuration['account'] = $persons[$index];
            ConfigurationFactory::createOne($configuration);
        }
    }

    public function getDependencies(): array
    {
        return [
            PersonFixtures::class,
        ];
    }
}
