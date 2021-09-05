<?php

namespace App\Controller\Admin;

use App\Entity\Person;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class PersonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Person::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            UrlField::new('email'),
            TextField::new('firstName'),
            TextField::new('lastName'),

            AssociationField::new('comments')
                ->setTemplatePath('admin/fields/commentsFromAccount.html.twig')
                ->hideOnForm(),

            AssociationField::new('recipes')
                ->setTemplatePath('admin/fields/recipies.html.twig')
                ->hideOnForm(),
        ];
    }
}
