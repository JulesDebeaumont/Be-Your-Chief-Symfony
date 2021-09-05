<?php

namespace App\DataFixtures;

use App\Factory\CommentFactory;
use App\Factory\PersonFactory;
use App\Factory\RecipeFactory;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comments = json_decode(file_get_contents(implode(DIRECTORY_SEPARATOR, [__DIR__, 'data', 'Comment.json'])), true);

        foreach ($comments as $comment) {
            $comment['dateComment'] = DateTime::createFromFormat(\DateTimeInterface::ATOM, $comment['dateComment']);

            $comment['recipe'] = RecipeFactory::random(); //A delete
            $comment['account'] = PersonFactory::random(); //A delete

            CommentFactory::new()->create($comment);
        }
    }

    public function getDependencies(): array
    {
        return [
            PersonFixtures::class,
            MerchantFixtures::class,
            RecipeFixtures::class,
        ];
    }
}
