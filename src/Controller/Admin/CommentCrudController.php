<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('recipe')->formatValue(
                function ($value, $entity) {
                    return $entity->getRecipe()->getName();
                })->hideOnForm(),

            TextField::new('textComment'),

            AssociationField::new('account')->formatValue(
                function ($value, $entity) {
                    return $entity->getAccount()->getEmail();
                })->hideOnForm(),

            DateField::new('dateComment')->hideOnForm(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('recipe'))
            ->add(EntityFilter::new('account'))
            ;
    }
}
