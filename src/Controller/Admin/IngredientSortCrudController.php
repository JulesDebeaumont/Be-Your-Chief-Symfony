<?php

namespace App\Controller\Admin;

use App\Entity\IngredientSort;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IngredientSortCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IngredientSort::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
