<?php

namespace App\Controller\Admin;

use App\Entity\Merchant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class MerchantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Merchant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            UrlField::new('email'),
            TextField::new('name'),
            TextField::new('webSiteLink'),

            AssociationField::new('comments')
                ->setTemplatePath('admin/fields/commentsFromAccount.html.twig')
                ->hideOnForm(),

            AssociationField::new('recipes')
                ->setTemplatePath('admin/fields/recipies.html.twig')
                ->hideOnForm(),

            AssociationField::new('schedules')
                ->setTemplatePath('admin/fields/schedules.html.twig')
                ->hideOnForm(),

            AssociationField::new('merchantType'),

            AssociationField::new('merchantSpecification'),

            CollectionField::new('recipies')->hideOnForm(),
            CollectionField::new('comments')->hideOnForm(),
        ];
    }
}
