<?php

namespace App\Controller\Admin;

use App\Entity\RecipeOrigin;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeOriginCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecipeOrigin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
