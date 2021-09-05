<?php

namespace App\DataFixtures;

use App\Factory\MerchantSpecificationFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MerchantSpecificationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $MerchantSpecifications = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'MerchantSpecification.json'), true);

        foreach ($MerchantSpecifications as $MerchantSpecification) {
            MerchantSpecificationFactory::new()->create($MerchantSpecification);
        }
    }
}
