<?php

namespace App\DataFixtures;

use App\Factory\MerchantTypeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MerchantTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $merchantTypes = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'MerchantType.json'), true);

        foreach ($merchantTypes as $merchantType) {
            MerchantTypeFactory::new()->create($merchantType);
        }
    }
}
