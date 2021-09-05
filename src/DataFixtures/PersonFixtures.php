<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Factory\PersonFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $persons = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'Person.json'])), true);

        foreach ($persons as $person) {
            $personEntity = PersonFactory::new()->create($person);

            if (isset($person['imageName'])) {
                $this->setImage(
                    $personEntity->object(),
                    (__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$person['imageName']),
                    $person['imageName']);
            }
        }
    }

    public function setImage(Person $person, string $path, string $filename)
    {
        $tmpPath = tempnam(sys_get_temp_dir(), 'account_image');
        copy($path, $tmpPath);

        $person->setImageFile(new UploadedFile(
            $tmpPath,
            $filename,
            'image/jpeg',
            null,
            true
        ));
    }
}
