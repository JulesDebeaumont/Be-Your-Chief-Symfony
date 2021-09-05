<?php

namespace App\DataFixtures;

use App\Entity\Merchant;
use App\Factory\MerchantFactory;
use App\Factory\MerchantSpecificationFactory;
use App\Factory\MerchantTypeFactory;
use App\Factory\ScheduleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MerchantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $merchants = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Merchant.json'), true);

        foreach ($merchants as $merchant) {
            $merchant['merchantType'] = MerchantTypeFactory::random();
            $merchant['merchantSpecification'] = MerchantSpecificationFactory::random();
            $merchant['schedules'] = ScheduleFactory::random();
            $merchantEntity = MerchantFactory::new()->create($merchant);

            if (isset($merchant['imageName'])) {
                $this->setImage(
                    $merchantEntity->object(),
                    (__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$merchant['imageName']),
                    $merchant['imageName']);
            }
        }
    }

    public function setImage(Merchant $merchant, string $path, string $filename)
    {
        $tmpPath = tempnam(sys_get_temp_dir(), 'account_image');
        copy($path, $tmpPath);

        $merchant->setImageFile(new UploadedFile(
            $tmpPath,
            $filename,
            'image/jpeg',
            null,
            true
        ));
    }

    public function getDependencies()
    {
        return [
            MerchantTypeFixtures::class,
            MerchantSpecificationFixtures::class,
            ScheduleFixtures::class,
        ];
    }
}
