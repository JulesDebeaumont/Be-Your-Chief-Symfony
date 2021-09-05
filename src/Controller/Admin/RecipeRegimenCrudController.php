<?php

namespace App\Controller\Admin;

use App\Entity\RecipeRegimen;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeRegimenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecipeRegimen::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
