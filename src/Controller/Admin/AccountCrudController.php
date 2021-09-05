<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class AccountCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Account::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email'),
            ArrayField::new('roles')->hideOnForm(),

            AssociationField::new('comments')
                ->setTemplatePath('admin/fields/commentsFromAccount.html.twig')
                ->hideOnForm(),

            AssociationField::new('recipes')
                ->setTemplatePath('admin/fields/recipies.html.twig')
                ->hideOnForm(),

            AssociationField::new('favorites')->hideOnForm(),
        ];
    }
}
