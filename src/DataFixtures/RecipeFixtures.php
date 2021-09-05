<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use App\Factory\MenuTypeFactory;
use App\Factory\PersonFactory;
use App\Factory\RecipeFactory;
use App\Factory\RecipeOriginFactory;
use App\Factory\RecipeRegimenFactory;
use App\Factory\RecipeTypeFactory;
use App\Factory\StepFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $recipies = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'Recipe.json'), true);

        foreach ($recipies as $recipe) {
            $recipe['steps'] = StepFactory::randomRange(1, 14);
            $recipe['account'] = PersonFactory::random();
            $recipe['accountsFavorite'] = PersonFactory::randomRange(0, 2);
            $recipe['type'] = RecipeTypeFactory::random();
            $recipe['regimen'] = RecipeRegimenFactory::random();
            $recipe['origin'] = RecipeOriginFactory::random();
            $recipe['menuType'] = MenuTypeFactory::randomRange(0, 2);

            $recipeEntity = RecipeFactory::new()->create($recipe);

            if (isset($recipe['imageName'])) {
                $this->setImage(
                     $recipeEntity->object(),
                     (__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$recipe['imageName']),
                     $recipe['imageName']);
            }
        }
    }

    public function setImage(Recipe $recipe, string $path, string $filename)
    {
        $tmpPath = tempnam(sys_get_temp_dir(), 'recipe_image');
        copy($path, $tmpPath);

        $recipe->setImageFile(new UploadedFile(
            $tmpPath,
            $filename,
            'image/jpeg',
            null,
            true
        ));
    }

    //gifdisplay or GD for size constraints
    //http://cutrona/utils/correction/colorcache.php?f=%2Fprogweb-old%2FprogwebS2-old%2Falbum%2Fexercice1.gdimage.php
    //http://cutrona/utils/correction/colorcache.php?f=%2Fprogweb-old%2FprogwebS2-old%2Falbum%2Fgdimage.class.php
    //https://www.php.net/manual/fr/book.image.php

    public function getDependencies(): array
    {
        return [
            MenuTypeFixtures::class,
            RecipeOriginFixtures::class,
            RecipeTypeFixtures::class,
            RecipeRegimenFixtures::class,
            StepFixtures::class,
        ];
    }
}
