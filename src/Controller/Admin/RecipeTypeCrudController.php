<?php

namespace App\Controller\Admin;

use App\Entity\RecipeType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecipeType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
